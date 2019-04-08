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

      if(tipo == "Exclusión"){
        var exclusion = getSerieTipoOperacion("Exclusión", anio);
        series = [{
          name: 'Exclusion',
          data: exclusion

        }]
      }

      if(tipo == "Inclusión"){
        var inclusion = getSerieTipoOperacion("Inclusión", anio);
        series = [{
          name: 'Inclusion',
          data: inclusion

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


/*Graficas de totalidad por año*/

function getSerieTipoOperacionAnio (tipo123)
{
    var url = 'api/seriales_anio' + '/' + tipo123 + '/';
    var resultado = [];
    $.ajax({
        url: url,
        async: false,
        dataType: 'json',
        success: function (data)
        {
            resultado = data;
        }
    });

    return resultado;

}

function graficar2 (tipo){
    var series2 = [];



    console.log(tipo);

    if(tipo == '' || tipo == 'Todos'){
      var inclusion = getSerieTipoOperacionAnio("Inclusión");
      var exclusion = getSerieTipoOperacionAnio("Exclusión");
      console.log(inclusion);
      series2 = [{
        name: 'Exclusion por año',
        data: inclusion

      }, {
        name: 'Inclusion por año',
        data: exclusion

      }]
    }
    else{

      if(tipo == "Exclusión"){
        var exclusion = getSerieTipoOperacionAnio("Exclusión");
        series2 = [{
          name: 'Exclusion por año',
          data: exclusion

        }]
      }

      if(tipo == "Inclusión"){
        // Se inicializan los vectores de inclusion (data para la serie) y
        // categories (data para el eje de las x)
        var inclusion = [];
        var categories = [];
        // Se obtiene la data desde el webservice y se almacena en la variable
        // data
        var data = getSerieTipoOperacionAnio("Inclusión");
        // se recorre el diccionario data, asignando de manera balanceada la
        // data en los respectivos vectores que permitiran construir la grafica
        $.each(data, function(i, item) {
          categories.push(item.ano)
          inclusion.push(item.cantidad)
        });

        series2 = [{
          name: 'Inclusion por año',
          data: inclusion

        }]
      }
    }

    Highcharts.chart('container2', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Graficas por año de Seriales Negativos'
      },
      subtitle: {
        text: 'Fuente: Departamento de Fraudes, CANTV'
      },
      xAxis: {
        categories: categories,
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
      series: series2
    });

}

  $('#tipo12').on('change', function(){
    var tipo = $('#tipo12').val();;
    graficar2(tipo);
  });







/*Graficas para vista de casos, donde se detalla los casos procesados y por procesar*/

   function getCasoTipoOperacion(status, anio1){
    var url = 'api/casos' + '/' + status + '/' + anio1 + '/';
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

  function graficar1(tipo1, anio1){

    var series1 = [];

    if(tipo1 == '' || tipo1 == 'Todos'){
      var procesado = getCasoTipoOperacion("Procesado", anio1);
      var por = getCasoTipoOperacion("Por", anio1);
      series1 = [{
        name: 'Procesado',
        data: procesado

      }, {
        name: 'Por procesar',
        data: por

      }]
    }
    else{

      if(tipo1 == "Procesado"){
        var procesado = getCasoTipoOperacion("Procesado", anio1);
        series1 = [{
          name: 'Procesado',
          data: procesado

        }]
      }

      if(tipo1 == "Por"){
        var por = getCasoTipoOperacion("Por", anio1);
        series1 = [{
          name: 'Por procesar',
          data: por

        }]
      }
    }


    Highcharts.chart('container1', {
      chart: {
        type: 'column'
      },
      title: {
        text: 'Promedio anual de Casos Negativos'
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
          text: 'Casos negativos'
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
      series: series1
    });
  }

  $('#status, #anio1').on('change', function(){
    var tipo1 = $('#status').val();;
    var anio1 = $('#anio1').val();;
    graficar1(tipo1, anio1);
  })
});
