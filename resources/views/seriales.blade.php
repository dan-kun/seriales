@extends('layouts.app1')


@section('content')

@extends('menu-test')

<div class="container">
      <div class="row">
        <div class="col-10 col-md-10 offset-1">
          <br><br>
          <div class="card">
            <div class="card-header">Tabla de Seriales</div>
            <div class="card-body">
              <div class="row">
                <div id="container_tipo_solicitud" class="col-3">
                  <div class="form-group">
                    <label for="tipo_solicitud">Tipo de Solicitud:</label>
                    <select class="form-control tipo_solicitud" id="tipo_solicitud">
                      <option value="">Todos</option>
                    </select>
                  </div>
                </div>
                <div id="container_estatus_solicitud" class="col-3">
                  <div class="form-group">
                    <label for="estatus_solicitud">Estatus de Solicitud:</label>
                    <select class="form-control estatus_solicitud" id="estatus_solicitud">
                      <option value="">Todos</option>
                    </select>
                  </div>
                </div>
                <div id="container_serie_decimal" class="col-3">
                  <div class="form-group">
                    <label for="serie_decimal">Serie Decimal:</label>
                    <input class="form-control" type="text" placeholder="Escriba una serie" id="serie_decimal">
                  </div>
                </div>
                <div id="container_serie_hexadecimal" class="col-3">
                  <div class="form-group">
                    <label for="serie_hexadecimal">Serie Hexadecimal:</label>
                    <input class="form-control" type="text" placeholder="Escriba una serie" id="serie_hexadecimal">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-10 col-md-10 offset-1">
          <br>
          <table id="seriales" class="table table-striped table-bordered dt-responsive nowrap display">
            <thead>
              <tr>
                <th class="text-center">ID</th>
                <th class="text-center">Serie Decimal</th>
                <th class="text-center">Serie Hexadecimal</th>
                <th class="text-center">Tipo de Solicitud</th>
                <th class="text-center">Estatus de Solicitud</th>
                <th class="text-center">Fecha</th>
                <th class="text-center">Detalle</th>
              </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>

    <script src="js/seriales.js" charset="utf-8"></script>

    {{-- <script>
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
          "dom": 'f<"clear">lr<"dt-buttons"B>tp',
          lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 50, 100, 200, "All"]],
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
            'copy',
                    {
            extend: 'pdfHtml5',
            title: 'Data export',
            className: 'btn',
            text: " Exportar en Pdf",
            filename: 'Seriales',

            exportOptions: {
              columns: [0, 1, 2, 3, 4, 5],
              // modifier: {
              //   page: 'current'
              // }
            },
            customize: function ( doc ) {
             doc.pageMargins = [ 100 , 70 , 100 , 60 ];
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
                  text: 'Seriales',
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
             var objLayout = {};
						objLayout['hLineWidth'] = function(i) { return .5; };
						objLayout['vLineWidth'] = function(i) { return .5; };
						objLayout['hLineColor'] = function(i) { return '#aaa'; };
						objLayout['vLineColor'] = function(i) { return '#aaa'; };
						objLayout['paddingLeft'] = function(i) { return 4; };
						objLayout['paddingRight'] = function(i) { return 4; };
						doc.content[0].layout = objLayout;
             // var cols = [];
             // cols[0] = {text: 'Left part', alignment: 'left', margin:[20] };
             // cols[1] = {text: 'Right part', alignment: 'right', margin:[0,0,20] };
             // var objFooter = {};
             // objFooter['columns'] = cols;
             // doc['footer']=objFooter;
           },
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
                var select = $('<select><option value="" >Estatus</option></select>')
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
    <script type="text/javascript" src="DataTables/datatables.min.js"></script> --}}

@endsection
