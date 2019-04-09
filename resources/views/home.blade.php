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
                <span class="text-left" style="padding-left: 20px;">Gr&aacute;ficas mensuales - Tipo de operaci&oacute;n</span>
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
                    <option value="Inclusión">Inclusión</option>
                    <option value="Exclusión">Exclusión</option>
                  </select>
                </div>
              </div>
              <div id="container_estatus_solicitud" class="col-3">
                <div class="form-group">
                  <label for="anio">A&ntilde;o:</label>
                  <select class="form-control anio" id="anio">
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
  <div id="container" style="width: 90%; height: 500px; margin: 0 auto"></div>

  <div class="container-fluid">
    <div class="row">
      <div class="col-10 col-md-10 offset-1">
        <br><br>
        <div class="card">
          <div class="card-header">
            <div class="row justify-content-between">
              <div class="col-4 col-md-4">
                <span class="text-left" style="padding-left: 20px;">Gr&aacute;ficas anuales - Tipo de Solicitud</span>
              </div>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div id="container_status" class="col-3">
                <div class="form-group">
                  <label for="tipo12">Seleccione:</label>
                  <select class="form-control tipo12" id="tipo">
                    <option value="">Todos</option>
                    <option value="Exclusión">Exclusión</option>
                    <option value="Inclusión">Inclusión</option>
                  </select>
                </div>
              </div>
              <div id="container_anio2" class="col-3">
                <div class="form-group">
                  <label for="anio">A&ntilde;o:</label>
                  <select class="form-control anio2" id="anio2">
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
  <div id="container2" style="width: 90%; height: 500px; margin: 0 auto"></div>




@endsection
