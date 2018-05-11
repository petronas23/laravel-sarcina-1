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
Route::get('edit-city/{id}', 'CityController@form_add_city');
Route::get('add_city', 'CityController@add_city');
Route::get('edit_city', 'CityController@edit_city');
Route::get('delete_city', 'CityController@delete_city');
Route::get('cities-list', 'CityController@get_all_cities');

Route::get('add-country', 'CountryController@form_add_country');
Route::get('edit-country/{id}', 'CountryController@form_add_country');
Route::get('add_country', 'CountryController@add_country');
Route::get('edit_country', 'CountryController@edit_country');
Route::get('delete_country', 'CountryController@delete_country');
Route::get('countries-list', 'CountryController@get_all_countries');