<?php

use Illuminate\Support\Facades\Route;
use App\Postcard;
use Illuminate\Support\Str;
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

Route::get('/facades',function(){

    // $a = new App\PostcardSendingService('us',1,2);
    // $a->hello('hai a','a@gmail.com');
    
    Postcard::hello('hai anuja','anuja@gmail.com');
    
});

Route::get('/macro',function(){
    
    dd(Str::formatPhoneNumber('4375993359'));

   
    
});

