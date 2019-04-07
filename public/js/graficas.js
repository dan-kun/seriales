$(document).ready(function(){

  function getSerieTipoOperacion(tipo_operacion, anio){
    var url = 'api/seriales' + '/' + tipo_operacion + '/' + anio + '/';
    // $.getJSON(url).done(function(data) {
    //   datos = data;
    //   this.inclusion = datos;
    // })
    // .fail(function(jqxhr, textStatus, error) {
    //   var err = textStatus + ", " + error;
    //   console.log("Error obteniendo las series para tipo de operacion: " + err);
    // });
    var resultado = [];
    $.ajax({
      url: url,
      async: false,
      dataType: 'json',
      success: function (data) {
        resultado = data;
      }
    });
    return resultado;
  }

  function graficar(tipo, anio){

    var series = [];

    if(tipo == '' || tipo == 'Todos'){
      var inclusion = getSerieTipoOperacion("Inclusión", anio);
      var exclusion = getSerieTipoOperacion("Exclusión", anio);
      series = [{
        name: 'Exclusion',
        data: inclusion

      }, {
        name: 'Inclusion',
        data: exclusion

      }]
    }
    else{
      if(tipo == "Inclusión"){
        var inclusion = getSerieTipoOperacion("Inclusión", anio);
        series = [{
          name: 'Inclusion',
          data: inclusion

        }]
      }
      else if(tipo == "Exclusión"){
        var inclusion = getSerieTipoOperacion("Exclusión", anio);
        series = [{
          name: 'Exclusion',
          data: exclusion

        }]
      }
    }

    // var inclusion = getSerieTipoOperacion("Inclusión", anio);
    // var exclusion = getSerieTipoOperacion("Exclusión", anio);

    Highcharts.chart('container', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Promedio anual de Seriales Negativos'
      },
      subtitle: {
        text: 'Fuente: Departamento de Fraudes, CANTV'
      },
      xAxis: {
        categories: [
          'Enero',
          'Febrero',
          'Marzo',
          'Abril',
          'Mayo',
          'Junio',
          'Julio',
          'Agosto',
          'Septiembre',
          'Octubre',
          'Noviembre',
          'Diciembre'
        ],
        crosshair: true
      },
      yAxis: {
        min: 0,
        title: {
          text: 'Seriales negativos'
        }
      },
      tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
      },
      plotOptions: {
        column: {
          pointPadding: 0.2,
          borderWidth: 0
        }
      },
      series: series
    });
  }

  $('#tipo_solicitud, #anio').on('change', function(){
    var tipo = $('#tipo_solicitud').val();;
    var anio = $('#anio').val();;
    graficar(tipo, anio);
  })

});
