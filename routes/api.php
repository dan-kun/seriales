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

Route::get('seriales', function(){
	//return App\Seriales::all();
	return datatables()
	->eloquent(App\Seriales::query())
	->addColumn('btn', 'actions_seriales')
	->rawColumns(['btn'])
	->toJson();
});

Route::get('casos', function(){
	//return App\Seriales::all();
	return datatables()
	->eloquent(App\Caso::query())
	->addColumn('btn', 'actions')
	->rawColumns(['btn'])
	->toJson();
});