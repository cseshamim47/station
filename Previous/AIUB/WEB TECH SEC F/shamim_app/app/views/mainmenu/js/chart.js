$(function(){

    var urltest = baseuri+"mainmenu/getpo";                       
    $.get(urltest, function(data) {

        var montharr=[];
        var amountarr=[];

        for(var i=0; i<data.length; i++){
            montharr.push(data[i].xper);
            amountarr.push(parseInt(data[i].xtotal, 10));
            
        }

        Highcharts.chart('saleschart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Month Wise Purchase'
            },
            xAxis: {
                min: 0,
                categories: montharr,
                title: {
                    text: '-->Month',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            yAxis: {
                title: {
                    text: '-->Amount',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Purchase',
                data: amountarr
            }]
        });

    },'json');

    var urltest = baseuri+"mainmenu/getsales";                       
    $.get(urltest, function(data) {

        var montharr=[];
        var amountarr=[];

        for(var i=0; i<data.length; i++){
            montharr.push(data[i].xper);
            amountarr.push(parseInt(data[i].xtotal, 10));
            
        }

        Highcharts.chart('pochart', {
            chart: {
                type: 'line'
                
            },
            title: {
                text: 'Month Wise Sales'
            },
            xAxis: {
                min: 0,
                categories: montharr,
                title: {
                    text: '-->Month',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            yAxis: {
                title: {
                    text: '-->Amount',
                    align: 'high'
                },
                labels: {
                    overflow: 'justify'
                }
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: true
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'Sales',
                data: amountarr,
                color: '#FF0000'
            }]
        });

    },'json');
});


$(function () {
$('#topten1').DataTable({
  'paging'      : false,
  'lengthChange': false,
  'searching'   : false,
  'ordering'    : true,
  'info'        : false,
  'autoWidth'   : false
})
$('#topten2').DataTable({
  'paging'      : false,
  'lengthChange': false,
  'searching'   : false,
  'ordering'    : true,
  'info'        : false,
  'autoWidth'   : false
})
});;;