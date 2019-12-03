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

Auth::routes();

Route::get('/myProfile', function() {
    return view('myProfile');
})->name('myProfile');

Route::post('/deleteProfile', 'UserController@destroy')->name('deleteProfile');

Route::put('/editProfile', 'UserController@update')->name('confirmEdit');
Route::get('/editProfile', 'UserController@edit')->name('editProfile');
