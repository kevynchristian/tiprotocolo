<figure class="highcharts-figure">
    <div id="container"></div>

</figure>

<script type="text/javascript">
Highcharts.chart('container', {
chart: {
    type: 'column'
},
title: {
    text: 'Produção de laudos para equipamentos inservíveis - {{$ano}}'
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
    crosshair: true,
    max: 11
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
    name: 'Inservíveis',
    data: [{{$newInserviveis}}]
}

]
});
