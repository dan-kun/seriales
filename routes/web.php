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
/*Route::resource('denuncia_almacen', 'DenunciaController');*/
// Route::resource('/casos', 'CasosController');
// Route::resource('/seriales', 'SerialesController');
/*Route::get('menu-test', 'MenuController@index');*/

// URLs para el modulo de seriales
Route::get('seriales', function(){
	return view('seriales');
})->middleware('auth')->name('listado_seriales');
Route::get('seriales/{id}', 'SerialesController@detalle');
// URLs para el modulo de casos
Route::get('casos', function(){
	return view('casos');
})->middleware('auth')->name('listado_casos');
Route::get('casos/{id}', 'CasosController@show');

Route::get('denuncia_almacen', function(){
	return view('denuncia_almacen');
})->middleware('auth')->name('denuncia');
