<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/*Route::get('seriales', function(){
	return datatables()
	->eloquent(App\Seriales::query())
	->addColumn('btn', 'actions_seriales')
	->rawColumns(['btn'])
	->toJson();
});*/

Route::get('casos', function(){
	//return App\Seriales::all();
	return datatables()
	->eloquent(App\Caso::query())
	->addColumn('btn', 'actions')
	->rawColumns(['btn'])
	->toJson();
});

// Modulo de Seriales
Route::get(
  'seriales/{tipo_solicitud}/{estatus_solicitud}/{serie_decimal}/{serie_hexadecimal}/',
  'SerialesController@listado'
);
Route::get('seriales/{id}', 'SerialesController@detalle');

// Route::get(
//     'seriales', function(){
//       $items = [
//         'Gestion' => [
//           'submenu' => [
//             'Gestion de Casos' => [ 'url' => 'casos'],
//             'Gestion de Seriales' => ['url' => 'seriales']
//           ]
//       ],
//         'Denuncia de almacen' => ['url' => 'denuncia_almacen'],
//         'Listar caso' => ['url' => 'Listar_caso'],
//       ];
//       return view('seriales', compact('items'));
//     }
// )->name('listado_seriales');

Route::get(
    'seriales/combos/{tipo_solicitud}/{estatus_solicitud}/',
    'SerialesController@getCombosFiltros'
);

Route::get(
  'casos/{codigo_caso}/{estatus_caso}/{fecha_desde}/{fecha_hasta}/',
  'CasosController@index'
);

Route::get('casos/combos/', 'CasosController@getCombosFiltros');
