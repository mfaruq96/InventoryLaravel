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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/kategori', 'KategoriController@index')->name('kategori');
Route::get('/kategori_table', 'KategoriController@table_kategori')->name('kategori_table');
Route::get('/kategori_edit/{id}', 'KategoriController@show');
Route::post('/kategori_delete/{id}', 'KategoriController@destroy');
Route::post('/kategori_save', 'KategoriController@store');

Route::get('/produk', 'ProdukController@index');
Route::get('/produk_table', 'ProdukController@table_produk')->name('produk_table');
Route::get('/produk_edit/{id}', 'ProdukController@show');
Route::post('/produk_delete/{id}', 'ProdukController@destroy');
Route::post('/produk_save', 'ProdukController@store');
