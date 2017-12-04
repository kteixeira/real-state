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

Route::view('/', 'welcome');

Auth::routes();

Route::get('/real_states/get_formatted', 'RealStatesController@getFormatted');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/properties', 'HomeController@properties');
Route::resource('/real_states', 'RealStatesController');
Route::resource('/properties', 'PropertiesController');
