<script type="text/javascript" src="highcharts/jquery.js"></script>

<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: 'container<?php print $id; ?>',
                type: 'line'
            },
            title: {
		<?php
                 print 'text: \''.$name.'\'';
		?>
            },
            xAxis: {
		minTickInterval: 5,
                categories: [<?php
			for ($tn=0,$cn=0; $tn<=$cnt; $tn++)
			if ($data[$tn])
			{
			 if ($cn>0) print ', ';
			 print $date1[$tn];  $cn++;
			}
		  print ']';
		?>
            },
            yAxis: {
                title: {
                    text: '<?php print $title; ?>'
                }
            },
            legend: {
                enabled: false
            },
            plotOptions: {
                line: {
                    dataLabels: {
                        enabled: false
                    },
                    enableMouseTracking: false
                }
            },
            series: [{
                name: 'eqwewe',
		data: [<?php
			for ($tn=0,$cn=0; $tn<=$cnt; $tn++)
			if ($data[$tn])
			{
			 if ($cn>0) print ', ';
			 print $data[$tn];  $cn++;
			}
		  print '] }]';
		?>
        });
    });
    
});
</script>

<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>
<div id="container<?php print $id; ?>" style="min-width: 400px; height: 200px; margin: 0 auto"></div>
