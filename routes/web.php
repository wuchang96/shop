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

/**
 * 后台路由
 */
//用户
Route::resource('/users','admin\UserController');

//商品
Route::resource('goods','admin\GoodsController');

//商品类别
Route::resource('cate','admin\CateController');

//订单
Route::resource('/order','admin\OrderController');

//