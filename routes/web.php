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

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/overviews/index');
});

Route::resource('books','BookController');

Auth::routes();


// route to the reviews page where all the reviews is shown
Route::get('/reviews','ReviewController@index')->name('reviews');

// route to the creations page
Route::get('/reviews/create','ReviewController@create')->name('reviews.create');

// route the request to the controller
Route::post('/reviews', 'ReviewController@store')->name('reviews.store');



