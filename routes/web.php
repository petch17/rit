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

Route::get('zervid', 'HomeController@zervid')->name('zervid');

Route::get('problem', 'HomeController@problem')->name('problem');

Route::get('engage/123/desc', 'EngageController@desc')->name('desc');

Route::get('engage/schedule/workschedule', 'EngageController@workschedule')->name('workschedule');

Route::resource('profile' , 'ProfileController');

Route::get('profile/update/edit', 'EngageController@edit')->name('edit');

Route::post('profile/profileupdatestore', [
    'as' => 'profileupdatestore',
    'uses' => 'ProfileController@profileupdatestore'
]);
Route::resource('profileupdatestore', 'ProfileController' , ['except' => 'profileupdatestore']);



Route::post('engage/addstore', [
    'as' => 'addstore',
    'uses' => 'EngageController@addstore'
]);
Route::resource('addstore', 'EngageController' , ['except' => 'addstore']);

// Route::post('engage/detailstore', [
//     'as' => 'detailstore',
//     'uses' => 'EngageController@detailstore'
// ]);
// Route::resource('detailstore', 'EngageController' , ['except' => 'detailstore']);

// Route::post('engage/dayworkstore', [
//     'as' => 'dayworkstore',
//     'uses' => 'EngageController@dayworkstore'
// ]);
// Route::resource('dayworkstore', 'EngageController' , ['except' => 'dayworkstore']);

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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('dashboard', 'admin\AdminController@index');
    });
});


Route::get('admin/prob/prob', 'admin\AdminController@prob')->name('prob');

Route::get('admin/wk/works', 'admin\AdminController@works')->name('works');

Route::get('admin/detail/details', 'admin\AdminController@details')->name('details');

Route::get('admin/ur/customers', 'admin\AdminController@customers')->name('customers');


Route::get('bill/deposit', 'BillController@deposit')->name('deposit');

Route::get('bill/monney', 'BillController@monney')->name('monney');

Route::post('bill/addbillstore', [
    'as' => 'addbillstore',
    'uses' => 'BillController@addbillstore'
]);
Route::resource('addbillstore','BillController' , ['except' => 'addbillstore']);

Route::post('bill/addmonneystore', [
    'as' => 'addmonneystore',
    'uses' => 'BillController@addmonneystore'
]);
Route::resource('addmonneystore','BillController' , ['except' => 'addmonneystore']);
