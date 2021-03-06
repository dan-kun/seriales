<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('DataTables/datatables.min.js') }}" ></script>
{{--     <script src="{{ asset('js/seriales.js') }}" ></script>
 --}}
{{--     <script src="{{ asset('js/app.js') }}" ></script>
 --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/seriales.css') }}" rel="stylesheet">
    <link href="{{ asset('css/details.css') }}" rel="stylesheet">

    <!-- Font Awesome v.5 -->
    <link href="{{ asset('css/font_awesome_5.7.2.css') }}" rel="stylesheet">
    <script src="{{ asset('js/font_awesome_5.7.2.js') }}" charset="utf-8"></script>





</head>
<body>
    <header class="header pb-6">
      <!-- <div class="container-fluid" id="cuadro">

      </div> -->

    <div id="app" class="container-fluid p-0">
        <nav  class="nav navbar navbar-expand-lg navbar-dark bg-dark  ">
              <figure  class="logo pr-4 pt-3">
                <img style= " height:56px " src="{{ asset('images/logocantv.png') }}">
              </figure>
                <a class="navbar-brand" href="{{ url('/home') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <!-- <div class="justify-content-center ml-auto"> -->
                    <!-- </div> -->
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                      <li class="nav-item">
                        @yield('content1')
                      </li>
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
        </nav>
      </header>

        <main class="py-4">
            @yield('content')
        </main>

    </div>


        @extends('footer')

</body>


</html>
