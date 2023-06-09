<figure class="highcharts-figure">
    <div id="container"></div>

</figure>

<script type="text/javascript">
Highcharts.chart('container', {
chart: {
    type: 'column'
},
title: {
    text: `Participações por Funcionário - {{$ano}}`
},
subtitle: {
    text: 'Secretária de Educação de Maracanaú'
},
xAxis: {
    categories: [
        @foreach ($funcionarios as $funcionario)
        '{{ $funcionario->nome }}',
        @endforeach
    ],
    crosshair: true,
    max: {{ count($funcionarios) - 1 }}
},
yAxis: {
    min: 0,
    title: {
        text: 'Rainfall (mm)'
    }
},
tooltip: {
    headerFormat: '<span style="font-size:20px">{point.key}</span><table>',
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
    name: 'Atendimento Interno',
    data: [
        {{$novoArrayInterno}}
    ]
}, {
    name: 'Máquinas',
    data: [{{$novoArrayMaquinas}}]
}, {
    name: 'Escolas',
    data: [{{$novoArrayEscolas}}]
   },


]
});

</script>