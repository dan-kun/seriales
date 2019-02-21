@extends('layouts.app')

@extends('menu-test')

@section('content')
  <div class="container">
    <table id="casos" class="table table-striped table-bordered"  >
      
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
          <th class="col-sm-1 text-center" >&nbsp; </th>

        </tr>
      </thead>
    </table>
    

  </div>
    
    <script>
      $(document).ready(function() {
        $('#casos').DataTable({
          "ServerSide": true,
          "ajax": "{{ url('api/casos') }}",
          "columns": [
            {data: 'id'},
            {data: 'num_caso'},
            {data: 'cod_trasaccion'},
            {data: 'solicitante'},
            {data: 'lugar_ocurrencia'},
            {data: 'descripcion'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'btn'},
          ]
        });
      } );
    </script>
@endsection