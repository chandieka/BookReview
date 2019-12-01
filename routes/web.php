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

// route to overview page
Route::get('/', function () {
    return view('/overview/index');
});

Auth::routes();

// route to the reviews page where all the reviews is shown
Route::get('/reviews','ReviewController@index')->name('reviews');