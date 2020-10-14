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

// Auth
Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

// Auth Provider
Route::get('auth/{provider}', 'Auth\LoginController@redirectToProvider')->name('login.provider');
Route::get('auth/{provider}/callback', 'Auth\LoginController@handleProviderCallback');

// Landing Page, Post
Route::get('/', 'DashboardController@landing')->name('landing');
Route::get('catalog', 'DashboardController@catalog')->name('catalog');
Route::post('pesan/{post_id}', 'PostController@pesan')->name('pesan');

// Kelola Post, Size, Var Size, Button, Setting
Route::resource('post', 'PostController');
Route::resource('post/{post_id}/gambar', 'GambarController')->except(['show', 'edit', 'update']);

Route::resource('post/{post_id}/post-size', 'PostSizeController')->only(['index', 'create', 'store']);
Route::get('post/{post_id}/post-size/edit', 'PostSizeController@edit')->name('post-size.edit');
Route::put('post/{post_id}/post-size', 'PostSizeController@update')->name('post-size.update');
Route::delete('post/{post_id}/post-size', 'PostSizeController@destroy')->name('post-size.destroy');

Route::resource('size', 'SizeController')->except(['show', 'edit', 'update']);
Route::resource('var-size', 'VarSizeController')->except(['show', 'edit', 'update']);
Route::resource('button', 'ButtonController')->except(['show', 'edit', 'update']);
Route::get('setting', 'SettingController@show')->name('setting.show');
Route::get('setting/edit', 'SettingController@edit')->name('setting.edit');
Route::put('setting', 'SettingController@update')->name('setting.update');

// Admin
Route::get('dashboard', 'DashboardController@index')->name('dashboard');
Route::get('activity', 'DashboardController@activity')->name('activity.index');
Route::get('profile', 'ProfileController@show')->name('profile.show');
Route::get('profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('profile/edit', 'ProfileController@update')->name('profile.update');
