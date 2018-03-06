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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',['as'=>'trangchu','uses'=>'PageController@getTrangChu']);

Route::get('loai-san-pham/{id}/{url}',['as'=>'loaisanpham','uses'=>'PageController@getTypeProduct']);

Route::get('san-pham/{id}/{url}',['as'=>'sanpham','uses'=>'PageController@getDetail']);

Route::get('add-to-cart/{id}',['as'=>'themgiohang','uses'=>'PageController@getAddtoCart']);

Route::get('delete-cart/{id}',['as'=>'xoagiohang','uses'=>'PageController@getDeleteItemCart']);

Route::get('gio-hang',['as'=>'giohang','uses'=>'PageController@getShoppingCart']);

Route::post('ajax/xulycart',['as'=>'xulycart','uses'=>'PageController@postXyliCart']);

Route::post('ajax/xulycartqty',['as'=>'xulycartqty','uses'=>'PageController@postAjaxAddCart']);

// Route::get("dang-nhap",[''])

Route::get('admin/login','UserController@getAdminLogin');

Route::post('admin/login','UserController@postAdminLogin');

Route::get('admin/logout','UserController@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'loginAdmin'],function(){

	Route::group(['prefix'=>'loai-san-pham'],function(){

		Route::get("danh-sach",['as'=>'danhsach','uses'=>'TypePController@getListType']);

		Route::get("them",['as'=>'them','uses'=>'TypePController@getAddType']);

		Route::post("them",['as'=>'them','uses'=>'TypePController@postAddType']);

		Route::get("xoa/{id}",['as'=>'xoa','uses'=>'TypePController@getDeleteType']);

		Route::get("sua/{id}",'TypePController@getEditType');

		Route::post('sua/{id}','TypePController@postEditType');

	});
	Route::group(['prefix'=>'san-pham'],function(){

		Route::get("danh-sach",['as'=>'danhsach','uses'=>'ProductController@getListProduct']);

		Route::get("them",['as'=>'them','uses'=>'ProductController@getAddProduct']);

		Route::post("them",['as'=>'them','uses'=>'ProductController@postAddProduct']);

		Route::get("xoa/{id}",['as'=>'xoa','uses'=>'ProductController@getDeleteProduct']);

		Route::get("sua/{id}",'ProductController@getEditProduct');

		Route::post('sua/{id}','ProductController@postEditProduct');

	});
	Route::group(['prefix'=>'user'],function(){

		Route::get("danh-sach",['as'=>'danhsach','uses'=>'UserController@getListUser']);

		Route::get("them",['as'=>'them','uses'=>'UserController@getAddUser']);

		Route::post("them",['as'=>'them','uses'=>'UserController@postAddUser']);

		Route::get("xoa/{id}",['as'=>'xoa','uses'=>'UserController@getDeleteUser']);

		Route::get("sua/{id}",'UserController@getEditUser');

		Route::post('sua/{id}','UserController@postEditUser');

	});
});

