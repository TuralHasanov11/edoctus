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


Route::prefix('/user')->group(function(){
    Route::post('/login', 'api\v1\LoginController@login');
    Route::post('/register', 'api\v1\RegisterController@register');

    Route::post('/register-doctor', 'api\v1\RegisterController@registerDoctor');
    Route::get('/doctors', 'api\v1\users\UsersController@doctors');

    Route::middleware('auth:api')->get('/fetch','api\v1\users\UsersController@user');
});

Route::prefix('/tests')->group(function(){
    Route::post('/calculate', 'api\v1\users\UsersController@calculate');
});