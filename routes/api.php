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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'Localization'], function () {
    Route::post('/send-code-by-email', 'AuthController@sendCodeByEmail');

    Route::get('/feedback/index', 'FeedbackController@index');


    Route::group(['middleware' => 'guest:api'], function () {
        Route::post('/register/step-1', 'AuthController@create_user');

        Route::post('/register/step-2', 'AuthController@verify_emails');

        Route::post('/register/step-3', 'AuthController@verify_2fa');
    });

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('/feedback/create', 'FeedbackController@create')->middleware('role:premium');
    });
});

//coinbase 

// Route::post('/webhook', 'FeedbackController@testPost');
