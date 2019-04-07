@extends('layouts.app2')

@section('content')

  <script src="{{ asset('Highcharts/code/modules/exporting.js') }}" charset="utf-8"></script>
  <script src="{{ asset('Highcharts/code/modules/export-data.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/graficas.js') }}" charset="utf-8"></script>

  <div class="container">
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br><br>
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-4 col-md-4">
                <span class="text-left" style="padding-left: 20px;">Gr&aacute;ficas - Tipo de operaci&oacute;n</span>
              </div>
              <!-- <div class="col-4 col-md-4 text-right">
                <span class="bg-white text-success">
                  <a id="exportar_excel" href=""><i class="fas fa-file-csv fa-2x"></i></a>
                </span>
                &nbsp;
                <span class="bg-white text-danger"><i class="fas fa-file-pdf fa-2x"></i></i></span>
              </div> -->
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div id="container_tipo_solicitud" class="col-3">
                <div class="form-group">
                  <label for="tipo_solicitud">Tipo de Solicitud:</label>
                  <select class="form-control tipo_solicitud" id="tipo_solicitud">
                    <option value="">Todos</option>
                    <option value="Inclusión">Inclusión</option>
                    <option value="Exclusión">Exclusión</option>
                  </select>
                </div>
              </div>
              <div id="container_estatus_solicitud" class="col-3">
                <div class="form-group">
                  <label for="anio">A&ntilde;o:</label>
                  <select class="form-control anio" id="anio">
                    <option value="">Todos</option>
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="container" style="width: 100%; height: 500px; margin: 0 auto">


@endsection
