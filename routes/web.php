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

/*Route::get('/', function () {
    return view('top');
})->name('top');*/

Route::get('/','TopController@index')->name('top');
Route::get('/side', function () {
    return view('sidebar');
})->name('side');

Auth::routes();
Route::resource('todos','TodoController');
Route::resource('buys','BuyController');


