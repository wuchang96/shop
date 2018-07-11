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
//后台登录
Route::any('admin/login','admin\LoginController@login');
Route::any('admin/dologin','admin\LoginController@dologin');
Route::any('admin/captcha','admin\LoginController@captcha');

//用户
Route::group(['middleware'=>'login'],function(){

	//用户
	Route::any('admin/index','admin\IndexController@index');
	Route::resource('admin/user','admin\UserController');
	
	//退出登录
	Route::any('admin/logout','admin\LoginController@logout');

	// 轮播图
	Route::resource('admin/lunbo','admin\LunboController');
	
	//商品
	Route::resource('admin/goods','admin\GoodsController');


	//商品类别
	Route::resource('admin/cate','admin\CateController');

	//订单
	Route::resource('/admin/order','admin\OrderController');
	Route::get('/admin/details/{id}','admin\OrderController@details');

	//站点
	Route::resource('admin/site','admin\SiteController');
	Route::get('admin/detail/{id}','admin\SiteController@detail');
	
	// 广告
	Route::resource('admin/guanggao','admin\GuangController');

	Route::resource('admin/gcate','admin\GcateController');


	// 友情链接
	Route::resource('admin/link','admin\LinksController');

	// 新闻
	Route::resource('admin/news','admin\NewsController');


});


Route::group([],function(){
	//前台路由
	Route::resource('/','home\IndexController');

	Route::resource('/home/goods','home\GoodsController');

	
});

/**
 * 前台登录
 */
Route::any('home/login','home\LoginController@login');
Route::any('home/regist','home\RegistController@regist');
Route::any('home/store','home\RegistController@store');


//新闻详情页
Route::get('/home/news/detail','admin\NewsController@detail');