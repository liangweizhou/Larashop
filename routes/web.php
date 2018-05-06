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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//路由测试

Route::get('/test', function () {
    return view('index');
});


// 前端登录及未登录用户可访问路由组
// 单品搜索
Route::get('category/{catid}/search', 'ItemController@index')->name('item.index');
Route::post('category/{catid}/search', 'ItemController@search')->name('item.search');
// 商品详情，即商品所包含的所有单品的详情
Route::get('product/{id}', 'ProductController@show')->name('product.show');
Route::get('product/{id}/item/{itemid}', 'ProductController@show')->name('product.show.item');




//新建后台管理的各种路由
//后台登录模块路由
Route::get('admin/login','Admin\LoginController@showLoginForm')->name('admin.login.form');
Route::post('admin/login','Admin\LoginController@login')->name('admin.login');

//先把middleware去掉，做其他的工作->middleware(['admin.auth'])
Route::namespace('Admin')->prefix('admin')->group(function (){
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

    //后台商品的处理
    Route::resource('product', 'ProductController')->names([
        'index' => 'admin.product.index',
        'show' => 'admin.product.show',
        'create' => 'admin.product.create',
        'store' => 'admin.product.store',
        'edit' => 'admin.product.edit',
        'update' => 'admin.product.update',
        'destroy' => 'admin.product.destroy'
    ])->parameters([
        'product' => 'id'
    ]);

    // 后台单品的处理
    Route::resource('item', 'ItemController')->names([
        'index' => 'admin.item.index',
        'show' => 'admin.item.show',
        'create' => 'admin.item.create',
        'store' => 'admin.item.store',
        'edit' => 'admin.item.edit',
        'update' => 'admin.item.update',
        'destroy' => 'admin.item.destroy'
    ])->parameters([
        'item' => 'id'
    ]);

    // 后台属性的处理
    Route::resource('category', 'CategoryController')->names([
        'index' => 'admin.category.index',
        'show' => 'admin.category.show',
        'create' => 'admin.category.create',
        'store' => 'admin.category.store',
        'edit' => 'admin.category.edit',
        'update' => 'admin.category.update',
        'destroy' => 'admin.category.destroy'
    ])->parameters([
        'category' => 'id'
    ]);

    // 后台优惠券的管理
    Route::resource('coupon', 'CouponsController')->names([
        'index' => 'admin.coupon.index',
        'show' => 'admin.coupon.show',
        'create' => 'admin.coupon.create',
        'store' => 'admin.coupon.store',
        'edit' => 'admin.coupon.edit',
        'update' => 'admin.coupon.update',
        'destroy' => 'admin.coupon.destroy'
    ])->parameters([
        'coupon' => 'id'
    ]);




//// 显示商品列表
//    Route::get('/product','ProductController@index')->name('product.index');
//// 显示创建商品表单
//    Route::get('/product/create','ProductController@create')->name('product.create');
//// 创建商品
//    Route::post('/product','ProductController@store')->name('product.store');
//// 显示商品详情
//    Route::get('/product/{id}','ProductController@show')->name('product.show');
//// 显示需要修改的商品表单
//    Route::get('/product/{id}/edit','ProductController@edit')->name('product.edit');
//// 更新商品信息
//    Route::put('/product/{id}','ProductController@update')->name('product.update');
//// 删除商品
//    Route::delete('/product/{id}','ProductController@destroy')->name('product.destroy');


});




//  前台功能的实现

// 定义路由组 ，该路由组只有登录的用户可以访问
Route::middleware(['auth'])->group(function (){
    //  用户收货地址添加
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


    //用户发票的操作
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

    // 用户个人信息的操作
    // 显示个人信息详情
    Route::get('/userinfo','UserController@show')->name('userinfo.show');
    // 显示需要修改的管理员表单
    Route::get('/userinfo/edit','UserController@edit')->name('userinfo.edit');
    // 更新用户信息
    Route::put('/userinfo','UserController@update')->name('userinfo.update');

    // 用户购物车
    //显示购物车全部信息
    Route::get('/cart', 'CartController@index')->name('cart.index');
//    //显示购物车详情
//    Route::get('/invoice/{id}','InvoiceController@show')->name('invoice.show');
    // 加入购物车
    Route::post('/cart', 'CartController@store')->name('cart.store');
    // 修改发票
    Route::put('/cart/{id}', 'CartController@update')->name('cart.update');
    // 移出购物车
    Route::delete('/cart/{id}', 'CartController@destroy')->name('cart.destroy');

    // 用户订单, 目前只使用查看订单的路由，订单不能修改，或者可以修改订单状态不显示订单
    Route::get('/order','OrderController@index')->name('order.index');
// 生成订单的页面
   // Route::get('/');
    // 查看用户订单详情
    Route::get('/order/{id}','OrderController@show')->name('order.show');

    // 用户收藏和购物车类似
    //显示收藏全部信息
    Route::get('/favourite', 'FavouriteController@index')->name('favourite.index');
    // 加入收藏
    Route::post('/favourite', 'FacouriteController@store')->name('favourite.store');
    // 移出收藏
    Route::delete('/favourite/{id}', 'FavouriteController@destroy')->name('favourite.destroy');

    // 前台的商品的展示,
    //Route::get('/product','ProductController@index')->name('product.index');

   // 进入个人优惠券列表
    Route::get('coupon','CouponController@index')->name('conpon.index');





}
);


//进入所有购物券的列表，不需要id验证


