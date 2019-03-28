barChart = Highcharts.chart('bar_chart', {
    chart: {
        type: 'column'
    },
    title: {
        text: ''
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Framework'
        }
    },
    // series: [{
    //     colorByPoint: true,
    //     name: 'Framework',
    //     data: [
    //         ['CodeIgniter', 4],
    //         ['Yii', 6],
    //         ['Laravel', 10],
    //     ]
    // }]
});

$.ajax({
    url: $('#bar_chart').attr('data-url'),
    success: function (data) {
       barChart.addSeries({
           colorByPoint: true,
           name: 'Framework',
           data: data,
       });
    }
});

pieChart = Highcharts.chart('pie_chart', {
    chart: {
        type: 'pie'
    },
    title: {
        text: ''
    },
    plotOptions: {
        pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
                format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
        }
    },
    // series: [{
    //     colorByPoint: true,
    //     data: [
    //         { name: 'CodeIgniter', y: 20 },
    //         { name: 'Yii', y: 30 },
    //         { name: 'Laravel', y: 50 },
    //     ]
    // }]
});

$.ajax({
    url: $('#pie_chart').attr('data-url'),
    success: function (data) {
       pieChart.addSeries({
           colorByPoint: true,
           data: data,
       });
    }
});
