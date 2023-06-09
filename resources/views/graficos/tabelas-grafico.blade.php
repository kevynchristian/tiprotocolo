<div>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



<script type="text/javascript">

 Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: `Média de trabalho anual - {{$anoSelect}}`
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
