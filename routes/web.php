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

Route::get('/', function() {
	return view('frontend.homepage');
})->name('frontend.home');

Route::get('/product/{id}', 'frontendController@toDetails')->name('frontend.product');
Route::get('/cartlist', 'frontendController@cartList')->name('frontend.cartlist');

Route::post('/cart', 'frontendController@addToCart')->name('frontend.add_to_cart');
Route::get('/deleteItem/{rowId}', 'frontendController@removeCart')->name('frontend.remove_cart');
Route::get('/checkout', 'frontendController@checkoutCart')->name('frontend.checkout');

Route::get('/logout','AdminController@logout');
Route::get('/image/{fileName}/{path}','SliderController@getFileByName');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
	Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
	Route::resource('/user', 'UserController');
	Route::resource('/category', 'CategoryController');
	Route::resource('/slider', 'SliderController');
	Route::resource('/food', 'FoodController');
	Route::resource('/menu', 'MenuController');


	Route::group(['prefix' => 'datatable', 'middleware' => ['auth']], function () {
		Route::post('/user', 'UserController@dataTable')->name('user.list');
		Route::post('/category', 'CategoryController@dataTable')->name('category.list');
		Route::post('/slider', 'SliderController@dataTable')->name('slider.list');
		Route::post('/food', 'FoodController@dataTable')->name('food.list');
		Route::post('/menu', 'MenuController@dataTable')->name('menu.list');
	});
});