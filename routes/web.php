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

<<<<<<< HEAD
=======
	// 新闻
	Route::resource('admin/news','admin\NewsController');

>>>>>>> origin/lz

});


Route::group([],function(){
	//前台路由
	Route::resource('/','home\IndexController');
	//商品的列表页
	Route::resource('/home/goods','home\GoodsController');
	Route::any('/home/cate','home\GoodsController@index');

	
});

//前台购物车
Route::resource('/home/cart','home\CartController');
Route::any('/home/ajaxcart','home\CartController@ajaxcart');

//前台订单
Route::resource('/home/order','home\OrderController');

<<<<<<< HEAD
=======
//前台收货地址
Route::resource('/home/addr','home\AddrController');

//前台我的收藏
Route::resource('/home/collect','home\CollectController');

//前台我的订单
Route::resource('/home/grorder','home\GrOrderController');

>>>>>>> origin/wu

/**
 * 前台登录
 */
Route::any('home/login','home\LoginController@login');
Route::any('home/dologin','home\LoginController@dologin');
Route::any('home/regist','home\RegistController@regist');
Route::any('home/store','home\RegistController@store');
<<<<<<< HEAD
Route::any('home/captcha','home\RegistController@captcha');
Route::any('home/jihuo','home\RegistController@jihuo');
=======


//新闻详情页
Route::get('/home/news/detail','admin\NewsController@detail');
>>>>>>> origin/lz
