<link rel="stylesheet" type="text/css" href="files/AeroWindow-min.css">
<link rel="stylesheet" type="text/css" href="files/english.css">
<link rel="stylesheet" type="text/css" href="files/site.css">
<?php
 $query = 'SELECT * FROM device';
 $e = mysql_query ($query,$i);
 if ($e) $ui = mysql_fetch_row ($e);
 while ($ui)
    {
     $x=$ui[22]; $y=$ui[23];
     if ($x==0 && $y==0) $y=190;

     print '
	    <style type="text/css"> 
	   #rightcol'.$ui[0].' {
	    position: absolute;
	    left: '.$x.'px;
	    top: '.$y.'px;
	    width: 30px; }
	   #inf'.$ui[0].' {
	    position: absolute;
	    left: 0px;
	    top: 50px;
	    width: 350px;
	    height: 200px; 
	    visibility:hidden;
	    z-index: 10;
            border-width: 2px;  border-style: dashed;  border-color: #5d6d2f;
	    }
	</style>
	';

     if ($ui[15]==1 || $ui[15]==2) print '<div id="rightcol'.$ui[0].'" Onmouseout="document.getElementById(\'inf'.$ui[0].'\').style.visibility=\'hidden\'" Onmouseover="document.getElementById(\'inf'.$ui[0].'\').style.visibility=\'visible\'"><a href="index.php?sel=device&id='.$ui[0].'"><img border=0 src="files/sun.jpg"></a></div>';
     else print '<div id="rightcol'.$ui[0].'" Onmouseout="document.getElementById(\'inf'.$ui[0].'\').style.visibility=\'hidden\'" Onmouseover="document.getElementById(\'inf'.$ui[0].'\').style.visibility=\'visible\'"><a href="index.php?sel=device&id='.$ui[0].'"><img border=0 src="files/sun2.jpg"></a></div>';
     $ui = mysql_fetch_row ($e);
    }
?>
<td align="left" valign="top" width="800">
<table id="Table1" valign="top" border="0" cellpadding="0" cellspacing="0" width="800">
	<tbody><tr>
	<td valign="top">
	    <img usemap="#menu" border=0 src="files/map.jpg">
	    <map name="menu">
	    <?php
		 $query = 'SELECT * FROM device';
		 $e2 = mysql_query ($query,$i);
		 if ($e2) $ui2 = mysql_fetch_row ($e2);
		 while ($ui2)
		    {
		     $x=$ui2[22]; $y=$ui2[23]; $id=$ui2[1];
		     //echo $x.','.$y.'<br>';
		     print '<div id=inf'.$ui2[0].' style="position:absolute;top:30;left:150;width:640;height:210;margin-left:5;padding-left:5;visibility:hidden;background-color: #E8F0F5;">';
		     include ("channel_mini.php");
		     print '</div>';
		     $ui2 = mysql_fetch_row ($e2);
		    }
	    ?>
	    </map>
	</td></tr>
</table>
</td>

