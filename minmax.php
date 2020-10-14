<link rel="stylesheet" type="text/css" href="files/site.css">
<td style="padding-right: 3px; padding-left: 1px; margin-left: 1px; margin-right: 3px;" align="center" valign="top" width="100%">
<div id="body-wrapper">
<table cellpadding="0" cellspacing="0">
<tbody><tr><td id="default-panel" align="left" valign="top">
<div class="market-watch">
<?
 $query = 'SELECT * FROM channels WHERE prm=14 AND pipe=0';
 if ($e) $e = mysql_query ($query,$i); $cnt=0;
 while ($ui = mysql_fetch_row ($e))
	{ 
	 $query = 'SELECT * FROM device WHERE idd='.$ui[2];
	 //echo $query;
	 if ($a = mysql_query ($query,$i))
	 if ($uy = mysql_fetch_row ($a))
	    $dev[$cnt]=$uy[20];
	 $chan[$cnt]=$ui[0]; $name[$cnt]=$dev[$cnt]; $prm[$cnt]=$ui[9];
	 $cnt++;
	}
 $max=$cnt-1;

 $today=getdate();
 if ($_GET["year"]=='') $ye=$today["year"];
 else $ye=$_GET["year"];
 if ($_GET["month"]=='') $mn=$today["mon"];
 else $mn=$_GET["month"];
 $x=0; $nn=1; $ts=$today["hours"]-3;
 if ($_GET["month"]=='') $tm=$dy=$today["mday"];
 else $tm=$dy=31;
 $qnt=12;
 for ($tn=0; $tn<$qnt; $tn++)
	{
	 $date[$tn]=sprintf ("%02d-%02d",$ye,$mn);
	 $dat[$tn]=sprintf ("%d-%02d-01 00:00:00",$ye,$mn);
	 $mn--;
	 if ($mn==0)
	    {
	     $mn=12; $ye--;
	    }
	 $tm=$mn; $cn=0;
	 include ("time.inc");
	 $dats[$tn]=$dat[$cn].','.$ye;
	}

 $query = 'SELECT * FROM prdata WHERE value<50000 AND type=4';
 if ($a = mysql_query ($query,$i))
 while ($uy = mysql_fetch_row ($a))
	{
	 $x=$qnt+1;
	 for ($tn=0; $tn<=$qnt; $tn++)
	     if ($uy[4]==$dat[$tn]) $x=$tn;
	 for ($t=0; $t<=$max; $t++)
	     if ($uy[8]==$chan[$t]) $data[$t][$x]=$uy[5];
      }
 $cn=0;
 $title='11';
 $mon=11;
 include ("highcharts/bars2.php");
?>
</td></tr>
</table>

</div>
</div>

