<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Caso;


class CasosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $items = [
            'Gestion'          => ['submenu' => [
                                        'Gestion de Casos' => [ 'url' => 'casos'],
                                        'Gestion de Seriales' => ['url' => 'api/seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];


        /*return view('casos', compact('casos','items', 'users'));
*/
        return view('casos', compact('items'));
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
