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

Route::get('/', 'PagesController@index');
Route::get('/take/{id}', 'PagesController@show');
Route::get('/artist/{name}', 'PagesController@userindex');

Auth::routes(['verify' => true]);


Route::get('/profile', 'ProfileController@index');
Route::post('/profile/{id}', 'ProfileController@update');

Route::get('/home', 'HomeController@index')->name('home');

// Route::resource('/albums', 'AlbumsController');
Route::get('/albums', 'AlbumsController@index');
//Route::get('/albums/create', 'AlbumsController@create');
Route::get('/albums/{id}', 'AlbumsController@show');
Route::post('/albums/store', 'AlbumsController@store');
Route::post('/albums/{id}/update', 'AlbumsController@update');
Route::delete('/albums/{id}', 'AlbumsController@destroy');

Route::get('/photos/create/{id}', 'PhotosController@create');
Route::post('/albums/photo/store', 'PhotosController@store');
Route::get('/photos/{id}', 'PhotosController@show');
Route::delete('/photos/{id}', 'PhotosController@destroy');

// Download Route
Route::get('books/save/{id}',[
    'as' => 'books.download', 'uses' => 'PagesController@downloadImage']);
Route::resource('books','PagesController');
