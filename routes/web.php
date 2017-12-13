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
use App\Models\Slider;
use App\Models\Menu;
Auth::routes();

Route::get('/', function() {
	return view('frontend.homepage')
		->with('sliders',Slider::get())
		->with('menus', Menu::limit(4)->orderBy('id', 'desc')
		->get());
})->name('frontend.home');

Route::get('/about',function() {
	return view('frontend.about');
})->name('frontend.about');

Route::get('/contact',function() {
	return view('frontend.contact');
})->name('frontend.contact');

Route::get('/menu',function(){
	$menu = App\Models\Menu::all();
	return view('frontend.menu')->with('menu',$menu);
})->name('frontend.menu');


Route::get('/product/{id}', 'frontendController@toDetails')->name('frontend.product');
Route::get('/menu/custom', 'frontendController@toCustom')->name('frontend.custom');
Route::post('/menu/custom/store', 'frontendController@storeCustom')->name('frontend.store.custom');

Route::get('/cartlist', 'frontendController@cartList')->name('frontend.cartlist');
Route::post('/cart', 'frontendController@addToCart')->name('frontend.add_to_cart');
Route::get('/deleteItem/{rowId}', 'frontendController@removeCart')->name('frontend.remove_cart');
Route::get('/checkout', 'frontendController@checkoutCart')->name('frontend.checkout');
Route::post('/checkout/store', 'frontendController@checkoutStore')->name('frontend.store.checkout');
Route::post('/updateCart', 'frontendController@updateCart')->name('frontend.update');
Route::get('/history', 'frontendController@toHistory')->name('frontend.history');
Route::get('/history/detail/{id}', 'frontendController@historyDetail')->name('frontend.history.detail');

Route::get('/logout','AdminController@logout')->name('logout');
Route::get('/image/{fileName}/{path}','SliderController@getFileByName');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
	Route::get('/purchase/mark/{model}','PurchaseController@changeStatus');
	Route::get('/mark/{model}','PurchaseController@changeStatus');
	Route::post('/menu/calculate','MenuController@calculate');
	Route::post('/dashboard/calculateMenu','AdminController@calculateMenu');
	Route::post('/dashboard/calculateCustom','AdminController@calculateCustom');
	Route::resource('/user', 'UserController');
	Route::resource('/category', 'CategoryController');
	Route::resource('/slider', 'SliderController');
	Route::resource('/food', 'FoodController');
	Route::resource('/menu', 'MenuController');
	Route::resource('/guest', 'GuestController');
	Route::resource('/purchase', 'PurchaseController');
	Route::resource('/custom', 'CustomController');
	Route::resource('/dashboard', 'AdminController');

	Route::group(['prefix' => 'datatable', 'middleware' => ['auth']], function () {
		Route::post('/user', 'UserController@dataTable')->name('user.list');
		Route::post('/category', 'CategoryController@dataTable')->name('category.list');
		Route::post('/slider', 'SliderController@dataTable')->name('slider.list');
		Route::post('/food', 'FoodController@dataTable')->name('food.list');
		Route::post('/menu', 'MenuController@dataTable')->name('menu.list');
		Route::post('/guest', 'GuestController@dataTable')->name('guest.list');
		Route::post('/purchase', 'PurchaseController@dataTable')->name('purchase.list');
		Route::post('/custom', 'CustomController@dataTable')->name('custom.list');
		Route::post('/dashboard', 'AdminController@dataTable')->name('dashboard.list');
	});
});