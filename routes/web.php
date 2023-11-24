<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function () use ($router) {
    $router->post('/register', 'ApiAuthController@register');
    $router->post('/login', 'ApiAuthController@login');

    // List Category
    $router->get('/category', 'ApiProductController@indexCategory');

    // Product
    $router->get('/product', 'ApiProductController@index');
    $router->get('/product/{id}', 'ApiProductController@show');

    // Transaction
    $router->get('/transaction', 'ApiTransactionController@indexAll'); //!! ADMIN
    $router->post('/user/transaction/status/{id}', 'ApiTransactionController@updateStatus'); //!! ADMIN

    $router->group(['middleware' => 'auth'], function () use ($router) {
        // Auth
        $router->post('/logout', 'ApiAuthController@logout');
        $router->get('/user', 'ApiAuthController@user'); //!! ADMIN

        // Update Profile
        $router->post('/user/update', 'ApiAuthController@update');
        $router->post('/user/change-password', 'ApiAuthController@changePassword');

        // Product
        $router->post('/product', 'ApiProductController@store'); //!! ADMIN
        $router->post('/product/{id}', 'ApiProductController@updateProduct'); //!! ADMIN
        $router->delete('/product/{id}', 'ApiProductController@destroy'); //!! ADMIN

        // Transaction
        $router->get('/user/transaction', 'ApiTransactionController@index');
        $router->get('/user/transaction/{id}', 'ApiTransactionController@show');
        $router->post('/user/transaction', 'ApiTransactionController@store');
        $router->post('/user/transaction/{id}', 'ApiTransactionController@update');
        $router->delete('/user/transaction/{id}', 'ApiTransactionController@destroy');

        // Notif, History, & Cart
        $router->get('/user/cart', 'ApiTransactionController@indexCart');
        $router->get('/user/cart/{id}', 'ApiTransactionController@indexCartDetail');
        $router->get('/user/history', 'ApiTransactionController@indexHistory');
        $router->get('/user/notification', 'ApiTransactionController@indexNotification');
        $router->post('/user/notification/{id}', 'ApiTransactionController@readNotification');
    });
});
