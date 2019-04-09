@extends('layouts.app2')

@section('content')

  <script src="{{ asset('Highcharts/code/modules/exporting.js') }}" charset="utf-8"></script>
  <script src="{{ asset('Highcharts/code/modules/export-data.js') }}" charset="utf-8"></script>
  <script src="{{ asset('js/graficas.js') }}" charset="utf-8"></script>

  <div class="container-fluid">
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br><br>
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-4 col-md-4">
                <span class="text-left" style="padding-left: 20px;">Gr&aacute;ficas - Estatus</span>
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
              <div id="container_status" class="col-3">
                <div class="form-group">
                  <label for="status">Estatus:</label>
                  <select class="form-control status" id="status">
                    <option value="">Todos</option>
                    <option value="Procesado">Procesado</option>
                    <option value="Por">Por procesar</option>
                  </select>
                </div>
              </div>
              <div id="container_anio" class="col-3">
                <div class="form-group">
                  <label for="anio">A&ntilde;o:</label>
                  <select class="form-control anio1" id="anio1">
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
  </div>
  <div id="container1" style="width: 90%; height: 500px; margin: 0 auto"></div>


{{-- Anuales por estatus --}}

  <div class="container-fluid">
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br><br>
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-4 col-md-4">
                <span class="text-left" style="padding-left: 20px;">Gr&aacute;ficas anuales - Estatus de Solicitud</span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div id="container_status" class="col-3">
                <div class="form-group">
                  <label for="estatus">Seleccione:</label>
                  <select class="form-control estatus" id="estatus1">
                    <option value="">Todos</option>
                    <option value="Procesado">Procesado</option>
                    <option value="Por">Por procesar</option>
                  </select>
                </div>
              </div>
              <div id="container_anio3" class="col-3">
                <div class="form-group">
                  <label for="anio">A&ntilde;o:</label>
                  <select class="form-control anio3" id="anio3">
                    <option value="2019">2019</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2015">2015</option>
                    <option value="2014">2014</option>
                    <option value="2013">2013</option>
                    <option value="2012">2012</option>
                    <option value="2011">2011</option>
                    <option value="2010">2010</option>
                    <option value="2009">2009</option>
                    <option value="2008">2008</option>
                    <option value="2007">2007</option>
                    <option value="2006">2006</option>
                    <option value="2005">2005</option>
                    <option value="2004">2004</option>
                    <option value="2003">2003</option>
                    <option value="2002">2002</option>
                    <option value="2001">2001</option>
                    <option value="2000">2000</option>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div id="container3" style="width: 90%; height: 400px; margin: 0 auto"></div>

@endsection
