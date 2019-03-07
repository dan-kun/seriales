@extends('layouts.app1')

@section('content')

@extends('menu-test')

  <div class="container">
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br><br>
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-4 col-md-4">
                <span class="text-left" style="padding-left: 20px;">Tabla de Seriales</span>
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
        <table id="seriales" class="table table-striped table-bordered nowrap display">
          <thead>
            <tr>
              <th class="text-center">ID</th>
              <th class="text-center">Serie Decimal</th>
              <th class="text-center">Serie Hexadecimal</th>
              <th class="text-center">Tipo de Solicitud</th>
              <th class="text-center">Estatus de Solicitud</th>
              <th class="text-center">Fecha</th>
              <th class="col-sm-1 text-center">&nbsp;</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Detalle de Serial</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="col-12 col-md-12">
            <div class="row">
              <div class="col-6 col-md-6"><b>Serie Decimal</b></div>
              <div class="col-6 col-md-6"><span class="serial-serie-dec"></span></div>
            </div>
            <div class="row">
              <div class="col-6 col-md-6"><b>Serie Hexadecimal</b></div>
              <div class="col-6 col-md-6"><span class="serial-serie-hex"></span></div>
            </div>
            <div class="row">
              <div class="col-6 col-md-6"><b>Tipo de Solicitud</b></div>
              <div class="col-6 col-md-6"><span class="serial-tipo-sol"></span></div>
            </div>
            <div class="row">
              <div class="col-6 col-md-6"><b>Estatus de Solicitud</b></div>
              <div class="col-6 col-md-6"><span class="serial-estatus-sol"></span></div>
            </div>
            <div class="row">
              <div class="col-6 col-md-6"><b>Estatus de Solicitud</b></div>
              <div class="col-6 col-md-6"><span class="serial-fec"></span></div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button> -->
        </div>
      </div>
    </div>
  </div>

  <script src="{{ asset('js/seriales.js') }}" charset="utf-8"></script>

@endsection
