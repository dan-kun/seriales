<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Seriales;
class SerialesController extends Controller
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
                                        'Gestion de Seriales' => ['url' => 'seriales']
            ]
        ],
            'Denuncia de almacen' => ['url' => 'denuncia_almacen'],
            'Listar caso'    => ['url' => 'Listar_caso'],
        ];

        /*return view('seriales', compact('items'));*/
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


    // Vista para mostrar todos los seriales almacenados
  public function listado($tipo_solicitud, $estatus_solicitud, $serie_decimal, $serie_hexadecimal)
  {
      // return Serial::all();
      $listado_seriales = "";
      $query = Seriales::query();
      if(isset($tipo_solicitud) and ($tipo_solicitud != 'Todos')){
        $query = $query->where('tipo_solicitud', 'like', '%'.$tipo_solicitud.'%');
      }
      if(isset($estatus_solicitud) and ($estatus_solicitud != 'Todos')){
        $query = $query->where('estatus_solicitud', 'like', '%'.$estatus_solicitud.'%');
      }
      if(isset($serie_decimal) and ($serie_decimal != 'Todos')){
        $query = $query->where('serie_dec', 'like', '%'.$serie_decimal.'%');
      }
      if(isset($serie_hexadecimal) and ($serie_hexadecimal != 'Todos')){
        $query = $query->where('serie_hex', 'like', '%'.$serie_hexadecimal.'%');
      }
      $listado_seriales = $query->get();
      return $listado_seriales;
  }

  public function detalle(Seriales $serial)
  {
      return $serial;
  }

  public function getCombosFiltros($tipo_solicitud, $estatus_solicitud)
  {
    $combos = [];
    $combo_tipo_solicitud = $this->getFiltroTipoSolicitud($estatus_solicitud);
    $combo_estatus_solicitud = $this->getFiltroEstatusSolicitud($tipo_solicitud);
    $combos = [
        'combo_tipo_solicitud' => $combo_tipo_solicitud,
        'combo_estatus_solicitud' => $combo_estatus_solicitud
    ];
    return $combos;
  }

  public function getFiltroTipoSolicitud($estatus_solicitud){
    $tipos_solicitud = [];
    $query = Seriales::query();
    if(isset($estatus_solicitud) and ($estatus_solicitud != 'Todos')){
      $query = $query->where('estatus_solicitud', 'like', '%'.$estatus_solicitud.'%');
    }
    $query = $query->distinct();
    $tipos_solicitud = $query->get(['tipo_solicitud']);
    return $tipos_solicitud;
  }

  public function getFiltroEstatusSolicitud($tipo_solicitud){
    $estatus_solicitud = [];
    $query = Seriales::query();
    if(isset($tipo_solicitud) and ($tipo_solicitud != 'Todos')){
      $query = $query->where('tipo_solicitud', 'like', '%'.$tipo_solicitud.'%');
    }
    $query = $query->distinct();
    $estatus_solicitud = $query->get(['estatus_solicitud']);
    return $estatus_solicitud;
  }


}
