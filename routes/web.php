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
    return view('top');
})->name('top');
Auth::routes();
Route::resource('todos','TodoController');
Route::resource('buys','BuyController');
//下記を追記
//画像ファイルをアップロードするボタンを設置するページへのルーティング
Route::get('/upload/image', 'ImageController@input');
//画像ファイルをアップロードする処理のルーティング
Route::post('/upload/image', 'ImageController@upload');
//アップロードした画像ファイルを表示するページのルーティング
Route::get('/output/image', 'ImageController@output');
//上記までを追記

