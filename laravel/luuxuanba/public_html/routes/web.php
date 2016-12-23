<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('/', function () {
	
    return redirect()->route('trangchu');
});
/////////////////////////  ADMIN  ////////////////////////////////////////
Route::get('admin/login','UserController@getLoginAdmin')->name('get.login');
Route::post('admin/login','UserController@postLoginAdmin')->name('post.login');
Route::get('admin/logout','UserController@getLogoutAdmin')->name('get.logout');

Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){
	Route::group(['prefix'=>'theloai'],function(){
		Route::get('them',['as'=>'get.theloai.them','uses'=>'TheLoaiController@getThem']);
		Route::post('them',['as'=>'post.theloai.them','uses'=>'TheLoaiController@postThem']);

		Route::get('sua/{id}',['as'=>'get.theloai.sua','uses'=>'TheLoaiController@getSua']);
		Route::post('sua/{id}',['as'=>'post.theloai.sua','uses'=>'TheLoaiController@postSua']);
		
		Route::get('danhsach',['as'=>'get.theloai.danhsach','uses'=>'TheLoaiController@getDanhSach']);

		Route::get('delete/{id}',['as'=>'get.theloai.delete','uses'=>'TheLoaiController@getDelete']);
	});
	Route::group(['prefix'=>'loaitin'],function(){
		Route::get('them',['as'=>'get.loaitin.them','uses'=>'LoaiTinController@getThem']);
		Route::post('them',['as'=>'post.loaitin.them','uses'=>'LoaiTinController@postThem']);

		Route::get('sua/{id}',['as'=>'get.loaitin.sua','uses'=>'LoaiTinController@getSua']);
		Route::post('sua/{id}',['as'=>'post.loaitin.sua','uses'=>'LoaiTinController@postSua']);

		Route::get('danhsach',['as'=>'get.loaitin.danhsach','uses'=>'LoaiTinController@getDanhSach']);

		Route::get('delete/{id}',['as'=>'get.loaitin.delete','uses'=>'LoaiTinController@getDelete']);
	});
	Route::group(['prefix'=>'tintuc'],function(){
		Route::get('them',['as'=>'get.tintuc.them','uses'=>'TinTucController@getThem']);
		Route::post('them',['as'=>'post.tintuc.them','uses'=>'TinTucController@postThem']);

		Route::get('sua/{id}',['as'=>'get.tintuc.sua','uses'=>'TinTucController@getSua']);
		Route::post('sua/{id}',['as'=>'post.tintuc.sua','uses'=>'TinTucController@postSua']);
		
		Route::get('danhsach',['as'=>'get.tintuc.danhsach','uses'=>'TinTucController@getDanhSach']);

		Route::get('delete/{id}',['as'=>'get.tintuc.delete','uses'=>'TinTucController@getDelete']);
	});
	Route::group(['prefix'=>'comment'],function(){
		Route::get('delete/{id}',['as'=>'get.comment.delete','uses'=>'CommentController@getDelete']);
	});
	Route::group(['prefix'=>'user'],function(){
		Route::get('add',['as'=>'get.user.add','uses'=>'UserController@getAdd']);
		Route::post('add',['as'=>'post.user.add','uses'=>'UserController@postAdd']);

		Route::get('edit/{id}',['as'=>'get.user.edit','uses'=>'UserController@getEdit']);
		Route::post('edit/{id}',['as'=>'post.user.edit','uses'=>'UserController@postEdit']);
		
		Route::get('list',['as'=>'get.user.list','uses'=>'UserController@getList']);

		Route::get('delete/{id}',['as'=>'get.user.delete','uses'=>'UserController@getDelete']);
	});
	Route::get("ajax/loaitin/{idTheLoai}","AjaxController@getLoaiTin");
});
/////////////////// USER /////////////////////////////////////
Route::get('index','PageController@index')->name('trangchu');

Route::get('loaitin/{id}','PageController@getLoaitin')->name('get.loaitin');

Route::get('detail/{id}','PageController@getDetail')->name('chitiet');

Route::post('comment/{id}','CommentController@postComment')->name('post.comment');

Route::get('login','PageController@getLogin')->name('get.dangnhap');
Route::post('login','PageController@postLogin')->name('post.dangnhap');

Route::get('logout','PageController@getLogout')->name('logout');

Route::get('user','PageController@getUser')->name('get.user');
Route::post('user','PageController@postUser')->name('post.user');

Route::get('register','PageController@getRegister')->name('get.register');
Route::post('register','PageController@postRegister')->name('post.register');

Route::get('about','PageController@getAbout')->name('get.about');

Route::post('search','PageController@postSearch')->name('post.search');