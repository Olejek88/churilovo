<script type="text/javascript" src="highcharts/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'bars',
                type: 'column'
            },
            title: {
		<?php
                 print 'text: \''.$name.'\'';
		?>
            },
            subtitle: {
                text: 'distribution energy sources in time'
            },
            xAxis: {
                categories: [<?php
		    for ($tn=0; $tn<12; $tn++)
			{
			 if ($tn>0) print ', ';
			 print "'".$dats[$tn]."'";
			}
		  print '],'; 
		?>
		    },
            yAxis: {
                min: 0,
                title: {
                    text: ''
                }
            },
            legend: {
                layout: 'vertical',
                backgroundColor: '#FFFFFF',
                align: 'left',
                verticalAlign: 'top',
                x: 30,
                y: 0,
                floating: true,
                shadow: true
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y +' mm';
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0
                }
            },
                series: [{
            	name: 'Электроэнергия',
		groupPadding: 0.1,
		pointPadding: 0.1,
                data: [<?php
		    for ($tn=0; $tn<12; $tn++)
			{
			 if ($tn>0) print ', ';
			 print $data00[$tn];
			}
		?>]
            }, {
                name: 'Газ',
		groupPadding: 0.1,
		pointPadding: 0.1,
                data: [<?php
		    for ($tn=0; $tn<12; $tn++)
			{
			 if ($tn>0) print ', ';
			 print $data01[$tn];
			}
		?>]
            }, {
                name: 'Вода',
		groupPadding: 0.1,
		pointPadding: 0.1,
                data: [<?php
		    for ($tn=0; $tn<12; $tn++)
			{
			 if ($tn>0) print ', ';
			 print $data03[$tn];
			}
		?>]    
            }, {
                name: 'Тепло',
		groupPadding: 0.1,
		pointPadding: 0.1,
                data: [<?php
		    for ($tn=0; $tn<12; $tn++)
			{
			 if ($tn>0) print ', ';
			 print $data04[$tn];
			}
		?>]    
            }]
        });
    });
    
});
</script>
<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>
<div id="bars" style="min-width: 950px; height: 300px; margin: 0 auto"></div>
