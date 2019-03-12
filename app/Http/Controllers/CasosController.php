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
    public function index($codigo_caso, $estatus_caso, $fecha_desde, $fecha_hasta)
    {
      $listado_casos = [];
      $query = Caso::query();
      if(isset($codigo_caso) and ($codigo_caso != 'Todos')){
        $query = $query->where('cod_trasaccion', 'like', '%'.$codigo_caso.'%');
      }
      if(isset($estatus_caso) and ($estatus_caso != 'Todos')){
        $query = $query->where('status', 'like', '%'.$estatus_caso.'%');
      }
      if(isset($fecha_desde) and ($fecha_desde != 'Todos')){
        $from = date($fecha_desde);
      }
      else{
        $from = date('01-01-1900');
      }
      if(isset($fecha_hasta) and ($fecha_hasta != 'Todos')){
        $to = date($fecha_hasta);
      }
      else{
        $to = date('d-m-Y');
      }
      $query = $query->whereBetween('fecha', [$from, $to]);
      $listado_casos = $query->get();
      return $listado_casos;
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
      $caso = Caso::where('id', '=', $id)->get();
      return $caso;
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

    public function getCombosFiltros()
    {
      $combos = [];
      $combo_estatus_solicitud = $this->getFiltroEstatusSolicitud();
      $combos = ['combo_estatus_solicitud' => $combo_estatus_solicitud];
      return $combos;
    }

    public function getFiltroEstatusSolicitud(){
      $estatus_solicitud = [];
      $query = Caso::query();
      // if(isset($tipo_solicitud) and ($tipo_solicitud != 'Todos')){
      //   $query = $query->where('status', 'like', '%'.$tipo_solicitud.'%');
      // }
      $query = $query->distinct();
      $estatus_solicitud = $query->get(['status']);
      return $estatus_solicitud;
    }

}
