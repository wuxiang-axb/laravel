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
Auth::routes();
//Route::get('/home', 'HomeController@index')->name('home');


//前台
Route::get('/','Home\IndexController@index');

//分类页面
Route::get('/types/{id}','Home\TypesController@index');

//商品详情
Route::get('/goods/{id}','Home\GoodsController@index');








//后台
Route::group(['namespace'=>'Admin','prefix'=>'admin'],function(){
	//后台首页路由
	Route::get('/','IndexController@index');
	//后台管理员管理
	Route::resource('admin','AdminController');
	//后台用户管理
	Route::resource('user','UserController');
});


