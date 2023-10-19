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
    $router->get('/user/transaction/all', 'ApiTransactionController@indexAll'); //!! ADMIN
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

// use App\Http\Controllers\ApiAuthController;
// use App\Http\Controllers\ApiProductController;
// use App\Http\Controllers\ApiTransactionController;
// use Illuminate\Support\Facades\Route;

// /*
// |--------------------------------------------------------------------------
// | API Routes
// |--------------------------------------------------------------------------
// |
// | Here is where you can register API routes for your application. These
// | routes are loaded by the RouteServiceProvider within a group which
// | is assigned the "api" middleware group. Enjoy building your API!
// |
//  */

// Route::group(['middleware' => 'api'], function ($router) {
//     // Auth
//     Route::post('register', [ApiAuthController::class, 'register']);
//     Route::post('login', [ApiAuthController::class, 'login']);
//     Route::post('logout', [ApiAuthController::class, 'logout']);
//     Route::post('refresh', [ApiAuthController::class, 'refresh']); //!! ADMIN
//     Route::get('user', [ApiAuthController::class, 'user']); //!! ADMIN

//     // Update Profil
//     Route::post('user/update', [ApiAuthController::class, 'update']);
//     Route::post('user/change-password', [ApiAuthController::class, 'changePassword']);

//     // List Category
//     Route::get('category', [ApiProductController::class, 'indexCategory']);

//     // Transaksi
//     Route::get('user/transaction/all', [ApiTransactionController::class, 'indexAll']); //!! ADMIN
//     Route::get('user/transaction', [ApiTransactionController::class, 'index']);
//     Route::get('user/transaction/{id}', [ApiTransactionController::class, 'show']);
//     Route::post('user/transaction', [ApiTransactionController::class, 'store']);
//     Route::post('user/transaction/{id}', [ApiTransactionController::class, 'update']);
//     Route::delete('user/transaction/{id}', [ApiTransactionController::class, 'destroy']);
//     Route::post('user/transaction/status/{id}', [ApiTransactionController::class, 'updateStatus']); //!! ADMIN

//     // Notif & History & Cart
//     Route::get('user/cart', [ApiTransactionController::class, 'indexCart']);
//     Route::get('user/cart/{id}', [ApiTransactionController::class, 'indexCartDetail']);
//     Route::get('user/history', [ApiTransactionController::class, 'indexHistory']);
//     Route::get('user/notification', [ApiTransactionController::class, 'indexNotification']);
//     Route::post('user/notification/{id}', [ApiTransactionController::class, 'readNotification']);
// });

// // Product
// Route::apiResource('product', ApiProductController::class);
