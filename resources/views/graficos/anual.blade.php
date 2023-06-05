@extends('layout.template')
@section('content')
<style>
    .highcharts-figure,
.highcharts-data-table table {
    min-width: 310px;
    max-width: 2000px;
    margin: 1em auto;
}

#container {
    width: 100%;
    height: 500px;
}

.highcharts-data-table table {
    font-family: Verdana, sans-serif;
    border-collapse: collapse;
    border: 1px solid #ebebeb;
    margin: 10px auto;
    text-align: center;
    width: 100%;
    max-width: 500px;
}

.highcharts-data-table caption {
    padding: 1em 0;
    font-size: 1.2em;
    color: #555;
}

.highcharts-data-table th {
    font-weight: 600;
    padding: 0.5em;
}

.highcharts-data-table td,
.highcharts-data-table th,
.highcharts-data-table caption {
    padding: 0.5em;
}

.highcharts-data-table thead tr,
.highcharts-data-table tr:nth-child(even) {
    background: #f8f8f8;
}

.highcharts-data-table tr:hover {
    background: #f1f7ff;
}

</style>
<div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <div class="row">
        <div class="col-2">
            <select id="ano" class="form-select" aria-label="Default select example">
                <option selected>Selecione um ano</option>
                @foreach ($anos  as $ano)
                    <option value="{{$ano}}">{{$ano}}</option>
                @endforeach
              </select>
        </div>
    </div>
    <figure class="highcharts-figure">
        <div id="container"></div>
       
    </figure>
    
<script type="text/javascript">
Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Média de trabalho anual'
    },
    subtitle: {
        text: 'Secretária de Educação de Maracanaú'
    },
    xAxis: {
        categories: [
            
            'Jan',
            'Feb',
            'Mar',
            'Apr',
            'May',
            'Jun',
            'Jul',
            'Aug',
            'Sep',
            'Oct',
            'Nov',
            'Dec'
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Rainfall (mm)'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y:.1f} </b></td></tr>',
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
        name: 'Consertos em máquinas',
        data: [{{$newArrayConsertos}}]

    }, {
        name: 'Atendimento a Escola',
        data: [{{$newArrayEscolas}}]

    }, {
        name: 'Atendimento Interno',
        data: [{{$newArrayInterno}}]

       }, 
      

    ]
});

</script>
<script src="{{asset('assets/js/jquery.js')}}"></script>
<script src="{{asset('assets/js/graficos/anual.js')}}"></script>
    @endsection