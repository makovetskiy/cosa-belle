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

Route::get('/', 'HomeController@index');

Route::get('catalog','CatalogController@index')->name('catalog.index');
Route::get('cart','CatalogController@cart');
Route::post('order','CatalogController@order');
Route::get('order','CatalogController@order');
Route::post('create','CatalogController@create')->name('order.create');
Route::get('catalog/{id}','CatalogController@show');
Route::get('goods/{cart?}','CatalogController@getGoods');
Auth::routes();

Route::post('/sendemail', 'HomeController@sendemail')->name('sendemail');
