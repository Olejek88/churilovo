<script type="text/javascript" src="highcharts/jquery.min.js"></script>
<script type="text/javascript">
$(function () {
    var chart;
    $(document).ready(function() {
        chart = new Highcharts.Chart({
            chart: {
                renderTo: <?php print $container; ?>,
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
		<?php
                 print 'text: \''.$name.'\'';
		?>
            },
            tooltip: {
                formatter: function() {
                    return '<b>'+ this.point.name +'</b>: '+ this.percentage +' %';
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                type: 'pie',
                name: '',
		data: [<?php
		    for ($tn=0;$tn<$cnt;$tn++)
			{
			 if ($tn>0) print ', ';
			 print "['".$dat[$tn]."',".$data[$tn]."]";
			}
		?>
                ]
            }]
        });
    });
    
});
</script>

<script src="highcharts/js/highcharts.js"></script>
<script src="highcharts/js/modules/exporting.js"></script>
<div id="<?php print $container; ?>" style="min-width: 300px; height: 270px; margin: 0 auto"></div>
