@extends('layouts.app')

@extends('menu-test')

@section('content')
  <div class="container">
    <table id="casos" class="table table-striped table-bordered"  >
      
      <thead>
        <tr>
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
      <tfoot>
        <tr>
          <th>Número de caso</th>
          <th>Codigo de Trasacción</th>
          <th>Solicitante</th>
          <th>Lugar Ocurrencia</th>
          <th>Descripción</th>
          <th>Estatus</th>
          <th>Fecha</th>
        </tr>
      </tfoot>
    </table>
    

  </div>
    
    <script>
      $(document).ready(function() {
        $('#casos').DataTable({
          "ServerSide": true,
          "ajax": "{{ url('api/casos') }}",
          "columns": [
            {data: 'num_caso'},
            {data: 'cod_trasaccion'},
            {data: 'solicitante'},
            {data: 'lugar_ocurrencia'},
            {data: 'descripcion'},
            {data: 'status'},
            {data: 'created_at'},
            {data: 'btn'},
          ],
          "language": {
 
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
 
        },

        initComplete: function () {
            this.api().columns().every( function () {
                var column = this;
                var select = $('<select><option value=""></option></select>')
                    .appendTo( $(column.footer()).empty() )
                    .on( 'change', function () {
                        var val = $.fn.dataTable.util.escapeRegex(
                            $(this).val()
                        );
 
                        column
                            .search( val ? '^'+val+'$' : '', true, false )
                            .draw();
                    } );
 
                column.data().unique().sort().each( function ( d, j ) {
                    select.append( '<option value="'+d+'">'+d+'</option>' )
                } );
            } );
        }
        });
      } );
    </script>
@endsection