<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/hotel', 'HotelController@index');
Route::get('/hotel/{id}', 'HotelController@hotel_detail')->name('hoteldetail');
Route::post('/hotel/{id}', 'HotelController@reserve');
Route::post('/contact', 'HotelController@store')->name('contact');

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::get('/contact', function () {
    return view('pages.contact');
});

Auth::routes();


