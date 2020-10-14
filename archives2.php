<link rel="stylesheet" type="text/css" href="files/site.css">
<td style="padding-right: 3px; padding-left: 1px; margin-left: 1px; margin-right: 3px;" align="center" valign="top" width="100%">
<div id="body-wrapper">
<table cellpadding="0" cellspacing="0">
<tbody><tr><td id="default-panel" align="left" valign="top">
<div class="market-watch">
<table style="margin-top: 0pt;" id="MarketDG" class="table-content" cellpadding="0" cellspacing="0">
<tbody><tr style="width: 1751px; background-color: rgb(238, 238, 238);">
<td style="width: 50px;" class="small">Канал</td>
<?
 $query = 'SELECT * FROM channels WHERE opr=1';
 if ($e) $e = mysql_query ($query,$i); $cnt=0;
 while ($ui = mysql_fetch_row ($e))
	{ 
	 $query = 'SELECT * FROM device WHERE idd='.$ui[2];
	 //echo $query;
	 if ($a = mysql_query ($query,$i))
	 if ($uy = mysql_fetch_row ($a))
	    $dev[$cnt]=$uy[20];
	 $chan[$cnt]=$ui[0]; $name[$cnt]=$ui[1].'/'.$dev[$cnt]; $prm[$cnt]=$ui[9];
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
	     if ($uy[8]==$chan[$t]) $data[$t][$x]=number_format($uy[5],2);
      }
 for ($tn=$qnt-1; $tn>=0; $tn--)
    {
     print '<td style="width: 30px;" class="small">'.$dats[$tn].'</td>';
    }
 print '</tr>';
 $cn=0;
 for ($t=0; $t<=$max; $t++)
	{
	 //if ($cn%2) print '<tr class="alter-row"><td class="left"><a href="index.php?sel=report" title="'.$name[$t].'">'.$name[$t].' ('.$chan[$t].')</a></td>';
	 //else print '<tr class="row"><td class="left"><a href="index.php?sel=report" title="'.$name[$t].'">'.$name[$t].' ('.$chan[$t].')</a></td>';
	 if ($cn%2) print '<tr class="alter-row"><td class="left" style="white-space:nowrap"><a href="index.php?sel=report" title="'.$name[$t].'">'.$name[$t].'('.$chan[$t].')</a></td>';
	 else print '<tr class="row"><td class="left"><a href="index.php?sel=report" title="'.$name[$t].'">'.$name[$t].'('.$chan[$t].')</a></td>';
	 for ($tn=$qnt; $tn>=0; $tn--)
		{
	         if ($data[$t][$tn]) { print '<td class="right" style="background-color:lightgreen">'.$data[$t][$tn].'</td>'; $es++; }
	         else { print '<td class="right" style="background-color:gray"></td>'; $no++; }
     		}
	 print '</tr>';
	 $cn++;
	}
print '<tr style="width: 1751px; background-color: rgb(238, 238, 238);"><td colspan="'.($cnt+1).'" class="small" style="align:left">total '.$es.'/'.($es+$no).'['.number_format($es*100/($es+$no),2).'%]</td></tr>';
?>
</table>
</td></tr>
</table>

</div>
</div>
</div>
