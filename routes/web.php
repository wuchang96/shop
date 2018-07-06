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

Route::any('admin/login','admin\LoginController@login');
Route::any('admin/dologin','admin\LoginController@dologin');
Route::any('admin/captcha','admin\LoginController@captcha');

//用户
Route::group(['middleware'=>'login'],function(){

	Route::any('admin/index','admin\IndexController@index');
	Route::resource('admin/user','admin\UserController');
	Route::any('admin/logout','admin\LoginController@logout');
	

});

//商品
Route::resource('goods','admin\GoodsController');

//商品类别
Route::resource('admin/cate','admin\CateController');

//订单
Route::resource('/admin/order','admin\OrderController');
Route::get('/admin/details/{id}','admin\OrderController@details');

// 轮播图
Route::resource('admin/lunbo','admin\LunboController');

// 广告
Route::resource('admin/guanggao','admin\GuangController');