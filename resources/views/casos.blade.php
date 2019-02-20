@extends('layouts.app')

@extends('menu-test')

@section('content')
  <div class="container">
    <table id="users" class="table table-striped table-bordered"  >
      
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Número de caso</th>
          <th class="text-center">Codigo de Trasacción</th>
          <th class="text-center">Solicitante</th>
          <th class="text-center"> Lugar Ocurrencia</th>
          <th class="text-center">Descripción </th>
          <th class="text-center">Estatus</th>
          <th class="col-sm-1 text-center" >Fecha </th>

        </tr>
      </thead>
      <tbody>
        @foreach ($casos as $caso)
          {{-- expr --}}
          <tr>
            <td>{{ $caso -> id}}</td>
            <td>{{ $caso -> num_caso}}</td>
            <td>{{ $caso -> cod_trasaccion}}</td>
            <td>{{ $caso -> solicitante}}</td>
            <td>{{ $caso -> lugar_ocurrencia}}</td>
            <td>{{ $caso -> descripcion}}</td>
            <td>{{ $caso -> status}}</td>
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