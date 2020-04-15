<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', function () {
    return view('auth.login');
});

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

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('engage', 'EngageController');

Route::get('profit', 'HomeController@profit')->name('profit');

Route::get('bill', 'HomeController@bill')->name('bill');

Route::get('zervid', 'HomeController@zervid')->name('zervid');

Route::get('problem', 'HomeController@problem')->name('problem');

Route::get('123/engage/desc', 'EngageController@desc')->name('desc');

Route::get('schedule/engage/workschedule', 'EngageController@workschedule')->name('workschedule');

Route::resource('profile' , 'ProfileController');

Route::get('profile/update/edit', 'EngageController@edit')->name('edit');

Route::post('profile/profileupdatestore', [
    'as' => 'profileupdatestore',
    'uses' => 'ProfileController@profileupdatestore'
]);
Route::resource('profileupdatestore', 'ProfileController' , ['except' => 'profileupdatestore']);

Route::get('rw/engage/reviewer', [
    'as' => 'reviewer',
    'uses' => 'EngageController@reviewer'
]);
Route::resource('engage/reviewer', 'EngageController@reviewer' , ['except' => 'reviewer']);

Route::post('engage/addstore', [
    'as' => 'addstore',
    'uses' => 'EngageController@addstore'
]);
Route::resource('addstore', 'EngageController' , ['except' => 'addstore']);

Route::post('problemstore', [
    'as' => 'problemstore',
    'uses' => 'HomeController@problemstore'
]);
Route::resource('addproblem/problem', 'HomeController' , ['except' => 'problem']);

Route::get('report/admin/report', 'admin\AdminController@report')->name('report');

Route::get('con/engage/confirmwork', 'EngageController@con')->name('con');

Route::get('emp/admin/employee', 'admin\AdminController@emp')->name('emp');

Route::get('prob/admin/prob', 'admin\AdminController@prob')->name('prob');

Route::get('wk/admin/works', 'admin\AdminController@works')->name('works');

Route::get('detail/admin/details', 'admin\AdminController@details')->name('details');

Route::get('ur/admin/customers', 'admin\AdminController@customers')->name('customers');

Route::get('hy/admin/history', 'EngageController@history')->name('history');

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

Route::get('addemp/admin/addemployee', 'admin\AdminController@addemployee')->name('addemployee');

Route::post('employee/addempstore', [
    'as' => 'addempstore',
    'uses' => 'admin\AdminController@addempstore'
]);
Route::resource('addempstore','admin\AdminController' , ['except' => 'addempstore']);

Route::get('engage/reconfirm/{id}', [
    'as' => 'reconfirm',
    'uses' => 'EngageController@reconfirm'
]);
Route::resource('reconfirm','EngageController' , ['except' => 'reconfirm']);
