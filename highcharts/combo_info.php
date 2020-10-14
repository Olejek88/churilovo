<script type="text/javascript" src="highcharts/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container3'
            },
            title: {
                text: null
            },
            xAxis: {
                categories: ['Газ', 'Тепло', 'Вода', 'Электричество']
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            tooltip: {
                formatter: function() {
                    var s;
                    if (this.point.name) { // the pie chart
                        s = ''+
                            this.point.name +': '+ this.y +' fruits';
                    } else {
                        s = ''+
                            this.x  +': '+ this.y;
                    }
                    return s;
                }
            },
            series: [{
                type: 'column',
                name: 'Газ',
                data: [3, 2, 1, 3]
            }, {
                type: 'column',
                name: 'Тепло',
                data: [2, 3, 5, 7]
            }, {
                type: 'column',
                name: 'Вода',
                data: [4, 3, 3, 9]
            }, {
                type: 'spline',
                name: 'Электричество',
                data: [3, 2.67, 3, 3.33]
            }, {
                type: 'pie',
                name: 'Total consumption',
                data: [{
                    name: 'Газ',
                    y: 13,
                    color: '#4572A7'
                }, {
                    name: 'Вода',
                    y: 23,
                    color: '#AA4643'
                }, {
                    name: 'Тепло',
                    y: 19,
                    color: '#89A54E'
                }],
                center: [40, 40],
                size: 80,
                showInLegend: false,
                dataLabels: {
                    enabled: false
                }
            }]
        });
    });
    
});
		</script>
	</head>
	<body>
<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>
<div id="container3" style="min-width: 380px; height: 200px; margin: 0 auto"></div>
