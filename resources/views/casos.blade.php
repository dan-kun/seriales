@extends('layouts.app2')

@section('content')

  <div class="container">
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br><br>
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-4 col-md-4">
                <span class="text-left" style="padding-left: 20px;">Tabla de Casos</span>
              </div>
              <div class="col-4 col-md-4 text-right">
                <span class="bg-white text-success"><i class="fas fa-file-csv fa-2x"></i></span>
                &nbsp;
                <span class="bg-white text-danger"><i class="fas fa-file-pdf fa-2x"></i></i></span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div id="container_tipo_caso" class="col-3">
                <div class="form-group">
                  <label for="tipo_caso">Caso:</label>
                  <select class="form-control tipo_caso" id="tipo_caso">
                    <option value="">Todos</option>
                  </select>
                </div>
              </div>
              <div id="container_codigo_caso" class="col-3">
                <div class="form-group">
                  <label for="codigo_caso">C&oacute;digo:</label>
                  <select class="form-control codigo_caso" id="codigo_caso">
                    <option value="">Todos</option>
                  </select>
                </div>
              </div>
              <div id="container_estatus_caso" class="col-3">
                <div class="form-group">
                  <label for="estatus_caso">Estatus:</label>
                  <input class="form-control" type="text" placeholder="Escriba una serie" id="estatus_caso">
                </div>
              </div>
              <div id="container_lugar_caso" class="col-3">
                <div class="form-group">
                  <label for="lugar_caso">Lugar:</label>
                  <input class="form-control" type="text" placeholder="Escriba una serie" id="lugar_caso">
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
        <table id="casos" class="table table-striped table-bordered"  >
          <thead>
            <tr>
              <th class="text-center">Caso</th>
              <th class="text-center">Codigo de Trasacción</th>
              <th class="text-center">Solicitante</th>
              <th class="text-center">Lugar Ocurrencia</th>
              <th class="text-center">Resumen</th>
              <th class="text-center">Estatus</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">&nbsp;</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>
@endsection
