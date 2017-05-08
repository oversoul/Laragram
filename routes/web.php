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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('user/{id}', 'PostsController@show')->name('posts');

Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function() {
	Route::get('/', 'AdminPostsController@index')->name('admin.posts');
	Route::get('instagram', 'AdminPostsController@reload')->name('instagram');
	Route::get('settings', 'AdminSettingsController@index')->name('settings');
	Route::post('settings', 'AdminSettingsController@save')->name('settings');
});