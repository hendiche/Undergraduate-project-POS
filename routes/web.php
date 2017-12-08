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
});

Route::get('/logout','AdminController@logout');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:admin']], function () {
	Route::get('/dashboard','AdminController@dashboard')->name('admin.dashboard');
	Route::resource('/user', 'UserController');


	Route::group(['prefix' => 'datatable', 'middleware' => ['auth']], function () {
		Route::post('/user', 'UserController@dataTable')->name('user.list');
	});
});