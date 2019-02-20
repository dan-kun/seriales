@extends('layouts.app')

@extends('menu-test')

@section('content')
<div class="container">
    <table id="users" class="table table-striped table-bordered"  >
      
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Serie Decimal</th>
          <th class="text-center">Serie Hexadecimal</th>
          <th class="text-center">Tipo de Solicitud</th>
          <th class="text-center">Estatus de Solicitud</th>
          <th class="text-center" >Fecha </th>

        </tr>
      </thead>
      <tbody>
        @foreach ($serial as $caso)
          {{-- expr --}}
          <tr>
            <td>{{ $caso -> id}}</td>
            <td>{{ $caso -> serie_dec}}</td>
            <td>{{ $caso -> serie_hex}}</td>
            <td>{{ $caso -> tipo_solicitud}}</td>
            <td>{{ $caso -> estatus_solicitud}}</td>
            <td> {{ $caso -> created_at}}</td>
          </tr>
        @endforeach
      </tbody>

    </table>

    
</div>

    <script>
      $(document).ready(function() {
        $('#users').DataTable();
      } );
    </script>

@endsection