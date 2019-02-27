@extends('layouts.app')

@extends('menu-test')

@section('content')
<div class="container">
    <table id="seriales" class="table table-striped table-bordered dt-responsive nowrap display"  >
      
      <thead>
        <tr>
          <th class="text-center">ID</th>
          <th class="text-center">Serie Decimal</th>
          <th class="text-center">Serie Hexadecimal</th>
          <th class="text-center">Tipo de Solicitud</th>
          <th class="text-center">Estatus de Solicitud</th>
          <th class="text-center" >Fecha </th>
          <th class="col-sm-1 text-center" >&nbsp; </th>

        </tr>
      </thead>
      <tfoot>
        <tr>
          <th class="text-center">&nbsp; </th>
          <th class="text-center">&nbsp; </th>
          <th class="text-center">&nbsp; </th>
          <th>Solicitud</th>
          <th>Estatus </th>
          <th class="text-center">&nbsp; </th>
          <th class="text-center">&nbsp; </th>

        </tr>
      </tfoot>
    </table>

    
</div>

    <script>
      $(document).ready(function() {
        $('#seriales').DataTable({
          responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        return 'Detalles de su selección';
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        },

          "ServerSide": true,
          dom: 'lfrtBip',
          fixedColumns: true,
          fixedHeader: true,
          scrollCollapse: true,
          autoWidth: true,
          scrollCollapse: true,
          lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
          info: true,
          "ajax": "{{ url('api/seriales') }}",
          "columns": [
            {data: 'id'},
            {data: 'serie_dec'},
            {data: 'serie_hex'},
            {data: 'tipo_solicitud'},
            {data: 'estatus_solicitud'},
            {data: 'fecha'},
            {data: 'btn'},
          ],

          buttons: [
          {
            extend: 'excelHtml5',
            title: 'Data export',
            className: 'btn',
            text: "Excel"
          },
          {
            extend: 'csvHtml5',
            title: 'Data export',
            className: 'btn',
            text: "Csv",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5],
              modifier: {
                page: 'current'
              }
            }
          },
          {
            extend: 'pdfHtml5',
            title: 'Data export',
            className: 'btn',
            text: "Pdf",
            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5],
              modifier: {
                page: 'current'
              }
            }
        },
        ],

        /*buttons: [
        'copy', 'excel', 'pdf'
    ],*/

          "language": {
 
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"
 
        },

        initComplete: function () {
            this.api().columns([3,4]).every( function () {
                var column = this;
                var select = $('<select><option value="" disabled selected>Estatus</option></select>')
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
        },



        });
      } );
    </script>

@endsection