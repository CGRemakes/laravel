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

Route::get('/victories', 'VictoryController@index');
Route::get('/victories/{id}', 'VictoryController@show');
Route::post('/victories', 'VictoryController@store');
Route::delete('/victories/{id}', 'VictoryController@destroy');
Route::post('/victories/{id}', 'VictoryController@update');