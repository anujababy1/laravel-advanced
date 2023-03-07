<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment','App\Http\Controllers\PaymentGatewayController@index');

Route::get('/channels','App\Http\Controllers\ChannelController@index');
Route::get('/posts/create','App\Http\Controllers\PostController@create');

