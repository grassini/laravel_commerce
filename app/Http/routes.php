<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'WelcomeController@index');

Route::get('exemplo', 'WelcomeController@exemplo');

Route::get('home', 'HomeController@index');

Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);

/*Admin*/
Route::group(['prefix' => 'admin'], function(){

    Route::get('', function(){
       return "Página Inicial do Admin";
    });

    /*admin/categories*/
    Route::group(['prefix' => 'categories'], function(){
        Route::get('', 'AdminCategoriesController@index');
        Route::get('create', 'AdminCategoriesController@create');
        Route::get('update', 'AdminCategoriesController@update');
        Route::get('delete', 'AdminCategoriesController@delete');
    });

    /*admin/products*/
    Route::group(['prefix'=> 'products'], function(){
        Route::get('', 'AdminProductsController@index');
        Route::get('create', 'AdminProductsController@create');
        Route::get('update', 'AdminProductsController@update');
        Route::get('delete', 'AdminProductsController@delete');
    });

});



