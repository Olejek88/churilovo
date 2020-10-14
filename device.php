<?php
 include("config/local.php");
 $i = mysql_connect ($mysql_host,$mysql_user,$mysql_password); $e=mysql_select_db ($mysql_db_name);
 $query = "set character_set_client='cp1251'"; mysql_query ($query,$i);
 $query = "set character_set_results='cp1251'"; mysql_query ($query,$i);
 $query = "set collation_connection='cp1251_general_ci'"; mysql_query ($query,$i);
?>
<html><head>
<meta http-equiv="content-type" content="text/html; charset=Windows-1251">
<link href="files/GulfBaseStyle.css" type="text/css" rel="stylesheet">
</head>
<body bottommargin="0" leftmargin="0" topmargin="0" rightmargin="0">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td width=400px valign="top">
<table style="border: 1px solid White; background-color: rgb(250, 252, 251); font-family: Rod; width: 100%; border-collapse: collapse;" align="Center" border="0" cellpadding="4" cellspacing="0">
<tbody>
<?php
 $query = 'SELECT * FROM device WHERE idd='.$_GET["id"];
 $a = mysql_query ($query,$i);
 if ($a) $uy = mysql_fetch_row ($a);
 if ($uy)
	{
	 print '<tr style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Название</td><td>'.$uy[20].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Тип</td><td>'.$uy[8].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Скорость обмена</td><td>'.$uy[6].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Интерфейс</td><td>'.$uy[4].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Серийный номер</td><td>'.$uy[9].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Объект установки</td><td>'.$uy[24].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Адрес</td><td>'.$uy[7].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Идентификатор</td><td>'.$uy[11].'</td></tr>';
	 print '<tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">';
	 if ($uy[12]==0) print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Статус</td><td>Нет связи</td></tr>';
	 if ($uy[12]==1) print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Статус</td><td>Есть связь</td></tr>';
	 if ($uy[12]>1) print '<td style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;">Статус</td><td>Не подключен</td></tr>';
	}
?>
</tbody></table>
</td>

<td width=1000px valign="top">
<table style="border: 1px solid White; background-color: rgb(250, 252, 251); font-family: Rod; width: 100%; border-collapse: collapse;" align="Center" border="0" cellpadding="4" cellspacing="0" style="valign:top">
<tbody><tr style="color: Black; background-color: rgb(229, 238, 244); font-family: Verdana; font-size: xx-small; font-weight: bold;" align="center">
<td>Параметр</td><td>Время чтения</td><td align="center">Текущее</td><td align="center">Дневное</td><td align="center">По месяцам</td></tr>
<?php
 $query = 'SELECT * FROM device WHERE idd='.$_GET["id"];
 $a = mysql_query ($query,$i);
 if ($a) $uy = mysql_fetch_row ($a);
 while ($uy)
	{
	 $query = 'SELECT * FROM channels WHERE device='.$uy[1];
	 $e = mysql_query ($query,$i);
	 if ($e) $ui = mysql_fetch_row ($e);
	 while ($ui)
		{
		 $current=$hour=$day=$month=$time=$time2=$time3='-'; $del=0;
		 $query = 'SELECT * FROM prdata WHERE device='.$uy[1].' AND channel='.$ui[0].' ORDER BY date DESC LIMIT 100';		 
		 $r = mysql_query ($query,$i);
		 if ($r) $uy2 = mysql_fetch_row ($r);
		 while ($uy2)
			{
			 if ($uy2[3]==0 && $current=='-') { $current=$uy2[5]; $time=$uy2[4]; }
			 if ($uy2[3]==1 && $hour=='-') { $hour=$uy2[5]; $time2=$uy2[4]; }
			 else { $hour2=$uy2[5]; if ($hour2!=0) $del=($hour-$hour2)*100/$hour2; else $del=0; }
			 if ($uy2[3]==2 && $day=='-') { $day=$uy2[5]; $time3=$uy2[4]; }
			 if ($uy2[3]==4 && $month=='-') { $month=$uy2[5]; $time4=$uy2[4]; }
			 $uy2 = mysql_fetch_row ($r);
			}

		 print '
		 <tr style="color: Black; background-color: White; font-family: Verdana; font-size: xx-small;">
		 <td><a target="_top" href="index.php?sel=channel&id='.$ui[0].'">'.$ui[1].' ('.$ui[0].') ['.$ui[15].']</a></td>
		 <td>'.$time.'</td>';

		 if ($current!='-') print '<td align="center">'.number_format($current,3).'</td>';
		 else print '<td align="center"></td>';
		 if ($day!='-') print '<td align="center">'.number_format($day,3).' ['.$time3.']</td>';
		 else print '<td align="center"></td>';
		 if ($month!='-') print '<td align="center">'.number_format($month,3).' ['.$time4.']</td>';
		 else print '<td align="center"></td>';
		 print '</tr>';
		 $ui = mysql_fetch_row ($e);
		}
	 $uy = mysql_fetch_row ($a);
	}
