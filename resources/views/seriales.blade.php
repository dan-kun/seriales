@extends('layouts.app1')

@section('content')

@extends('menu-test')

  <div class="container">
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br><br>
        <div class="card">
          <div class="card-header">Tabla de Seriales</div>
          <div class="card-body">
            <div class="row">
              <div id="container_tipo_solicitud" class="col-3">
                <div class="form-group">
                  <label for="tipo_solicitud">Tipo de Solicitud:</label>
                  <select class="form-control tipo_solicitud" id="tipo_solicitud">
                    <option value="">Todos</option>
                  </select>
                </div>
              </div>
              <div id="container_estatus_solicitud" class="col-3">
                <div class="form-group">
                  <label for="estatus_solicitud">Estatus de Solicitud:</label>
                  <select class="form-control estatus_solicitud" id="estatus_solicitud">
                    <option value="">Todos</option>
                  </select>
                </div>
              </div>
              <div id="container_serie_decimal" class="col-3">
                <div class="form-group">
                  <label for="serie_decimal">Serie Decimal:</label>
                  <input class="form-control" type="text" placeholder="Escriba una serie" id="serie_decimal">
                </div>
              </div>
              <div id="container_serie_hexadecimal" class="col-3">
                <div class="form-group">
                  <label for="serie_hexadecimal">Serie Hexadecimal:</label>
                  <input class="form-control" type="text" placeholder="Escriba una serie" id="serie_hexadecimal">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br>
        <table id="seriales" class="table table-striped table-bordered dt-responsive nowrap display">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Serie Decimal</th>
              <th class="text-center">Serie Hexadecimal</th>
              <th class="text-center">Tipo de Solicitud</th>
              <th class="text-center">Estatus de Solicitud</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">Detalle</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/seriales.js') }}" charset="utf-8"></script>

@endsection
