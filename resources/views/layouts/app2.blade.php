<!DOCTYPE html>
<html lang="en" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <!-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/seriales.css') }}" rel="stylesheet">
    <link href="{{ asset('css/details.css') }}" rel="stylesheet">
    <!-- Font Awesome v.5 -->
    <link href="{{ asset('css/font_awesome_5.7.2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <!-- Scripts -->
    {{-- <!-- <script src="{{ asset('js/jquery-3.3.1.min.js') }}" ></script>
    <script src="{{ asset('js/popper.min.js') }}" ></script>
    <script src="{{ asset('js/bootstrap.min.js') }}" ></script> --> --}}
    <script src="{{ asset('DataTables/datatables.min.js') }}" ></script>
    <script src="{{ asset('js/font_awesome_5.7.2.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}" charset="utf-8"></script>
  </head>

  <body>
    <div id="app" class="container-fluid">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">
          <figure  class="logo pr-4 pt-3">
            <img style="height:56px" src="{{ asset('images/logocantv.png') }}">
          </figure>
        </a>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="{{ url('listado_seriales') }}"  id="menuGestionDropdown" role="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Gesti&oacute;n
              </a>
              <div class="dropdown-menu" aria-labelledby="menuGestionDropdown">
                <a class="dropdown-item" href="{{ route('listado_casos') }}">Gesti&oacute;n de casos</a>
                <a class="dropdown-item" href="{{ route('listado_seriales') }}">Gesti&oacute;n de seriales</a>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Denuncia de almac&eacute;n</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Listar Casos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Login</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Registro</a>
            </li>
          </ul>
        </div>
      </nav>
    </div>
    <div class="row">
      @yield('content')
    </div>
    <br>
    <div class="row">
      @extends('footer')
    </div>
  </body>

</html>
