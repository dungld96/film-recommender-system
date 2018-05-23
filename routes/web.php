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


Route::get('/', 'HomeController@index')->name('home');
Route::get('home', 'HomeController@index');
Route::get('logout', 'UserController@logout');
Route::post('register_save', 'HomeController@register_save')->name('register_save');

Auth::routes();

Route::get('img-movie', 'HomeController@getImageMovie');
Route::get('single/{movie_id}', 'HomeController@single')->name('single-film');
Route::post('rating', 'UserController@rating')->name('rating-movie');
Route::get('movies', 'HomeController@allMovies')->name('movies');


// admin


Route::get('admin/login', 'AdminController@getLogin');
Route::post('admin/login', 'AdminController@login')->name('admin-login');



Route::group(['middleware' => 'admin'], function () {
	Route::get('admin', 'AdminController@index');
	Route::get('admin/dashboard', 'AdminController@index')->name('dashboard');
	Route::get('admin/movies', 'AdminController@movies')->name('quan-ly-phim');
	Route::post('admin/add-movie', 'AdminController@addMovie')->name('add-movie');
	Route::get('admin/delete/{movieId}', 'AdminController@delete')->name('delete');
	Route::get('admin/edit/{movieId}', 'AdminController@edit')->name('edit');
	Route::post('admin/edit', 'AdminController@saveEdit')->name('save_edit');
});



