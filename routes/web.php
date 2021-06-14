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

        /** Products */ 
            Route::any('products', 'ProductController@index')->name('products');
            Route::get('products-create', 'ProductController@create')->name('product.create');
            Route::post('products-insert', 'ProductController@insert')->name('product.insert');
            Route::get('products-view', 'ProductController@view')->name('product.view');
            Route::get('products-edit', 'ProductController@edit')->name('product.edit');
            Route::PATCH('products-update', 'ProductController@update')->name('product.update');
            Route::post('products-change_status', 'ProductController@change_status')->name('product.change_status');
            Route::get('product-remove_image', 'ProductController@remove_image')->name('product.remove_image');
        /** Products */ 
    });

    Route::get("{path}", function(){ return redirect()->route('admin.login'); })->where('path', '.+');
});