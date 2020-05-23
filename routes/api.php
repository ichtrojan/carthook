<?php

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

Route::group(['middleware' => 'api'], function () {
    Route::group(['prefix' => 'users'], function () {
        Route::get('/', 'UserController@all');
        Route::get('{user}', 'UserController@get');
        Route::get('{user}/posts', 'UserController@posts');
        Route::get('{user}/posts/{post}/comments', 'PostController@comments');
    });
});
