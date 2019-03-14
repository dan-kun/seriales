$(document).ready(function(){

  // Inicializando calendarios para filtrado de fechas del listado de casos
  $( "#fecha_desde, #fecha_hasta" ).datepicker({
    dateFormat: 'dd-mm-yy'
  });

  function getCasos(){
    // Inicializacion de las variables
    var codigo_caso = '';
    var estatus_caso = '';
    var codigo = $('#codigo_caso').val();
    if(codigo == ""){
      codigo_caso = 'Todos';
    }
    else{
      codigo_caso = $('#codigo_caso').val();
    }
    var estatus = $('#estatus_caso').val();
    if(estatus == ""){
      estatus_caso = 'Todos';
    }
    else{
      estatus_caso = $('#estatus_caso').val();
    }
    var fecha_ini = $('#fecha_desde').val();
    if(fecha_ini == ""){
      fecha_desde = 'Todos';
    }
    else{
      fecha_desde = $('#fecha_desde').val();
    }
    var fecha_fin = $('#fecha_hasta').val();
    if(fecha_fin == ""){
      fecha_hasta = 'Todos';
    }
    else{
      fecha_hasta = $('#fecha_hasta').val();
    }
    var url = 'api/casos/' + codigo_caso + '/' + estatus_caso + '/' + fecha_desde + '/' + fecha_hasta + '/';
    $.getJSON(url).done(function(data) {
      datos = data;
      $('#casos').DataTable({
        data: datos,
        columns: [
          {data: 'num_caso'},
          {data: 'cod_trasaccion'},
          {data: 'solicitante'},
          {data: 'lugar_ocurrencia'},
          // {data: 'descripcion'},
          {data: 'status'},
          {data: 'fecha'},
          {
            data: function(row, type, set) {
              return getDetalleCasos(row.id);
            }
          },
        ],
        "destroy": true,
        "ordering": true,
        // "paging": false,
        "searching": false,
        "info": false,
        "bLengthChange": false,
      });
    }).fail(function(jqxhr, textStatus, error) {
      var err = textStatus + ", " + error;
      console.log("Error oteniendo el listado de Casos: " + err);
    });
  }

  function getDetalleCasos(id){
    return '<a id="'+id+'" href="casos/'+id+'" class="bg-white text-primary btn-detail" data-toggle="modal" data-target="#modalCasos"><i class="fas fa-info-circle fa-2x"></i></a>';
  }

  // Con esta funcion se actualizan los valores del modal segun se pulse el
  // enlace respectivo de cada fila, el llamado se hace apuntando al <body> en
  // el html, a traves de la clase que indica la tabla con el id seriales, su
  // <tbody> y los enlaces que tengan como clase .btn-detail
  $("body").on('click', '#casos tbody tr a.btn-detail', function(event){
    // Evita que el enlace <a></a> continue con su comportamiento por defecto
    event.preventDefault();
    // Se obtiene el valor de la ruta al webservice de detalle desde el atributo
    // href del <a></a>, esto a traves de la formacion de la ruta relativa en el
    // html con la forma seriales/{id}
    var url = this.href;
    // Se inicializa la variable datos
    var datos = "";
    // Se consulta el webservice usando la url obtenida del href del enlace
    $.getJSON(url)
    .done(function(data) {
      datos = data[0];
      // Se sobreescriben los valores de los span que muestran los valores del
      // detalle, el modal es de la suite bootstrap y se idenfica con el id
      // exampleModalLong en el html respectivo
      $(".caso-numero").text(datos.num_caso);
      $(".caso-codigo").text(datos.cod_trasaccion);
      $(".caso-solicitante").text(datos.solicitante);
      $(".caso-lugar").text(datos.descripcion);
      $(".caso-estatus").text(datos.status);
      $(".caso-descripcion").text(datos.lugar_ocurrencia);
    })
    .fail(function(jqxhr, textStatus, error) {
      var err = textStatus + ", " + error;
      console.log("Error obteniendo el detalle del caso: " + err);
    });
  });

  function getCombos() {
    var url = 'api/casos/combos/';
    $.getJSON(url).done(function(data) {
        datos = data;
        setComboEstatusSolicitud(datos.combo_estatus_solicitud, 'estatus_caso');
      })
      .fail(function(jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Error obteniendo los combos para tabla Casos: " + err);
      });
  }

  function setComboEstatusSolicitud(listado, clase) {
    $.each(listado, function(index, element) {
      $('#' + clase).append($('<option>', {
        value: element.status,
        text: element.status
      }));
    });
  }

  $("#fecha_desde, #fecha_hasta, #estatus_caso").on("change", function(){
    getCasos();
  });

  $('#codigo_caso').on('keyup', function(){
    getCasos();
  })

  getCombos();
  getCasos();

  function getCasosExcel(){
    // Inicializacion de las variables
    var codigo_caso = '';
    var estatus_caso = '';
    var codigo = $('#codigo_caso').val();
    if(codigo == ""){
      codigo_caso = 'Todos';
    }
    else{
      codigo_caso = $('#codigo_caso').val();
    }
    var estatus = $('#estatus_caso').val();
    if(estatus == ""){
      estatus_caso = 'Todos';
    }
    else{
      estatus_caso = $('#estatus_caso').val();
    }
    var fecha_ini = $('#fecha_desde').val();
    if(fecha_ini == ""){
      fecha_desde = 'Todos';
    }
    else{
      fecha_desde = $('#fecha_desde').val();
    }
    var fecha_fin = $('#fecha_hasta').val();
    if(fecha_fin == ""){
      fecha_hasta = 'Todos';
    }
    else{
      fecha_hasta = $('#fecha_hasta').val();
    }
    var url = 'api/casos/excel_export/' + codigo_caso + '/' + estatus_caso + '/' + fecha_desde + '/' + fecha_hasta + '/';
    window.location.href = url;
  }

  $('#exportar_excel').on('click', function(event){
    event.preventDefault();
    getCasosExcel();
  })

});
