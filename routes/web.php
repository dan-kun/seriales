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

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/Listar_caso', 'HomeController@Listar')->name('Listar_caso');
Route::get('/Denuncia_almacen', 'HomeController@denuncia')->name('Denuncia_almacen');
Route::get('/casos', 'HomeController@casos')->name('casos');
Route::get('/seriales', 'HomeController@seriales')->name('seriales');
Route::get('menu-test', 'MenuController@index');

