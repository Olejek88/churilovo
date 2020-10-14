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
                categories: ['���', '�����', '����', '�������������']
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
                name: '���',
                data: [3, 2, 1, 3]
            }, {
                type: 'column',
                name: '�����',
                data: [2, 3, 5, 7]
            }, {
                type: 'column',
                name: '����',
                data: [4, 3, 3, 9]
            }, {
                type: 'spline',
                name: '�������������',
                data: [3, 2.67, 3, 3.33]
            }, {
                type: 'pie',
                name: 'Total consumption',
                data: [{
                    name: '���',
                    y: 13,
                    color: '#4572A7'
                }, {
                    name: '����',
                    y: 23,
                    color: '#AA4643'
                }, {
                    name: '�����',
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
