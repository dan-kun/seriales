@extends('layouts.app2')


@section('content')




<div id="container" style="width: 100%; height: 500px; margin: 0 auto"></div>

<script src="{{ asset('Highcharts/code/modules/exporting.js') }}" charset="utf-8"></script>
<script src="{{ asset('Highcharts/code/modules/export-data.js') }}" charset="utf-8"></script>


<script type="text/javascript">
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
    series: [{
        name: 'Exclusion',
        data: []

    }, {
        name: 'Inclusion',
        data: []

    }]
});
</script>

@endsection
