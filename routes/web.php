<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

// login
Route::get('/', function () {
    return view('auth.login');
});

//Route login for user
Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', 'HomeController@index');
});
//Route login for admin
Route::group(['prefix' => 'admin'], function(){
    Route::group(['middleware' => ['admin']], function(){
        Route::get('dashboard', 'admin\AdminController@index');
    });
});
// end login

// base route
Route::get('/home', 'HomeController@index')->name('home');

Route::get('profit', 'HomeController@profit')->name('profit'); //กำไร-ขาดทุน

Route::get('zervid', 'HomeController@zervid')->name('zervid');

Route::get('123/engage/desc', 'EngageController@desc')->name('desc'); //ตารางรายละเอียดการจ้างงาน

Route::get('schedule/engage/workschedule', 'EngageController@workschedule')->name('workschedule'); //หน้าปฎิทิน

// end base route

// 1
// 2
// 3
// 4
// 5

// admin route
Route::resource('profile' , 'ProfileController'); //ข้อมูลส่วนตัว

Route::get('profile/update/edit', 'EngageController@edit')->name('edit'); //แก้ไขข้อมูลส่วนตัว
Route::post('profile/profileupdatestore', [
    'as' => 'profileupdatestore',
    'uses' => 'ProfileController@profileupdatestore'
]);
Route::resource('profileupdatestore', 'ProfileController' , ['except' => 'profileupdatestore']);

Route::get('report/admin/report', 'admin\AdminController@report')->name('report');

Route::get('prob/admin/prob', 'admin\AdminController@prob')->name('prob');

Route::get('wk/admin/works', 'admin\AdminController@works')->name('works');

Route::get('detail/admin/details/{id}', 'admin\AdminController@details')->name('details');

Route::get('ur/admin/customers', 'admin\AdminController@customers')->name('customers');

Route::get('emp/admin/employee', 'admin\AdminController@emp')->name('emp');

Route::get('addemp/admin/addemployee', 'admin\AdminController@addemployee')->name('addemployee');
Route::post('employee/addempstore', [
    'as' => 'addempstore',
    'uses' => 'admin\AdminController@addempstore'
]);
Route::resource('addempstore','admin\AdminController' , ['except' => 'addempstore']);

Route::get('editemp/admin/editemp/{id}', 'admin\AdminController@editemp')->name('editemp');
Route::post('profile/empupdatestore', [
    'as' => 'empupdatestore',
    'uses' => 'admin\AdminController@empupdatestore'
]);
Route::resource('empupdatestore', 'admin\AdminController' , ['except' => 'empupdatestore']); //ฟอร์มแก้ไข

Route::get('editcustomer/admin/editcustomer', 'admin\AdminController@editcustomer')->name('editcustomer');

Route::get('editcustomer/admin/editcustomer/{id}', 'admin\AdminController@editcustomer')->name('editcustomer');
Route::post('profile/customerupdatestore', [
    'as' => 'customerupdatestore',
    'uses' => 'admin\AdminController@customerupdatestore'
]);
Route::resource('customerupdatestore', 'admin\AdminController' , ['except' => 'customerupdatestore']); //ฟอร์มแก้ไข


Route::get('con1/admin/confirm1', 'admin\AdminController@confirm1')->name('confirm1');

Route::get('admin/reconfirm/{id}', [
    'as' => 'reconfirm',
    'uses' => 'admin\AdminController@reconfirm'
]);
Route::resource('reconfirm','admin\AdminController' , ['except' => 'reconfirm']);

Route::get('con2/admin/confirm2', 'admin\AdminController@confirm2')->name('confirm2');

Route::get('admin/reconfirm2/{id}', [
    'as' => 'reconfirm2',
    'uses' => 'admin\AdminController@reconfirm2'
]);
Route::resource('reconfirm2','admin\AdminController' , ['except' => 'reconfirm2']);

Route::get('con3/admin/confirm3', 'admin\AdminController@confirm3')->name('confirm3');

Route::get('admin/reconfirm3/{id}', [
    'as' => 'reconfirm3',
    'uses' => 'admin\AdminController@reconfirm3'
]);
Route::resource('reconfirm3','admin\AdminController' , ['except' => 'reconfirm3']);

Route::get('con4/admin/confirm4', 'admin\AdminController@confirm4')->name('confirm4');

Route::get('admin/reconfirm4/{id}', [
    'as' => 'reconfirm4',
    'uses' => 'admin\AdminController@reconfirm4'
]);
Route::resource('reconfirm4','admin\AdminController' , ['except' => 'reconfirm4']);

// Route::post('report2/admin/report2', 'admin\AdminController@report2')->name('report2');
Route::post('admin/report2', [
    'as' => 'report2',
    'uses' => 'admin\AdminController@report2'
]);
Route::resource('report2', 'admin\AdminController' , ['except' => 'report2']);

Route::get('admin/adminbill/{id}', [
    'as' => 'adminbill',
    'uses' => 'admin\AdminController@adminbill'
]);
Route::resource('admin/adminbill', 'admin\AdminController@adminbill' , ['except' => 'adminbill']); //หน้าบิลชำระเงิน
// end admin route

// 1
// 2
// 3
// 4
// 5

// custommer route
Route::get('engage', 'EngageController@index')->name('index'); //หน้าการจ้างงาน

Route::get('engage/destroy/{id}', [
    'as' => 'destroy',
    'uses' => 'EngageController@destroy'
]);
Route::resource('destroy','EngageController' , ['except' => 'destroy']); //ยกเลิกการจ้างงาน

Route::get('bill', 'HomeController@bill')->name('bill'); //บิล

Route::get('problem', 'HomeController@problem')->name('problem'); //แจ้งปัญหา (ลูกค้า)
Route::post('problemstore', [
    'as' => 'problemstore',
    'uses' => 'HomeController@problemstore'
]);
Route::resource('addproblem/problem', 'HomeController' , ['except' => 'problem']);

Route::get('rw/engage/reviewer', [
    'as' => 'reviewer',
    'uses' => 'EngageController@reviewer'
]);
Route::resource('engage/reviewer', 'EngageController@reviewer' , ['except' => 'reviewer']); //หน้าบิลชำระเงิน

Route::post('engage/addstore', [
    'as' => 'addstore',
    'uses' => 'EngageController@addstore'
]);
Route::resource('addstore', 'EngageController' , ['except' => 'addstore']); //หน้าเพิ่มข้อมมูลการจ้างงาน

Route::get('bill/deposit', 'BillController@deposit')->name('deposit');
Route::post('bill/addbillstore', [
    'as' => 'addbillstore',
    'uses' => 'BillController@addbillstore'
]);
Route::resource('addbillstore','BillController' , ['except' => 'addbillstore']);

Route::get('bill/monney', 'BillController@monney')->name('monney');
Route::post('bill/addmonneystore', [
    'as' => 'addmonneystore',
    'uses' => 'BillController@addmonneystore'
]);
Route::resource('addmonneystore','BillController' , ['except' => 'addmonneystore']);

Route::get('hy/admin/history', 'EngageController@history')->name('history');

Route::get('zoomhistory/engage/zoomhistory/{id}', 'EngageController@zoomhistory')->name('zoomhistory');

Route::get('zoombill/engage/zoombill/{id}', 'EngageController@zoombill')->name('zoombill');
// end custommer route
