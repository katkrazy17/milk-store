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
//Route::resource('mobile','PagesController');

// Pages - Trang chủ
Route::get('/', ['as'  => 'index', 'uses' =>'PagesController@index']);
//wow thua PagesController cái này đâu
// Pages - sản phẩm quanao
Route::get('/milk', ['as'  => 'laptop', 'uses' =>'PagesController@getcate']);// trang sản phẩm quanao

Route::get('/milk/{id}', ['as'  => 'laptop_detail', 'uses' =>'PagesController@detail']); // chi tiết sản phẩm quanao
// loại sản phẩm
Route::get("/milk/loai/{id}", ['as' => 'laptop', 'uses' =>'PagesController@getLoaiSp']);// phân loại sản phẩm theo doanh mục


// Pages - giỏ hàng
Route::get('cart',['as'=>'getcart','uses'=>'CartController@getcart']); // thông tin giỏ hàng
Route::get('cart/addcart/{id}', ['as'  => 'getcartadd', 'uses' =>'CartController@addcart']); // thêm giỏ hàng
Route::get('cart/update/{id}/{qty}-{dk}', ['as'  => 'getupdatecart', 'uses' =>'CartController@getupdatecart']);//update giỏ hàng
Route::get('cart/delete/{id}', ['as'  => 'getdeletecart', 'uses' =>'CartController@getdeletecart']);// xóa giỏ hàng

// tien hanh dat hang
Route::get('oder', ['as'  => 'getoder', 'uses' =>'PagesController@getoder']);
Route::post('oder', ['as'  => 'postoder', 'uses' =>'PagesController@postoder']);

// User
Route::resource('user','UserController');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/logout', 'Auth\LoginController@userLogout')->name('user.logout');


// Công việc Admin
Route::group(array('prefix'=>'admin','namespace'=>'Admin','mdidleware'=>'auth'),function (){
	Route::resource('category', 'CategoryController');
	Route::resource('product','ProductController');
	Route::resource('customer', 'CustomerController');
	Route::resource('order', 'OrderController');
	Route::resource('useradmin', 'UseradminController');
});

Route::prefix('admin')->group(function() {

	Route::get('login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
	Route::post('login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
	Route::get('/', 'AdminController@index')->name('admin.dashboard');
	Route::get('/logout', 'Auth\AdminLoginController@logout')->name('admin.logout');
		// Password reset routes
  	Route::post('/password/email', 'Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
  	Route::get('/password/reset', 'Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
  	Route::post('/password/reset', 'Auth\AdminResetPasswordController@reset');
  	Route::get('/password/reset/{token}', 'Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
});
