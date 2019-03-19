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

Route::get('/', 'MainController@index');
Route::get('/albums', 'AlbumsController@index');
Route::get('albums/create/{id}', 'AlbumsController@create');
Route::get('albums/{id}', 'AlbumsController@show');
Route::post('albums/store', 'AlbumsController@store');

Route::get('photos/create/{id}', 'PhotosController@create');
Route::post('photos/store', 'PhotosController@store');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
