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

Route::get('/travels', 'TravelsController@index')->name('travels');
Route::get('/hangar')->name('hangar');
Route::get('/fleets')->name('fleets');
Route::get('/resources')->name('resources');
Route::get('/planet/{planet}', 'AppController@handleHomeView')->name('planet');
//Route::get('/home/{planet}', 'TravelsController@createTravel')->name('make-travel');
