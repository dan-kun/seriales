<?php

namespace App\Exports;
use App\Caso;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class CasosExcelExport implements FromQuery
{

  use Exportable;

  public function __construct(string $codigo_caso, string $estatus_caso, string $fecha_desde, string $fecha_hasta)
  {
    $this->codigo = $codigo_caso;
    $this->estatus = $estatus_caso;
    $this->fecha_ini = $fecha_desde;
    $this->fecha_fin = $fecha_hasta;
  }

  public function query()
  {
    $query = Caso::query();
    if(isset($this->codigo) and ($this->codigo != 'Todos')){
      $query = $query->where('cod_trasaccion', 'like', '%'.$this->codigo.'%');
    }
    if(isset($this->estatus) and ($this->estatus != 'Todos')){
      $query = $query->where('status', 'like', '%'.$this->estatus.'%');
    }
    if(isset($this->fecha_ini) and ($this->fecha_ini != 'Todos')){
      $from = date($this->fecha_ini);
    }
    else{
      $from = date('01-01-1900');
    }
    if(isset($this->fecha_fin) and ($this->fecha_fin != 'Todos')){
      $to = date($this->fecha_fin);
    }
    else{
      $to = date('d-m-Y');
    }
    $query = $query->whereBetween('fecha', [$from, $to]);
    // $listado_casos = $query->get();
    return $query;
  }

}
