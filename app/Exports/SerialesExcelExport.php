<?php

namespace App\Exports;
use App\Seriales;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\Exportable;


class SerialesExcelExport implements FromQuery
{

  use Exportable;

  public function __construct(string $tipo_solicitud, string $estatus_solicitud, string $serie_decimal, string $serie_hexadecimal)
  {
    $this->tipo = $tipo_solicitud;
    $this->estatus = $estatus_solicitud;
    $this->serie_decimal = $serie_decimal;
    $this->serie_hexadecimal = $serie_hexadecimal;
  }

  public function query()
  {
    $query = Seriales::query();
    if(isset($this->tipo) and ($this->tipo != 'Todos')){
      $query = $query->where('tipo_solicitud', 'like', '%'.$this->tipo.'%');
    }
    if(isset($this->estatus) and ($this->estatus != 'Todos')){
      $query = $query->where('estatus_solicitud', 'like', '%'.$this->estatus.'%');
    }
    if(isset($this->serie_decimal) and ($this->serie_decimal != 'Todos')){
      $query = $query->where('serie_dec', 'like', '%'.$this->serie_decimal.'%');
    }
    if(isset($this->serie_hexadecimal) and ($this->serie_hexadecimal != 'Todos')){
      $query = $query->where('serie_hex', 'like', '%'.$this->serie_hexadecimal.'%');
    }
    return $query;
  }

}
