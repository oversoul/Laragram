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
	Route::get('/', 'DashboardController@index')->name('dashboard');
	Route::get('/posts', 'AdminPostsController@index')->name('admin.posts');
	Route::get('/posts/{id}', 'AdminPostsController@edit')->name('admin.posts.edit');
	Route::get('/posts/{id}/approve', 'AdminPostsController@approve')->name('admin.posts.approve');
	Route::get('/posts/{id}/reject', 'AdminPostsController@reject')->name('admin.posts.reject');

	Route::get('/approve', 'AdminPostsController@approveAll')->name('admin.posts.approveall');
	Route::get('/reject', 'AdminPostsController@rejectAll')->name('admin.posts.rejectall');

	Route::get('instagram', 'AdminPostsController@reload')->name('instagram');
	Route::get('settings', 'AdminSettingsController@index')->name('settings');
	Route::post('settings', 'AdminSettingsController@save')->name('settings');
});