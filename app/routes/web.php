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

Route::get('/travel', 'TravelsController@index')->name('travels');

Route::get('/travel/view/{planet}', 'TravelsController@handleView')->name('travels-show');

Route::get('/home/{planet}', 'TravelsController@createTravel')->name('make-travel');
