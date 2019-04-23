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

//Route::controller(['auth'])->group(function () {
    Route::get('items/search', 'ItemController@search')->name('items.search');
    Route::resource('items', 'ItemController');

    Route::get('categories/search', 'CategoryController@search')->name('categories.search');
    Route::resource('categories', 'CategoryController');
//});


//Route::get('/home', 'HomeController@index')->name('home');
