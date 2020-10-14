<link rel="stylesheet" type="text/css" href="files/site.css">

<td style="padding-right: 3px; padding-left: 1px; margin-left: 1px; margin-right: 3px;" align="center" valign="top" width="100%">

<div id="body-wrapper">
<table cellpadding="0" cellspacing="0">
<tbody><tr><td id="default-panel" align="left" valign="top">

<table style="margin-top: 0pt;" id="MarketDG" class="table-content" cellpadding="0" cellspacing="0">
<tbody><tr style="width: 1051px; background-color: rgb(238, 238, 238);">
<td style="width: 120px;" class="small">Устройство</td>
<td style="width: 15px;" class="small">Опрос</td>
<td style="width: 115px;" class="small">Дата</td>
<td style="width: 115px;" class="small">Дата dev</td>
<td style="width: 70px;" class="small">ИД</td>
<td style="width: 20px;" class="small">Стс</td>
<td style="width: 120px;" class="small">Интерфейс [адрес]</td>
<td style="width: 43px;" class="small">Каналов</td>
<td style="width: 72px;" class="small">W/Q/V</td>
<td style="width: 72px;" class="small">Ws/Qs/Vs</td>
<td style="width: 72px;" class="small">U/V/Vт</td>
<td style="width: 72px;" class="small">I/M/Vт</td>
<td style="width: 72px;" class="small">F/T/T</td>
</tr>

<?php
 $query = 'SELECT * FROM device ORDER BY place';
 if ($e2 = mysql_query ($query,$i))
 while ($ui2 = mysql_fetch_row ($e2))
	{
 	 $device=$ui2[1];
	 $p1=$p2=$p3=$p4=$p5='';
	 if ($cn%2) print '<tr class="alter-row"><td class="left"><a href="index.php?sel=device&id='.$ui2[1].'" title="'.$ui2[1].'">'.$ui2[20].'</a></td>';
         else print '<tr class="row"><td class="left"><a href="index.php?sel=device&id='.$ui2[1].'" title="'.$ui2[11].'">'.$ui2[20].'</a></td>';

	 $query = 'SELECT * FROM threads WHERE thread='.$ui2[8];
	 if ($e4 = mysql_query ($query,$i))
	 if ($uo2 = mysql_fetch_row ($e4)) 
		$stat=$uo2[6];

	 $query = 'SELECT COUNT(id) FROM prdata WHERE device='.$device;
	 if ($e4 = mysql_query ($query,$i))
	 if ($uo2 = mysql_fetch_row ($e4)) 
		$count2=$uo2[0];

	 $query = 'SELECT * FROM prdata WHERE type=0 AND device='.$device;
	 if ($e4 = mysql_query ($query,$i))
	 while ($uo2 = mysql_fetch_row ($e4)) 
	    { 
    	     if ($uo2[2]==14 && $uo2[7]==0) $p1=$uo2[5];
    	     if ($uo2[2]==14 && $uo2[7]==21) $p2=$uo2[5];
    	     if ($uo2[2]==14 && $uo2[7]==13) $p3=$uo2[5];
    	     if ($uo2[2]==14 && $uo2[7]==21) $p4=$uo2[5];
    	     if ($uo2[2]==14 && $uo2[7]==10) $p5=$uo2[5];
    	     if ($uo2[2]==14 && $uo2[7]==44) $p6=$uo2[5];
	    }
	 $query = 'SELECT COUNT(id) FROM channels WHERE device='.$device;
	 if ($e4 = mysql_query ($query,$i))
	 if ($uo2 = mysql_fetch_row ($e4))
		$count=$uo2[0]; 

         if ($stat==0) print '<td align="center"><img src="files/status2.gif"></td>';
         if ($stat==1) print '<td align="center"><img src="files/status1.gif"></td>';
         if ($stat==2) print '<td align="center"><img src="files/status3.gif"></td>';
         if ($stat==3) print '<td align="center"><img src="files/status4.gif"></td>';

    	 print '<td class="left">'.$ui2[12].'</td>';
    	 print '<td class="left">'.$ui2[16].'</td>';
         print '<td class="left">'.$ui2[1].'</td>';

         if ($ui2[15]==0) print '<td align="center"><img src="files/status4.gif"></td>';
         else	print '<td align="center"><img src="files/status1.gif"></td>';

         if ($ui2[3]==2) print '<td class="left">RS-485 [/dev/ttyr0'.$ui2[5].']</td>';
         if ($ui2[3]==4) print '<td class="left">Ethernet ['.$ui2[9].']</td>';

         print '<td class="left">'.$count.' ['.$count2.']</td>';

         print '<td class="left">'.$p1.'</td>';
         print '<td class="left">'.$p2.'</td>';
         print '<td class="left">'.$p3.'</td>';
         print '<td class="left">'.$p4.'</td>';
         print '<td class="left">'.$p5.'</td>';

         print '</tr>'; $cn++;
	}
?>
</table>
</td></tr>
</table>
</div>
</div></div>
