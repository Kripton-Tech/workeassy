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
    Artisan::call('migrate:refresh');   
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

        /** categories */
            // Route::any('categories', 'CategoriesController@index')->name('categories');
            // Route::get('categories/create', 'CategoriesController@create')->name('categories.create');
            // Route::post('categories/insert', 'CategoriesController@insert')->name('categories.insert');
            // Route::get('categories/view/{id?}', 'CategoriesController@view')->name('categories.view');
            // Route::get('categories/edit/{id?}', 'CategoriesController@edit')->name('categories.edit');
            // Route::patch('categories/update', 'CategoriesController@update')->name('categories.update');
            // Route::post('categories/change-status', 'CategoriesController@change_status')->name('categories.change.status');
        /** categories */

        /** portfolio */
            // Route::any('portfolio', 'PortfolioController@index')->name('portfolio');
            // Route::get('portfolio/create', 'PortfolioController@create')->name('portfolio.create');
            // Route::post('portfolio/insert', 'PortfolioController@insert')->name('portfolio.insert');
            // Route::get('portfolio/view/{id?}', 'PortfolioController@view')->name('portfolio.view');
            // Route::get('portfolio/edit/{id?}', 'PortfolioController@edit')->name('portfolio.edit');
            // Route::patch('portfolio/update', 'PortfolioController@update')->name('portfolio.update');
            // Route::post('portfolio/change-status', 'PortfolioController@change_status')->name('portfolio.change.status');
        /** portfolio */

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
