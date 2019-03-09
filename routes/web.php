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
/*Route::get('/Listar_caso', 'HomeController@Listar')->name('Listar_caso');*/
Route::resource('/denuncia_almacen', 'DenunciaController');
// Route::resource('/casos', 'CasosController');
// Route::resource('/seriales', 'SerialesController');
/*Route::get('menu-test', 'MenuController@index');*/

Route::get('seriales', function(){return view('seriales');})->name('listado_seriales');
Route::get('casos', function(){return view('casos');})->name('listado_casos');
