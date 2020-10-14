<div id="maincontent" style="width:100%; left: 0px;">
<table border="0" cellpadding="0" cellspacing="0" width="99%">
<tbody>
<?php
 $query = 'SELECT * FROM channels';
 if ($e2 = mysql_query ($query,$i))
 while ($uo = mysql_fetch_row ($e2))
	{
	 $cnt=0;
	 $id=$uo[0];
	 $title=$uo[1].' ('.$id.')';
//	 if ($_GET["type"]==9) $query = 'SELECT * FROM hours WHERE type='.$_GET["type"].' AND channel='.$uo[0].' ORDER BY date DESC LIMIT 100';
	 if ($_GET["type"]==9) $query = 'SELECT * FROM (SELECT * FROM hours WHERE type='.$_GET["type"].' AND channel='.$uo[0].' ORDER BY date DESC LIMIT 100) sub ORDER BY date ASC';
	 else $query = 'SELECT * FROM prdata WHERE type='.$_GET["type"].' AND channel='.$uo[0].' ORDER BY date DESC LIMIT 100';
	 //echo $query;
	 if ($e4 = mysql_query ($query,$i))
	 while ($uo2 = mysql_fetch_row ($e4))
		{
		 $data[$cnt]=$uo2[5];
		 $date1[$cnt]=$uo2[4][14].$uo2[4][15];
		 $cnt++;
		}

	 if ($cnt>10)
{	   
	     include ("highcharts/trend.php");
//	     break;	 
}
	 //print '<tr><td><img src="charts/trend2.php?type=1&chan='.$uo[0].'&device='.$device.'&type='.$_GET["type"].'&name='.$uo[1].'"></td></tr>';
	}
?>
</tbody></table>
</div>