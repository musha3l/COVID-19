<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Countries
Route::get('/', '\App\Http\Controllers\CountriesDataController@index');

// List single country
Route::get('country/{id}', '\App\Http\Controllers\CountriesDataController@show');

// Create new country
Route::post('country', '\App\Http\Controllers\CountriesDataController@store');

// Update country
Route::put('country/{id}', '\App\Http\Controllers\CountriesDataController@update');

// Delete country
Route::delete('country/{id}', '\App\Http\Controllers\CountriesDataController@destroy');

// List Countries
Route::get('countries', '\App\Http\Controllers\CountriesController@index');

//Get the data from api link
Route::post('fill_data', '\App\Http\Controllers\FillDataController@index');
