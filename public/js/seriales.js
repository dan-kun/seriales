$(document).ready(function(){

  var host = location;

  var dtLengthMenu = "Mostrar _MENU_ registros por página";
  var dtInfo = "Página _PAGE_ de _PAGES_";
  var dtSearch = "Buscar:";
  var dtZeroRecords = "No existen datos para mostrar";
  var dtInfoEmpty = "No hay datos para mostrar";
  var dtInfoFiltered = "(filtered from _MAX_ total records)";
  var dtPrevious = "Anterior";
  var dtNext = "Siguiente";
  function getSeriales() {
    var tipo_solicitud = '';
    var estatus_solicitud = '';
    var serie_decimal = '';
    var serie_hexadecimal = '';

    var tipo = $('#tipo_solicitud').val();
    if(tipo == ""){
      tipo_solicitud = 'Todos';
    }
    else{
      tipo_solicitud = $('#tipo_solicitud').val();
    }

    var estatus = $('#estatus_solicitud').val();
    if(estatus == ""){
      estatus_solicitud = 'Todos';
    }
    else{
      estatus_solicitud = $('#estatus_solicitud').val();
    }

    var decimal = $('#serie_decimal').val();
    if(decimal == ""){
      serie_decimal = 'Todos';
    }
    else{
      serie_decimal = $('#serie_decimal').val();
    }

    var hexadecimal = $('#serie_hexadecimal').val();
    if(hexadecimal == ""){
      serie_hexadecimal = 'Todos';
    }
    else{
      serie_hexadecimal = $('#serie_hexadecimal').val();
    }

    // var url = 'http://localhost/proyecto_cantv/public/api/seriales/' + tipo_solicitud + '/' + estatus_solicitud + '/' + serie_decimal + '/' + serie_hexadecimal + '/';
    var url = host + '/' + tipo_solicitud + '/' + estatus_solicitud + '/' + serie_decimal + '/' + serie_hexadecimal + '/';
    $.getJSON(url).done(function(data) {
      datos = data;
      // alert(datos);
      $('#seriales').DataTable({
        data: datos,
        columns: [
          {data: 'id'},
          {data: 'serie_dec'},
          {data: 'serie_hex'},
          {data: 'tipo_solicitud'},
          {data: 'estatus_solicitud'},
          {data: 'fecha'},
          {
            data: function(row, type, set) {
              return getSerialDetailButton(row.id);
            }
          },
        ],
        "destroy": true,
        "ordering": true,
        // "paging": false,
        "searching": false,
        "info": false,
        "bLengthChange": false,
        "language": {
          "lengthMenu": dtLengthMenu,
          "info": dtInfo,
          "search": dtSearch,
          "zeroRecords": dtZeroRecords,
          "infoEmpty": dtInfoEmpty,
          "infoFiltered": dtInfoFiltered,
          "paginate": {
            "previous": dtPrevious,
            "next": dtNext
          }
        }
      });
    }).fail(function(jqxhr, textStatus, error) {
      var err = textStatus + ", " + error;
      console.log("Error oteniendo el listado de Seriales: " + err);
    });
  }

  function getCombos() {
    // var url = 'http://localhost/proyecto_cantv/public/api/seriales/combos/Todos/Todos/';
    var url = host + '/combos/Todos/Todos/';
    $.getJSON(url).done(function(data) {
        datos = data;
        setComboTipoSolicitud(datos.combo_tipo_solicitud, 'tipo_solicitud');
        setComboEstatusSolicitud(datos.combo_estatus_solicitud, 'estatus_solicitud');
      })
      .fail(function(jqxhr, textStatus, error) {
        var err = textStatus + ", " + error;
        console.log("Error obteniendo los combos para tabla Seriales: " + err);
      });
  }

  function setComboTipoSolicitud(listado, clase) {
    $.each(listado, function(index, element) {
      $('#' + clase).append($('<option>', {
        value: element.tipo_solicitud,
        text: element.tipo_solicitud
      }));
    });
  }

  function setComboEstatusSolicitud(listado, clase) {
    $.each(listado, function(index, element) {
      $('#' + clase).append($('<option>', {
        value: element.estatus_solicitud,
        text: element.estatus_solicitud
      }));
    });
  }

  getCombos();
  getSeriales();

  $('#tipo_solicitud, #estatus_solicitud').on('change', function(){
    getSeriales();
  })

  $('#serie_decimal, #serie_hexadecimal').on('keyup', function(){
    getSeriales();
  })

  // Esta funcion se encarga de retornar como un string un enlace <a></a> que en
  // el href construye la url que apunta al webservice de detalle de de seriales
  // la url relativa es "seriales/" + id que se recibe como parametro. De igual
  // manera se agrega la clase btn-detail para que pueda ser referencia desde el
  // evento onclick si se pulsa sobre un enlace que requiera mostrar el modal.
  // El atributo: data-target="#exampleModalLong" es el disparador de eventos
  // mostrar el modal que ya ha sido previamente maquetado en el html usando
  // bootstrap.
  function getSerialDetailButton(id){
    return '<a href="seriales/'+id+'" class="bg-white text-primary btn-detail" data-toggle="modal" data-target="#exampleModalLong"><i class="fas fa-info-circle fa-2x"></i></a>';
  }

  // Con esta funcion se actualizan los valores del modal segun se pulse el
  // enlace respectivo de cada fila, el llamado se hace apuntando al <body> en
  // el html, a traves de la clase que indica la tabla con el id seriales, su
  // <tbody> y los enlaces que tengan como clase .btn-detail
  $("body").on('click', '#seriales tbody tr a.btn-detail', function(event){
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
      datos = data;
      // Se sobreescriben los valores de los span que muestran los valores del
      // detalle, el modal es de la suite bootstrap y se idenfica con el id
      // exampleModalLong en el html respectivo
      $(".serial-serie-dec").text(datos.serie_dec);
      $(".serial-serie-hex").text(datos.serie_hex);
      $(".serial-tipo-sol").text(datos.tipo_solicitud);
      $(".serial-estatus-sol").text(datos.estatus_solicitud);
      $(".serial-fec").text(datos.fecha);
    })
    .fail(function(jqxhr, textStatus, error) {
      var err = textStatus + ", " + error;
      console.log("Error obteniendo el detalle del serial: " + err);
    });
  })

});
