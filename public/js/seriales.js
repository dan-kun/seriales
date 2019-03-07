$(document).ready(function(){
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

    var url = 'http://localhost/seriales/public/api/seriales/' + tipo_solicitud + '/' + estatus_solicitud + '/' + serie_decimal + '/' + serie_hexadecimal + '/';
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
    var url = 'http://localhost/seriales/public/api/seriales/combos/Todos/Todos/';
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

});
