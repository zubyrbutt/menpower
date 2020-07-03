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
Route::post('/profile-update', 'UserController@profileUpdate')->name('profileUpdate');

Route::get('/profile/{id}', 'UserController@profileDetail')->name('profile.detail');
Route::get('live_search/action', 'HomeController@search')->name('live_search.search');

Route::post('state-list', 'UserController@fetch')->name('state-list');
Route::post('dynamic_dependent/fetch', 'UserController@fetch')->name('dynamicdependent.fetch');



//Admin Routes
Route::get('/dashboard','UserController@dashboard')->name('dashboard');
Route::get('/dashboard/add-new-location','UserController@addnewlocation')->name('addnewlocation');
Route::post('/dashboard/add-new-location/store','UserController@addnewlocationstore')->name('addnewlocationstore');
