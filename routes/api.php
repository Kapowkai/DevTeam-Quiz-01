<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers;

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
Route::get('/Testing-api',function (){
   return['message' => 'hello'];
});
Route::get('/data','BookController@index');

Route::get('/data/{id}','BookController@show');
Route::post('/create-data','BookController@store');
Route::put('/update-data/{id}','BookController@update');
Route::delete('/delete-data/{id}','BookController@destroy');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
