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

Route::get('/', 'AppController@index')->name('app');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home/view/{planet}', 'HomeController@handleView')->name('home-view');

Route::get('/travel', 'TravelsController@index')->name('travels');



Route::get('/home/{planet}', 'TravelsController@createTravel')->name('make-travel');