?>
</tbody></table>
</td>
<td width="500px">
</td>
</tr></table>
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tr>
<td width="550px">
<?php
 $query = 'SELECT * FROM device WHERE idd='.$_GET["id"];
 $y = mysql_query ($query,$i);
 if ($y) $uo = mysql_fetch_row ($y);

 print '<table width=560px cellpadding=1 cellspacing=1 bgcolor=#ffffff align=center>
 <tr><td width=560 valign=top>
 <table width=560 bgcolor=#eeeeee valign=top cellpadding=1 cellspacing=1>
 <tr class="BlockHeaderLeftRight" style="height:18px"><td bgcolor="#1881b6" align=center>дата</td>';

 $query = 'SELECT * FROM channels WHERE device='.$_GET["id"].' ORDER BY id';
// echo $query;
 if ($e) $e = mysql_query ($query,$i); $cnt=0;
 while ($ui = mysql_fetch_row ($e))
	{
	 print '<td bgcolor="#1881b6" align="center">'.$ui[15].'</td>';
	 $chan[$cnt]=$ui[0]; $name[$cnt]=$ui[1];
	 $cnt++;
	}
 print '</tr>';
 $max=$cnt;

 $today=getdate();
 if ($_GET["year"]=='') $ye=$today["year"];
 else $ye=$_GET["year"];
 if ($_GET["month"]=='') $mn=$today["mon"];
 else $mn=$_GET["month"];
 $x=0; $nn=1; $ts=$today["hours"];
 $tm=$dy=$today["mday"];

 for ($tn=1; $tn<=500; $tn++)
	{
	 //$date1=sprintf ("%d%02d%02d%02d0000",$ye,$mn,$tm,$ts);
	 $dats[$tn]=sprintf ("%d-%02d-%02d %02d:00:00",$ye,$mn,$tm,$ts);

         $x++;// $tm--;
	 if ($tm==1 && $ts==0)
		{
		 $mn--; $ts=24;
		 $dy=31;
		 if (!checkdate ($mn,31,$ye)) { $dy=30; }
		 if (!checkdate ($mn,30,$ye)) { $dy=29; }
		 if (!checkdate ($mn,29,$ye)) { $dy=28; }
		 $tm=$dy;
		}
 	 if ($ts==0) { $ts=24; $tm--; }
	 $ts--;
       }
// $query = 'SELECT * FROM data WHERE type=1 AND device='.$_GET["id"];

 $x=0;
// $query = 'SELECT * FROM hours WHERE type=9 AND device='.$_GET["id"].' ORDER BY date DESC,channel';
 $query = 'SELECT * FROM (SELECT * FROM hours WHERE type=9 AND device='.$_GET["id"].' ORDER BY date DESC,channel LIMIT 500) sub ORDER BY date ASC';

 if ($a = mysql_query ($query,$i))
 while ($uy = mysql_fetch_row ($a))
	{
	 //for ($tn=1; $tn<=500; $tn++)
	 //     if ($uy[2]==$dat[$tn]) $x=$tn;
	 for ($t=0; $t<$max; $t++)
	     if ($uy[8]==$chan[$t]) { $data2[$t][$x]=$uy[5]; $dats1[$x]=substr ($uy[4],0,16); $date1[$x]=substr ($uy[4],11,16); if ($t==2) $x++; }
      }

 for ($y=$x-1; $y>=0; $y--)
    {
     print '<tr class="BlockHeaderLeftRight">';
     print '<td bgcolor="#1881b6" align="center">'.$dats1[$y].'</td>';
     for ($t=0; $t<$max; $t++)
	print '<td class="simple">'.number_format($data2[$t][$y],3).'</td>';
     print '</tr>';
    }

print '</table></td>';
print '</td><td valign="top">';

print '<table width=1000 bgcolor=#eeeeee valign=top cellpadding=1 cellspacing=1>';
for ($t=0; $t<=$max; $t++)
{
     print '<tr><td class="simple">';
     for ($y=0; $y<=$x; $y++)	$data[$y]=$data2[$t][$y];

     $cnt=$x; $id=$t.'_1'; $title=$name=$names[$t];
     include ("highcharts/trend.php");
     print '</td></tr>';
}
print '</table>';

?>

</td>
</tr>
</table>
</body></html>