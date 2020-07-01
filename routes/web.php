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

Route::get('/', 'HomeController@home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('/phone', 'UserController@phone')->name('phone');
Route::get('/profile', 'UserController@profile')->name('profile');
Route::get('/profile/{id}', 'UserController@profileDetail')->name('profile.detail');

Route::post('state-list', 'UserController@fetch')->name('state-list');
