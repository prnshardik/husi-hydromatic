<?php

use Illuminate\Support\Facades\Route;

Route::get('clear', function() {
    Artisan::call('cache:clear');
    Artisan::call('optimize:clear');
    Artisan::call('config:cache');
    return "Command Successfully";
});

Route::get('key-generate', function() {
    Artisan::call('key:generate');
    return "Key Generate Successfully";
});

Route::get('migrate', function() {
    Artisan::call('migrate:refresh');
    return "Database migration generated";
});

Route::get('db', function() {
    Artisan::call('db:seed');
    return "Database seeded successfully";
});

Route::group(['namespace' => 'Front'], function(){
    Route::get('/', 'RootController@index')->name('home');
    Route::get('/product/{id?}', 'RootController@product')->name('product');
});

Route::group(['middleware' => ['prevent-back-history'], 'prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){
    Route::group(['middleware' => ['guest:admin']], function () {
        Route::get('/', 'AuthController@login')->name('login');
        Route::post('signin', 'AuthController@signin')->name('signin');

        Route::get('forget-password', 'AuthController@forget_password')->name('forget.password');
        Route::post('password-forget', 'AuthController@password_forget')->name('password.forget');
        Route::get('reset-password/{string}', 'AuthController@reset_password')->name('reset.password');
        Route::post('recover-password', 'AuthController@recover_password')->name('recover.password');
    });

    Route::group(['middleware' => ['auth:admin']], function () {
        Route::get('logout', 'AuthController@logout')->name('logout');

        Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

        /** categories */ 
            Route::any('categories', 'CategoryController@index')->name('categories');
            Route::get('categories/create', 'CategoryController@create')->name('categories.create');
            Route::post('categories/insert', 'CategoryController@insert')->name('categories.insert');
            Route::get('categories/view', 'CategoryController@view')->name('categories.view');
            Route::get('categories/edit', 'CategoryController@edit')->name('categories.edit');
            Route::patch('categories/update', 'CategoryController@update')->name('categories.update');
            Route::post('categories/change-status', 'CategoryController@change_status')->name('categories.change.status');
        /** categories */ 

        /** products */ 
            Route::any('products', 'ProductController@index')->name('products');
            Route::get('products/create', 'ProductController@create')->name('product.create');
            Route::post('products/insert', 'ProductController@insert')->name('product.insert');
            Route::get('products/view', 'ProductController@view')->name('product.view');
            Route::get('products/edit', 'ProductController@edit')->name('product.edit');
            Route::patch('products/update', 'ProductController@update')->name('product.update');
            Route::post('products/change-status', 'ProductController@change_status')->name('product.change.status');
            Route::post('product/remove-image', 'ProductController@remove_image')->name('product.remove.image');
        /** products */

        /** settings */
            Route::get('settings', 'SettingsController@index')->name('settings');
            Route::post('settings/update', 'SettingsController@update')->name('settings.update');
        /** settings */
    });

    Route::get("{path}", function(){ return redirect()->route('admin.login'); })->where('path', '.+');
});