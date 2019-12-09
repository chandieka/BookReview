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


Auth::routes();

// route to Overview
Route::get('/', 'OverviewController@index')->name('overview.index');

//  BOOKS
//
//
// route to the books page where all the books are shown
// Route::get('/books', 'BookController@index')->name('books.index');

Route::get('/books', 'BookController@index')->middleware('admin');

// route to the book creation page
Route::get('/books/create', 'BookController@create')->name('books.create')->middleware('auth');

// route the request to the controller
Route::post('/books', 'BookController@store')->name('books.store')->middleware('auth');

// route to show a single book
Route::get('/books/{book}', 'BookController@show')->name('books.show');

// route to edit a book
Route::get('/books/{book}/edit', 'BookController@edit')->name('books.edit')->middleware('auth');

// route to update a book
Route::patch('/books/{book}', 'BookController@update')->name('books.update')->middleware('auth');

// route to destroy a book
Route::delete('/books/{book}', 'BookController@destroy')->name('books.destroy')->middleware('auth');

// PROFILE
//
//
// view profile
Route::get('/myProfile', 'UserController@index')->name('myProfile');

// delete profile
Route::get('/deleteProfile', 'UserController@destroy')->name('deleteProfile');

// update the database
Route::put('/editProfile', 'UserController@update')->name('confirmEdit');

// get edit form
Route::get('/editProfile', 'UserController@edit')->name('editProfile');

// REVIEWS
//
//
// route to the reviews page where all the reviews are shown
Route::get('/reviews','ReviewController@index')->name('reviews.index');

// route to the creations page
Route::get('/reviews/create','ReviewController@create')->name('reviews.create');

// route the request to the controller
Route::post('/reviews', 'ReviewController@store')->name('reviews.store');

// route the request to the edit page
Route::get('/reviews/{review}/edit', 'ReviewController@edit')->name('reviews.edit');

// route the request to the controller
Route::put('/reviews/{review}','ReviewController@update')->name('reviews.update');

// route to the detele function
Route::delete('/reviews/{review}','ReviewController@destroy')->name('reviews.delete');
