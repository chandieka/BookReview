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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/overviews/index');
});

Auth::routes();

// view profile
Route::get('/myProfile', 'UserController@index')->name('myProfile');

// delete profile
Route::get('/deleteProfile', 'UserController@destroy')->name('deleteProfile');

// update the database
Route::put('/editProfile', 'UserController@update')->name('confirmEdit');

// get edit form
Route::get('/editProfile', 'UserController@edit')->name('editProfile');

// route to the reviews page where all the reviews is shown
Route::get('/reviews','ReviewController@index')->name('reviews');

// route to the creations page
Route::get('/reviews/create','ReviewController@create')->name('reviews.create');

// route the request to the controller
Route::post('/reviews', 'ReviewController@store')->name('reviews.store');

// route the request to the edit page
Route::get('/reviews/{review}/edit', 'ReviewController@edit')->name('reviews.edit');
