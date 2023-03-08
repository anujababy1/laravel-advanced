<?php

use Illuminate\Support\Facades\Route;
use App\Postcard;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Support\LazyCollection;
use App\Models\Post;
use App\Models\Job;
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


// NOTE: FOR DEMO ALL ROUTE ARE CRAETE AS GET

Route::get('/customers','App\Http\Controllers\CustomerController@index');
Route::get('/customers/store','App\Http\Controllers\CustomerController@store');
Route::get('/customers/{customer}','App\Http\Controllers\CustomerController@view');
Route::get('/customers/{customer}/update','App\Http\Controllers\CustomerController@update');
Route::get('/customers/{customer}/delete','App\Http\Controllers\CustomerController@destroy');

Route::get('/lazy', function(){
    // $collection = Collection::times(10000000)
    // ->map(function($number){ 
    //     return pow(2,$number);
    // })->all();

    // $collection = LazyCollection::times(1000000)
    // ->map(function($number){ 
    //     return pow(2,$number);
    // })->all();

    //dd(Post::cursor());
    // foreach(Post::cursor() as $post){
    //     dd(post);
    // }

    //dd($collection);
    return 'DONE';
});

Route::get('/jobs',function(){
    // $job = Job::create([
    //     'title'=> "Laravel Developer"
    // ]);
    //  echo $job;

    //  $job->delete(); /* soft delete the row */
    //  $job->restore(); /* to restore the  deleted record */
        
    // $all_jobs = Job::get();  /* to get the soft deleted job also*/
    // echo $all_jobs;

    //  $all_jobs = Job::withTrashed()->get();  /* to get the soft deleted job also*/
    //  echo $all_jobs;

    Job::where('id',1)->forceDelete();  /* force delete the record */
});