<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('mpesa/stk/push', 'MpesaController@customerMpesaSTKPush');
Route::post('mpesa/validation', 'MpesaController@mpesaValidation');
Route::post('mpesa/transaction/confirmation', 'MpesaController@mpesaConfirmation');

Route::post('stk/push', 'MpesaController@stk');



Route::group(['namespace' => 'API'], function () {
    Route::post('/stk', 'MpesaController@initSTK');
    Route::post('/payment/callback', 'MpesaController@receiveMpesaCallback');
    //products
    Route::resource('/products', 'ProductsController');
    Route::put('/products', 'ProductsController@update');
    // Route::post('/products', 'ProductsController@store');

    Route::post('v1/access/token', 'MpesaController@generateAccessToken');
// Route::post('v1/hlab/stk/push', 'MpesaController@customerMpesaSTKPush');


});

//users
Route::group(['namespace' => 'API'], function() {
    Route::resource('/users', 'UserController');
    Route::put('/users', 'UserController@update');
});

//users
// Route::prefix('/user')->group ( function() {
//     Route::post('/login', 'Auth\LoginController@login');
//     Route::resource('/User', 'API\UserController');
//     Route::put('/User', 'API\UserController@update');
//     Route::middleware('api')->get('/all', 'API\UserController@index');
// });