<td style="padding-right: 3px; padding-left: 1px; margin-left: 1px; margin-right: 3px;" align="center" valign="top" width="100%">
<table border="0" cellpadding="0" cellspacing="1" class="table-header">
<tbody>
<tr class="BlockHeaderLeftRight">
<td align="center"><font color="white">S</font></td>
<td align="center"><font color="white">Узел учета</font></td>
<td align="center" width="120px"><font color="white">Дата связи</font></td>
<td align="center"><font color="white">P1</font></td>
<td align="center"><font color="white">P2</font></td>
<td align="center"><font color="white">P3</font></td>
<td align="center"><font color="white">P4</font></td>
<td align="center"><font color="white">P5</font></td>
<td align="center"><font color="white">P6</font></td>
<td align="center"><font color="white">P7</font></td>
<td align="center"><font color="white">P8</font></td>
</tr>
<tr>
<?php
 $cnt=0;
 $query = 'SELECT * FROM device';
 if ($u = mysql_query($query,$i)) 
 while ($uo = mysql_fetch_row ($u))
    {
     $dev[$cnt]=$uo[1];
     $dat[$cnt]='-';	 
     $p1[$cnt]=$p2[$cnt]=$p3[$cnt]=$p4[$cnt]=$p5[$cnt]=$p6[$cnt]=$p7[$cnt]=$p8[$cnt]=0;
     $cnt++;	 
    }
 $query = 'SELECT * FROM prdata WHERE type=0 AND value>0 AND value<100000';
 $y = mysql_query ($query,$i);
 if ($y) $uy = mysql_fetch_row ($y);
 while ($uy)
    {
     for ($pp=0;$pp<$cnt;$pp++)
     if ($dev[$pp]==$uy[1]) $device=$pp;
     //echo $device.' '.$dev[3];
     if ($uy[8]==4 && $uy[6]==0 && !$tpod[$device]) $p1[$device]=$uy[3].'C';
     if ($uy[8]==4 && $uy[6]==1 && !$tobr[$device]) $p2[$device]=$uy[3].'C';
     if ($uy[8]==11 && $uy[6]==0 && !$vpod[$device]) $p3[$device]=$uy[3];
     if ($uy[8]==11 && $uy[6]==1 && !$vobr[$device]) $p4[$device]=$uy[3];
     if ($uy[8]==13 && $uy[6]==0 && !$qpod[$device]) $p5[$device]=$uy[3];
     if ($uy[8]==13 && $uy[6]==1 && !$qobr[$device]) $p6[$device]=$uy[3];
     if ($uy[8]==13 && $uy[6]==2 && !$qpot[$device]) $p7[$device]=$uy[3];
     if ($uy[8]==12 && $uy[6]==5 && !$vgvs[$device]) $p8[$device]=$uy[3];
     if ($uy[8]==12 && $uy[6]==7 && !$vhvs[$device]) $p9[$device]=$uy[3];
     if ($uy[8]==16 && $uy[6]==2 && !$phvs[$device]) $p6[$device]=$uy[3];
     if ($uy[8]==12 && $uy[6]==26 && !$vhvsi[$device]) $p5[$device]=$uy[3];

     if ($uy[2]==14 && $uy[7]==0) $p1[$device]=$uy[5];
     if ($uy[2]==14 && $uy[7]==31) $p2[$device]=$uy[5];
     if ($uy[2]==14 && $uy[7]==32) $p3[$device]=$uy[5];
     if ($uy[2]==14 && $uy[7]==21) $p4[$device]=$uy[5];
     if ($uy[2]==14 && $uy[7]==10) $p5[$device]=$uy[5];
     if ($uy[2]==14 && $uy[7]==11) $p6[$device]=$uy[5];
     if ($uy[2]==14 && $uy[7]==13) $p7[$device]=$uy[5];
     if ($uy[2]==14 && $uy[7]==44) $p8[$device]=$uy[5];

     if ($dat[$device]=='-') $dat[$device]=substr($uy[2],0,16);
     $uy = mysql_fetch_row ($y);
    }	
 	 

 $query = 'SELECT * FROM device ORDER BY place';
 $u = mysql_query ($query,$i);
 if ($u) 
 while ($uo = mysql_fetch_row ($u))
    {
     $device=$cnt+1;
     for ($pp=0;$pp<$cnt;$pp++)
     if ($dev[$pp]==$uo[1]) $device=$pp;

     $query = 'SELECT * FROM objects WHERE id='.$uo[24];
     $e = mysql_query ($query,$i);
     if ($e) $ui = mysql_fetch_row ($e);

     print '<tr id="row'.$ui[0].'" bgcolor="#ffffff" Onmouseover="this.className=\'normalActive\'; cursor:pointer" Onmouseout="this.className=\'normal\'" class="normal">';
     if ($uo[11]==0) print '<td align="center"><img src="files/status2.gif"></td>';
     if ($uo[11]==1) print '<td align="center"><img src="files/status1.gif"></td>';
     if ($uo[11]==2) print '<td align="center"><img src="files/status3.gif"></td>';
     if ($uo[11]==3) print '<td align="center"><img src="files/status4.gif"></td>';
     print '<td align="left"><a href="index.php?sel=object&id='.$ui[0].'" style="text-decoration:none"><b>'.$uo[20].'</b></a></td>';
     print '<td align="center" class="NormalBlackText">'.$uo[16].'</td>';
     print '<td align="center" class="NormalBlackText">'.number_format($p1[$device],3).'</td>';
     print '<td align="center" class="NormalBlackText">'.$p2[$device].'</td>';
     print '<td align="center" class="NormalBlackText">'.$p3[$device].'</td>';
     print '<td align="center" class="NormalBlackText">'.number_format($p4[$device],3).'</td>';
     print '<td align="center" class="NormalBlackText">'.$p5[$device].'</td>';
     print '<td align="center" class="NormalBlackText">'.$p6[$device].'</td>';
     print '<td align="center" class="NormalBlackText">'.number_format($p7[$device],3).'</td>';
     print '<td align="center" class="NormalBlackText">'.$p8[$device].'</td>';
     print '</tr>';
    }
?>

</tr>
</tbody></table>
</td>
