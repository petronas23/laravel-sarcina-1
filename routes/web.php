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

Route::get('add-city', 'CityController@form_add_city');
Route::get('edit-city', 'CityController@edit_city');
Route::get('cities-list', 'CityController@get_cities');
Route::get('add-country', 'CountryController@form_add_country');
Route::get('add_country', 'CountryController@add_country');
Route::get('show-countries', 'CountryController@get_all_countries');