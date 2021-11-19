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
Auth::routes();
//Route::get('/', function () {return view('top');})->name('top');
Route::view('/', 'top')->name('top');
Route::get('/usertop','TopController@index')->name('userTop');
//Route::get('/side', function () {return view('sidebar');})->name('side');
Route::view('/side', 'sidebar')->name('side');
Route::resource('todos','TodoController')->middleware('auth'); ;
Route::resource('buys','BuyController')->middleware('auth');
Route::resource('mornings', 'MorningController')->middleware('auth');
Route::resource('memos','MemoController')->middleware('auth');



