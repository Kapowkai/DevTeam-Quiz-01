<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/login','\App\Http\Controllers\User\LoginController@showLoginForm')->name('login');
Route::get('/auth/redirect','\App\Http\Controllers\User\LoginController@redirectToProvider');
Route::get('/auth/callback','\App\Http\Controllers\User\LoginController@handleProviderCallback');
Route::post('/logout','\App\Http\Controllers\User\LogoutController@logout')->name('logout');



Route::get('/home', function () {
    $books = \App\Book::all()->keyBy->id;
    //dd($books);
    return view('home',compact('books'));
});
Route::get('/create', function () {
    return view('create');
});
Route::get('/change/{id}', '\App\Http\Controllers\BookController@show');
//Route::get('/api/data','\App\Http\Controllers\APIController@index');
//Route::get('/home','\App\Http\Controllers\User\HomeController@index');
