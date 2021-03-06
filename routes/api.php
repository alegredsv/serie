<?php

use Illuminate\Http\Request;

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
Route::group(['middleware'=>'cors'], function (){

    Route::post('login','Api\AuthenticateController@Authenticate');

    Route::group(['middleware' => 'jwt-auth'], function (){
        Route::get('products', 'Api\ProductsController@index');
        Route::get('products/{product}', 'Api\ProductsController@show');
    });
});
