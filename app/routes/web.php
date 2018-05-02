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
Route::get('/galaxy', 'GalaxyController@index')->name('galaxy');
Route::group(['middleware' => ['auth', 'planet_owner']], function () {
  Route::get('/planet/{planet}', 'PlanetsController@index')->name('planet');
  Route::get('/planet/{planet}/change', 'PlanetsController@changeName')->name('change-planet-name');
  Route::get('/planet/{planet}/hangar', 'HangarController@index')->name('hangar');
  Route::get('/planet/{planet}/hangar-created', 'HangarController@createHangar')->name('create-hangar');
  Route::get('/planet/{planet}/hangar/{shipType}', 'HangarController@createShip')->name('create-ship');
  Route::get('/planet/{planet}/fleet', 'FleetController@index')->name('fleet');
  Route::get('/planet/{planet}/select-planet', 'TravelController@selectPlanet')->name("travel-chose-planet");
});
//Route::get('/home/{planet}', 'TravelsController@createTravel')->name('make-travel');
