<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('engage', 'EngageController');

Route::get('profit', 'HomeController@profit')->name('profit');
Route::get('bill', 'HomeController@bill')->name('bill');
Route::get('problem', 'HomeController@problem')->name('problem');

Route::post('engage/addstore', [
    'as' => 'addstore',
    'uses' => 'EngageController@addstore'
]);
Route::resource('addstore', 'EngageController' , ['except' => 'addstore']);

Route::post('engage/checkworkstore', [
    'as' => 'checkworkstore',
    'uses' => 'EngageController@checkworkstore'
]);
Route::resource('checkworkstore', 'EngageController' , ['except' => 'checkworkstore']);

Route::get('engage/addcreate', 'EngageController@addcreate' , ['except' => 'addcreate']);


Route::post('problemstore', [
    'as' => 'problemstore',
    'uses' => 'HomeController@problemstore'
]);
Route::resource('addproblem/problem', 'HomeController' , ['except' => 'problem']);
//Route for user
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home','HomeController@index');
});
//Route for admin
Route::group(['prefix =>','admin'], function(){
    Route::group(['middleware'=>['admin']],function(){
        Route::get('/dashboard','admin\AdminController@index');
    });

});
