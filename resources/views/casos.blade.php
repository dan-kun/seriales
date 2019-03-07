@extends('layouts.app')

@extends('menu-test')

@section('content')
  <div class="container">
    <table id="casos" class="table table-striped table-bordered"  >

      <thead>
        <tr>
          <th class="text-center">Caso</th>
          <th class="text-center">Codigo de Trasacción</th>
          <th class="text-center">Solicitante</th>
          <th class="text-center"> Lugar Ocurrencia</th>
          <th class="text-center">Resumen </th>
          <th class="text-center">Estatus</th>
          <th class="text-center" >Fecha </th>
          <th class="text-center" >&nbsp; </th>

        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>&nbsp; </th>
          <th>&nbsp; </th>
          <th>&nbsp; </th>
          <th>&nbsp; </th>
          <th>&nbsp; </th>
          <th>Estatus</th>
          <th>&nbsp; </th>
          <th>&nbsp; </th>

        </tr>
      </tfoot>
    </table>


  </div>

    <script>
      $(document).ready(function() {
        $('#casos').DataTable({

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

          "autoWidth": true,
          "processing": true,
          "ServerSide": true,
          "dom": 'f<"clear">lr<"dt-buttons"B>tp',
          lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
          "ajax": "{{ url('api/casos') }}",
          "columns": [
            {data: 'num_caso'},
            {data: 'cod_trasaccion'},
            {data: 'solicitante'},
            {data: 'lugar_ocurrencia'},
            {data: 'descripcion'},
            {data: 'status'},
            {data: 'fecha'},
            {data: 'btn'},
          ],

          buttons: [
            'copy',

          {
            extend: 'pdfHtml5',
            title: 'Data export',
            className: 'btn',
            text: " Exportar en Pdf",
            filename: 'Casos',

            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5,6],
              // modifier: {
              //   page: 'current'
              // }
            },
            customize: function ( doc ) {
             doc.pageMargins = [ 70 , 70 , 100 , 60 ];
             doc.content.splice(0,1);
             doc.styles.tableHeader.fontSize = 10;
             var now = new Date();
						 var jsDate = now.getDate()+'-'+(now.getMonth()+1)+'-'+now.getFullYear();
             doc['header']=(function(){
               return {
                columns: [
                  {
                  alignment: 'center',
                  italics:  true,
                  text: 'Casos',
                  fontSize: 20,
                },
              ],
              margin: 20
               }
             });
             doc['footer']=(function(page, pages) {
							return {
								columns: [
									{
										alignment: 'left',
                    fontSize: 12,
										text: ['Creado el: ', { text: jsDate.toString() }]
									},
									{
										alignment: 'right',
                    fontSize: 12,
										text: ['pagina ', { text: page.toString() },	' of ',	{ text: pages.toString() }]
									}
								],
								margin: 100
							}
						});
             pageSize = 'A5';
             pageOrientation = 'landscape';
            //  var objLayout = {};
						// objLayout['hLineWidth'] = function(i) { return .5; };
						// objLayout['vLineWidth'] = function(i) { return .5; };
						// objLayout['hLineColor'] = function(i) { return '#aaa'; };
						// objLayout['vLineColor'] = function(i) { return '#aaa'; };
						// objLayout['paddingLeft'] = function(i) { return 4; };
						// objLayout['paddingRight'] = function(i) { return 4; };
						// doc.content[0].layout = objLayout;
             var cols = [];
             cols[0] = {text: 'Left part', alignment: 'left', margin:[20] };
             cols[1] = {text: 'Right part', alignment: 'right', margin:[0,0,20] };
             var objFooter = {};
             objFooter['columns'] = cols;
             doc['footer']=objFooter;
           },
        },
        ],

          "language": {

            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Spanish.json"

        },

        initComplete: function () {
            this.api().columns([5]).every( function () {
                var column = this;
                var select = $('<select><option value="">Estatus</option></select>')
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
    <script type="text/javascript" src="DataTables/datatables.min.js"></script>
@endsection
