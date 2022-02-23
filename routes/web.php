<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('command:clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('view:clear');
    Artisan::call('config:cache');
    return "config, cache, and view cleared successfully";
});

Route::get('command:config', function() {
    Artisan::call('config:cache');
    return "config cache successfully";
});

Route::get('command:key', function() {
    Artisan::call('key:generate');
    return "Key generate successfully";
});

Route::get('command:migrate', function() {
    Artisan::call('migrate:fresh');   
    return "Database migration generated";
});

Route::get('command:seed', function() {
    Artisan::call('db:seed');
    return "Database seeding generated";
});

Route::group(['namespace' => 'Front', 'middleware' => 'mail-service'], function(){
    Route::get('/', 'RootController@index')->name('home'); 
    Route::get('about', 'RootController@about')->name('about'); 
    Route::get('option/{id?}', 'RootController@option')->name('option'); 
    Route::get('faq', 'RootController@faq')->name('faq'); 
    Route::get('gallery', 'RootController@gallery')->name('gallery');
    Route::get('contact', 'RootController@contact')->name('contact'); 
    Route::post('contactus', 'RootController@contactus')->name('contactus'); 
    Route::get('learneasy', 'RootController@learneasy')->name('learneasy');
});

Route::group(['middleware' => ['prevent-back-history', 'mail-service'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/', 'AuthController@login')->name('login');
        Route::post('signin', 'AuthController@signin')->name('signin');

        Route::get('forgot-password', 'AuthController@forgot_password')->name('forgot.password');
        Route::post('password-forgot', 'AuthController@password_forgot')->name('password.forgot');
        Route::get('reset-password/{string}', 'AuthController@reset_password')->name('reset.password');
        Route::post('recover-password', 'AuthController@recover_password')->name('recover.password');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        /** category */
            Route::any('category', 'CategoryController@index')->name('category');
            Route::get('category/create', 'CategoryController@create')->name('category.create');
            Route::post('category/insert', 'CategoryController@insert')->name('category.insert');
            Route::get('category/view/{id?}', 'CategoryController@view')->name('category.view');
            Route::get('category/edit/{id?}', 'CategoryController@edit')->name('category.edit');
            Route::patch('category/update', 'CategoryController@update')->name('category.update');
            Route::post('category/change-status', 'CategoryController@change_status')->name('category.change.status');
        /** category */
        
        /** blogs */
            Route::any('blog', 'BlogController@index')->name('blog');
            Route::get('blog/create', 'BlogController@create')->name('blog.create');
            Route::post('blog/insert', 'BlogController@insert')->name('blog.insert');
            Route::get('blog/view/{id?}', 'BlogController@view')->name('blog.view');
            Route::get('blog/edit/{id?}', 'BlogController@edit')->name('blog.edit');
            Route::patch('blog/update', 'BlogController@update')->name('blog.update');
            Route::post('blog/change-status', 'BlogController@change_status')->name('blog.change.status');
        /** blogs */

        /** slider */
            Route::any('slider', 'SliderController@index')->name('slider');
            Route::get('slider/create', 'SliderController@create')->name('slider.create');
            Route::post('slider/insert', 'SliderController@insert')->name('slider.insert');
            Route::get('slider/view/{id?}', 'SliderController@view')->name('slider.view');
            Route::get('slider/edit/{id?}', 'SliderController@edit')->name('slider.edit');
            Route::patch('slider/update', 'SliderController@update')->name('slider.update');
            Route::post('slider/change-status', 'SliderController@change_status')->name('slider.change.status');
        /** slider */

        /** toward */
            Route::any('toward', 'TowardController@index')->name('toward');
            Route::get('toward/create', 'TowardController@create')->name('toward.create');
            Route::post('toward/insert', 'TowardController@insert')->name('toward.insert');
            Route::get('toward/view/{id?}', 'TowardController@view')->name('toward.view');
            Route::get('toward/edit/{id?}', 'TowardController@edit')->name('toward.edit');
            Route::patch('toward/update', 'TowardController@update')->name('toward.update');
            Route::post('toward/change-status', 'TowardController@change_status')->name('toward.change.status');
        /** toward */

        /** about */
            Route::any('about', 'AboutController@index')->name('about');
            Route::get('about/create', 'AboutController@create')->name('about.create');
            Route::post('about/insert', 'AboutController@insert')->name('about.insert');
            Route::get('about/view/{id?}', 'AboutController@view')->name('about.view');
            Route::get('about/edit/{id?}', 'AboutController@edit')->name('about.edit');
            Route::patch('about/update', 'AboutController@update')->name('about.update');
            Route::post('about/change-status', 'AboutController@change_status')->name('about.change.status');
        /** about */

        /** workspace */
            Route::any('workspace', 'WorkspaceController@index')->name('workspace');
            Route::get('workspace/create', 'WorkspaceController@create')->name('workspace.create');
            Route::post('workspace/insert', 'WorkspaceController@insert')->name('workspace.insert');
            Route::get('workspace/view/{id?}', 'WorkspaceController@view')->name('workspace.view');
            Route::get('workspace/edit/{id?}', 'WorkspaceController@edit')->name('workspace.edit');
            Route::patch('workspace/update', 'WorkspaceController@update')->name('workspace.update');
            Route::post('workspace/change-status', 'WorkspaceController@change_status')->name('workspace.change.status');
        /** workspace */
        
        /** gallery-category */
            Route::any('galleries-category', 'GalleryCategoryController@index')->name('galleries-category');
            Route::get('galleries-category/create', 'GalleryCategoryController@create')->name('galleries-category.create');
            Route::post('galleries-category/insert', 'GalleryCategoryController@insert')->name('galleries-category.insert');
            Route::get('galleries-category/view/{id?}', 'GalleryCategoryController@view')->name('galleries-category.view');
            Route::get('galleries-category/edit/{id?}', 'GalleryCategoryController@edit')->name('galleries-category.edit');
            Route::patch('galleries-category/update', 'GalleryCategoryController@update')->name('galleries-category.update');
            Route::post('galleries-category/change-status', 'GalleryCategoryController@change_status')->name('galleries-category.change.status');
        /** galleries-category */

        /** gallery */
            Route::any('gallery', 'GalleryController@index')->name('gallery');
            Route::get('gallery/create', 'GalleryController@create')->name('gallery.create');
            Route::post('gallery/insert', 'GalleryController@insert')->name('gallery.insert');
            Route::get('gallery/view/{id?}', 'GalleryController@view')->name('gallery.view');
            Route::get('gallery/edit/{id?}', 'GalleryController@edit')->name('gallery.edit');
            Route::patch('gallery/update', 'GalleryController@update')->name('gallery.update');
            Route::post('gallery/change-status', 'GalleryController@change_status')->name('gallery.change.status');
        /** gallery */

        /** faq */
            Route::any('faq', 'FaqController@index')->name('faq');
            Route::get('faq/create', 'FaqController@create')->name('faq.create');
            Route::post('faq/insert', 'FaqController@insert')->name('faq.insert');
            Route::get('faq/view/{id?}', 'FaqController@view')->name('faq.view');
            Route::get('faq/edit/{id?}', 'FaqController@edit')->name('faq.edit');
            Route::patch('faq/update', 'FaqController@update')->name('faq.update');
            Route::post('faq/change-status', 'FaqController@change_status')->name('faq.change.status');
        /** faq */

        /** testimonial */
            Route::any('testimonial', 'TestimonialController@index')->name('testimonial');
            Route::get('testimonial/create', 'TestimonialController@create')->name('testimonial.create');
            Route::post('testimonial/insert', 'TestimonialController@insert')->name('testimonial.insert');
            Route::get('testimonial/view/{id?}', 'TestimonialController@view')->name('testimonial.view');
            Route::get('testimonial/edit/{id?}', 'TestimonialController@edit')->name('testimonial.edit');
            Route::patch('testimonial/update', 'TestimonialController@update')->name('testimonial.update');
            Route::post('testimonial/change-status', 'TestimonialController@change_status')->name('testimonial.change.status');
        /** testimonial */

        /** contact */
            Route::any('contact', 'ContactController@index')->name('contact');
            Route::get('contact/view/{id?}', 'ContactController@view')->name('contact.view');
            Route::post('contact/delete', 'ContactController@delete')->name('contact.delete');
        /** contact */

        /** settings */
            Route::get('settings', 'SettingsController@index')->name('settings');
            Route::post('settings/update', 'SettingsController@update')->name('settings.update');
            Route::post('settings/update/logo', 'SettingsController@logo_update')->name('settings.update.logo');
        /** settings */
    });

});

Route::get("/admin/{path}", function(){ return redirect()->route('admin.login'); })->where('path', '.+');
Route::get("{path}", function(){ return redirect()->route('home'); })->where('path', '.+');
