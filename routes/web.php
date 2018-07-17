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
	Route::get('/admin/details/{oid}','admin\OrderController@details');
	Route::get('/admin/fa/{oid}','admin\OrderController@fa');

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

<<<<<<< HEAD
	//评论管理
	Route::get('admin/comment','admin\CommentController@index');
	Route::post('admin/comment/ajaxStatu','admin\CommentController@ajaxStatu');

=======
>>>>>>> origin/wjc
});


Route::group([],function(){
	//前台路由
	Route::resource('/','home\IndexController');
	//商品的列表页
	Route::resource('/home/goods','home\GoodsController');
	Route::any('/home/cate','home\GoodsController@index');
<<<<<<< HEAD


=======
	
>>>>>>> origin/wjc
	//个人中心
	Route::any('home/ucenter','home\UcenterController@ucenter');
	Route::any('home/update/{id}','home\UcenterController@update');

	//退出登录
	Route::any('home/logout','home\LoginController@logout');
	
	//前台订单
	Route::resource('/home/order','home\OrderController');

	//前台收货地址
	Route::resource('/home/addr','home\AddrController');

	//前台我的收藏
	Route::resource('/home/collect','home\CollectController');
	Route::any('/home/delete/{id}','home\CollectController@delete');

	//前台我的订单
	Route::resource('/home/grorder','home\GrOrderController');
	//新闻详情页
	Route::get('/home/news/detail','admin\NewsController@detail');

<<<<<<< HEAD
=======

>>>>>>> origin/wjc
});

//前台购物车
Route::resource('/home/cart','home\CartController');
Route::any('/home/ajaxcart','home\CartController@ajaxcart');
Route::any('/home/ajaxjia','home\CartController@ajaxjia');
Route::any('/home/ajaxjian','home\CartController@ajaxjian');
Route::any('/home/ajaxdx','home\CartController@ajaxdx');

/**
 * 前台登录
 */
Route::any('home/login','home\LoginController@login');
Route::any('home/dologin','home\LoginController@dologin');
/**
 * 前台注册
 */
Route::any('home/regist','home\RegistController@regist');
Route::any('home/store','home\RegistController@store');
<<<<<<< HEAD
/**
 * 前台验证码
 */


/**
 * 前台验证码
 */
=======

/**
 * 前台验证码
 */
>>>>>>> origin/wjc
Route::any('home/captcha','home\RegistController@captcha');
/**
 * 前台账号激活
 */
Route::any('home/jihuo','home\RegistController@jihuo');
<<<<<<< HEAD





=======

>>>>>>> origin/wjc

/**
 * 找回密码
 */
Route::any('home/back','home\BackController@index');
Route::any('home/tel','home\BackController@tel');
Route::any('home/code','home\BackController@code');
Route::any('home/npwd','home\BackController@npwd');
Route::any('home/pwd','home\BackController@pwd');

<<<<<<< HEAD
=======

//新闻详情页
Route::get('/home/news/detail','admin\NewsController@detail');

>>>>>>> origin/wjc
