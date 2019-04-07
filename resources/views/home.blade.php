@extends('layouts.app2')


@section('content')

<script src="{{ asset('Highcharts/code/modules/exporting.js') }}" charset="utf-8"></script>
<script src="{{ asset('Highcharts/code/modules/export-data.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/graficas.js') }}" charset="utf-8"></script>

<div id="container" style="width: 90%; height: 500px; margin: 0 auto"></div>

@endsection
