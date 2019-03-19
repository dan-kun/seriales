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
                <span class="bg-white text-success">
                  <a id="exportar_excel" href=""><i class="fas fa-file-csv fa-2x"></i></a>
                </span>
                &nbsp;
                <span class="bg-white text-danger">
                  <a id="exportar_pdf" href=""><i class="fas fa-file-pdf fa-2x"></i></a></span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <!-- <div id="container_tipo_caso" class="col-3">
                <div class="form-group">
                  <label for="tipo_caso">Caso:</label>
                  <select class="form-control tipo_caso" id="tipo_caso">
                    <option value="">Todos</option>
                  </select>
                </div>
              </div> -->
              <div id="container_codigo_caso" class="col-3">
                <div class="form-group">
                  <label for="codigo_caso">C&oacute;digo:</label>
                  <input class="form-control" type="text" placeholder="Escriba una serie" id="codigo_caso">
                </div>
              </div>
              <div id="container_estatus_caso" class="col-3">
                <div class="form-group">
                  <label for="estatus_caso">Estatus:</label>
                  <select class="form-control estatus_caso" id="estatus_caso">
                    <option value="">Todos</option>
                  </select>
                </div>
              </div>
              <div id="container_fechas" class="col-6">
                <div class="form-group">
                  <label for="codigo_fecha">Fechas:</label>
                  <div class="row">
                    <div class="col-6">
                      <input class="form-control" type="text" placeholder="Desde fecha" id="fecha_desde">
                    </div>
                    <div class="col-6">
                      <input class="form-control" type="text" placeholder="Hasta fecha" id="fecha_hasta">
                    </div>
                  </div>
                </div>
              </div>
              <!-- <div id="container_lugar_caso" class="col-3">
                <div class="form-group">
                  <label for="lugar_caso">Lugar:</label>
                  <input class="form-control" type="text" placeholder="Escriba una serie" id="lugar_caso">
                </div>
              </div> -->
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
              <!-- <th class="text-center">Resumen</th> -->
              <th class="text-center">Estatus</th>
              <th class="text-center">Fecha</th>
              <th class="text-center">&nbsp;</th>
            </tr>
          </thead>
        </table>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modalCasos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
                <div class="col-6 col-md-6"><b>N&uacute;mero de caso:</b></div>
                <div class="col-6 col-md-6"><span class="caso-numero"></span></div>
              </div>
              <div class="row">
                <div class="col-6 col-md-6"><b>C&oacute;digo de transacci&oacute;n:</b></div>
                <div class="col-6 col-md-6"><span class="caso-codigo"></span></div>
              </div>
              <div class="row">
                <div class="col-6 col-md-6"><b>Solicitante:</b></div>
                <div class="col-6 col-md-6"><span class="caso-solicitante"></span></div>
              </div>
              <div class="row">
                <div class="col-6 col-md-6"><b>Lugar de ocurrencia:</b></div>
                <div class="col-6 col-md-6"><span class="caso-lugar"></span></div>
              </div>
              <div class="row">
                <div class="col-6 col-md-6"><b>Estatus de caso:</b></div>
                <div class="col-6 col-md-6"><span class="caso-estatus"></span></div>
              </div>
              <div class="row">
                <div class="col-12 col-md-12">
                  <label for="caso-descripcion"><b>Descripcion:</b></label>
                  <p class="caso-descripcion"></p>
                </div>
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

  </div>
  <script src="{{ asset('js/casos.js') }}" charset="utf-8"></script>
@endsection
