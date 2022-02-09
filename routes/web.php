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

Route::group(['namespace' => 'Front'], function(){
    Route::get('/', 'RootController@index')->name('home'); 
    Route::get('about', 'RootController@about')->name('about'); 
    Route::get('contact', 'RootController@contact')->name('contact'); 
    Route::post('/contactus', 'RootController@contactus')->name('contactus'); 
});

Route::group(['middleware' => ['prevent-back-history'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    Route::group(['middleware' => ['guest']], function () {
        Route::get('/', 'AuthController@login')->name('login');
        Route::post('signin', 'AuthController@signin')->name('signin');

        Route::get('forget-password', 'AuthController@forget_password')->name('forget.password');
        Route::post('password-forget', 'AuthController@password_forget')->name('password.forget');
        Route::get('reset-password/{string}', 'AuthController@reset_password')->name('reset.password');
        Route::post('recover-password', 'AuthController@recover_password')->name('recover.password');
    });

    Route::group(['middleware' => ['auth']], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

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

        /** blog */
            Route::any('blog', 'BlogController@index')->name('blog');
            Route::get('blog/create', 'BlogController@create')->name('blog.create');
            Route::post('blog/insert', 'BlogController@insert')->name('blog.insert');
            Route::get('blog/view/{id?}', 'BlogController@view')->name('blog.view');
            Route::get('blog/edit/{id?}', 'BlogController@edit')->name('blog.edit');
            Route::patch('blog/update', 'BlogController@update')->name('blog.update');
            Route::post('blog/change-status', 'BlogController@change_status')->name('blog.change.status');
        /** blog */
        
        /** video */
            Route::any('video', 'VideoController@index')->name('video');
            Route::get('video/create', 'VideoController@create')->name('video.create');
            Route::post('video/insert', 'VideoController@insert')->name('video.insert');
            Route::get('video/view/{id?}', 'VideoController@view')->name('video.view');
            Route::get('video/edit/{id?}', 'VideoController@edit')->name('video.edit');
            Route::patch('video/update', 'VideoController@update')->name('video.update');
            Route::post('video/change-status', 'VideoController@change_status')->name('video.change.status');
        /** video */

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
