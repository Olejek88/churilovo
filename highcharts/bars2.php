<script type="text/javascript" src="highcharts/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container2',
                type: 'column'       
            },
            title: {
		<?php
                 print 'text: \''.$title.'\'';
		?>
            },
            xAxis: {
                categories: [<?php
			for ($tn=$cnt-1,$cn=0; $tn>=0; $tn--)
			{
			 if ($cn>0) print ', ';
			 print "'".$name[$tn]."'";  $cn++;
			}
		  print '],'; 
		?>

                labels: {
                    rotation: -45,
                    align: 'right',
                    style: {
                        fontSize: '11px',
                        fontFamily: 'Verdana, sans-serif'
                    }}
            },
            yAxis: {
                title: {
                    text: null
                }
            },
            legend: {
                enabled: false
            },
            tooltip: {
                formatter: function() {
                    return ''+
                        this.x +': '+ this.y;
                }
            },
            plotOptions: {
                column: {
                    pointPadding: 0.2,
                    borderWidth: 0,
                    dataLabels: {
                        enabled: false
                    }
                }
            },
            series: [{
		data: [<?php
			for ($tn=$max-1,$cn=0; $tn>=0; $tn--)
			{
			 if ($cn>0) print ', ';
			 if ($data[$tn][1]) print $data[$tn][1];
			 else print '0'; $cn++;
			}
		  print '] }]';
		?>
        });
    });
    
});
</script>
<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>
<div id="container2" style="min-width: 400px; height: 420px; margin: 0 auto"></div>
