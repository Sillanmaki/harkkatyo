<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

    Route::get('/', 'PagesController@home');

    Route::get('/about', 'PagesController@about');

    Route::get('/areas', 'PagesController@area');


    Route::get('/cart', 'CartController@cart');

    Route::post('/cart', 'CartController@addCart');

    Route::get('/clear-cart', 'CartController@clear');

    Route::get('/checkout', [
        'middleware' => 'auth',
        'uses' => 'CartController@checkout'
    ]);

    Route::get('/cart/{item_id}/increase', 'CartController@increase');

    Route::get('/cart/{item_id}/decrease', 'CartController@decrease');

    Route::get('/cart/{item_id}/delete', 'CartController@delete');




    Route::get('/products', 'ProductController@index');

    Route::get('/products/{product}', 'ProductController@show');


    Route::put('/products', 'ProductController@add');

    Route::get('/products/{product}/edit', 'ProductController@edit');

    Route::patch('/products/{product}', 'ProductController@update');

    Route::get('/products/{product}/delete', 'ProductController@delete');


    Route::get('/orders', 'OrdersController@index');

    Route::get('orders/{order}', 'OrdersController@show');


    Route::auth();

    Route::get('/home', 'HomeController@index');

    Route::get('/edit-users', 'HomeController@editUsers');

    Route::patch('/edit-users/{user}', 'HomeController@update');

    Route::get('/edit-users/{user}/delete', 'HomeController@delete');

});


