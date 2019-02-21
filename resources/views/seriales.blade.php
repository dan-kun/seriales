@extends('layouts.app')

@extends('menu-test')

@section('content')
<div class="container">
    <table id="seriales" class="table table-striped table-bordered"  >
      
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
    </table>

    
</div>

    <script>
      $(document).ready(function() {
        $('#seriales').DataTable({
          "ServerSide": true,
          "ajax": "{{ url('api/seriales') }}",
          "columns": [
            {data: 'id'},
            {data: 'serie_dec'},
            {data: 'serie_hex'},
            {data: 'tipo_solicitud'},
            {data: 'estatus_solicitud'},
            {data: 'created_at'},
          ]
        });
      } );
    </script>

@endsection