<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//定义路由组 ，该路由组只有登录的用户可以访问
Route::middleware(['auth'])->group(function (){
    // 显示登录用户地址列表
    Route::get('/address', 'AddressController@index')->name('address.index');
    // 显示地址详情
    Route::get('/address/{id}', 'AddressController@show')->name('address.show');
    // 显示新建地址表单
    Route::get('/address/create', 'AddressController@create')->name('address.create');
    // 新建地址
    Route::post('/address', 'AddressController@store')->name('address.store');
    // 显示修改地址表单
    Route::get('/address/{id}/edit', 'AddressController@edit')->name('address.edit');
    // 修改地址
    Route::put('/address/{id}', 'AddressController@update')->name('address.update');
    // 删除地址
    Route::delete('/address/{id}', 'AddressController@destroy')->name('address.destroy');
}
);

//定义一个路由组，用于增删改查发票信息
Route::middleware(['auth'])->group(function (){
    // 显示发票信息列表
    Route::get('/invoice', 'InvoiceController@index')->name('invoice.index');
    //显示发票详情
    Route::get('/invoice/{id}','InvoiceController@show')->name('invoice.show');
    // 显示新建发票表单
    Route::get('/invoice/create', 'InvoiceController@create')->name('invoice.create');
    // 新建发票
    Route::post('/invoice', 'InvoiceController@store')->name('invoice.store');
    // 显示修改发票表单
    Route::get('/invoice/{id}/edit', 'InvoiceController@edit')->name('invoice.edit');
    // 修改发票
    Route::put('/invoice/{id}', 'InvoiceController@update')->name('invoice.update');
    // 删除发票
    Route::delete('/invoice/{id}', 'InvoiceController@destroy')->name('invoice.destroy');
});


//新建后台管理的各种路由
//后台登录模块路由
Route::get('admin/login','Admin\LoginController@showLoginForm')->name('admin.login.form');
Route::post('admin/login','Admin\LoginController@login')->name('admin.login');

Route::namespace('Admin')->middleware(['admin.auth'])->prefix('admin')->group(function (){
    // 退出登录
    Route::post('/logout','LoginController@logout')->name('admin.logout');
    // 显示管理员列表
    Route::get('/admin','LoginController@index')->name('admin.index');
    // 显示创建管理员表单
    Route::get('/admin/create','LoginController@create')->name('admin.create');
    // 创建管理员
    Route::post('/admin','LoginController@store')->name('admin.store');
    // 显示管理员详情
    Route::get('/admin/{id}','LoginController@show')->name('admin.show');
    // 显示需要修改的管理员表单
    Route::get('/admin/{id}/edit','LoginController@edit')->name('admin.edit');
    // 更新管理员信息
    Route::put('/admin/{id}','LoginController@update')->name('admin.update');
    // 删除管理员
    Route::delete('/admin/{id}','LoginController@destroy')->name('admin.destroy');
});




