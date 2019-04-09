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

function getSerieTipoOperacionAnio(tipo, anio2)
{
    var url = 'api/seriales_anio' + '/' + tipo + '/' + anio2 + '/';
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

function graficar2 (tipo, anio2){
    var series2 = [];



    console.log(tipo, anio2);

    if(tipo == '' || tipo == 'Todos'){

      var categories = [];
      var exclusion = [];
      var inclusion = [];

      var data = getSerieTipoOperacionAnio("Inclusión",anio2);
      var data1 = getSerieTipoOperacionAnio("Exclusión",anio2);

      $.each(data, function(i, item){

        categories.push(item.ano)
        inclusion.push(item.cantidad)

      });

      $.each(data1, function(i, item){

        exclusion.push(item.cantidad)

      });

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

        var exclusion = [];
        var categories = [];

        var data = getSerieTipoOperacionAnio("Exclusión", anio2);

        $.each(data, function(i, item){
          categories.push(item.ano)
          exclusion.push(item.cantidad)
        });
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
        var data = getSerieTipoOperacionAnio("Inclusión", anio2);
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

  $('#tipo, #anio2').on('change', function(){
    var tipo = $('#tipo').val();;
    var anio2 = $('#anio2').val();;
    graficar2(tipo, anio2);
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



  function getCasoTipoOperacionAnio(estatus1, anio3){
   var url = 'api/casos_anio' + '/' + estatus1 + '/' + anio3 + '/';
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


  function graficar3 (estatus1, anio3){
      var series3 = [];



      console.log(estatus1, anio3);

      if(estatus1 == '' || estatus1 == 'Todos'){

        var categorias = [];
        var procesado = [];
        var por = [];

        var cas0 = getCasoTipoOperacionAnio("Procesado",anio3);
        var cas01 = getCasoTipoOperacionAnio("Por",anio3);

        $.each(cas0, function(i, item){

          categorias.push(item.ano)
          procesado.push(item.cantidad)

        });

        $.each(cas01, function(i, item){

          por.push(item.cantidad)

        });

        series3 = [{
          name: 'Procesados por año',
          data: procesado

        }, {
          name: 'Por procesar por año',
          data: por

        }]
      }
      else{

        if(estatus1 == "Procesado"){

          var procesado = [];
          var categorias = [];

          var cas0 = getCasoTipoOperacionAnio("Procesado", anio3);

          $.each(cas0, function(i, item){
            categorias.push(item.ano)
            procesado.push(item.cantidad)
          });
          series3 = [{
            name: 'Procesado por año',
            data: procesado

          }]
        }

        if(estatus1 == "Por"){
          // Se inicializan los vectores de inclusion (data para la serie) y
          // categories (data para el eje de las x)
          var por = [];
          var categorias = [];
          // Se obtiene la data desde el webservice y se almacena en la variable
          // data
          var cas01 = getCasoTipoOperacionAnio("Por", anio3);
          // se recorre el diccionario data, asignando de manera balanceada la
          // data en los respectivos vectores que permitiran construir la grafica
          $.each(cas01, function(i, item) {
            categorias.push(item.ano)
            por.push(item.cantidad)
          });

          series3 = [{
            name: 'Por procesar por año',
            data: por

          }]
        }
      }

      Highcharts.chart('container3', {
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
          categories: categorias,
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
        series: series3
      });

  }

    $('#estatus1, #anio3').on('change', function(){
      var estatus1 = $('#estatus1').val();;
      var anio3 = $('#anio3').val();;
      graficar3(estatus1, anio3);
    });

});
