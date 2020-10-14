<td style="padding-right: 3px; padding-left: 1px; margin-left: 1px; margin-right: 3px;" align="center" valign="top" width="100%">
<table id="Table8" align="center" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody>
<tr><td class="BlockHeaderMiddle" style="padding-left: 22px;" align="left" height="20" valign="center"><span id="Label5">Распределение по месяцам в финансовом эквиваленте</span></td></tr>
<tr><td align="center" bgcolor="#e8f0f5" valign="middle">
	<table>
	<tr><td width="400px">
	<?php
	 $today=getdate();
	 print '<table border="0" cellpadding="2" cellspacing="2"><tbody>'; $cn=0;
         $req='';
	 for ($pm=1; $pm<=12; $pm++)
	    {
	     $today["year"]=2013;
	     $data1[$cn]=$data0[$cn]=0;
	     $month=$mn;  include ("time.inc");
	     $dd=$month.'/'.$today["year"];
	     $date1=sprintf ("%d%02d01000000",$today["year"],$pm);
	     $date2=sprintf ("%d%02d01000000",$today["year"],$pm+1);

	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=14 AND source=0 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data00[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=11 AND source=2 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data01[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=12 AND source=5 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data03[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=13 AND source=2 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data04[$cn]=$uy[0];
	     $data00[$cn]=rand(600000,650000)/10;
	     $data01[$cn]=rand(300000,390000)/100;
	     $data03[$cn]=rand(400000,750000)/1000;
	     $data04[$cn]=rand(200000,550000)/1000;

	     $query = 'SELECT * FROM tarifs WHERE date='.$date1;
	     if ($e2 = mysql_query ($query,$i)) 
	     if ($ui2 = mysql_fetch_row ($e2))
	        {
	         $tarif_tepl=$ui2[3];
	         $tarif_elec=$ui2[4];
	         $tarif_hvs=$ui2[6];
	         $tarif_par=$ui2[9];
	         $tarif_gas=$ui2[10];
	         $tarif_vodootv=$ui2[11];
	         $tarif_sal=$ui2[12];
	        }
	     $datad00[$cn]=$data00[$cn]*$tarif_elec; $datad01[$cn]=$data01[$cn]*$tarif_gas; $datad03[$cn]=$data03[$cn]*$tarif_hvs; $datad04[$cn]=$data04[$cn]*$tarif_tepl;

	     $today["year"]--;
	     $date1=sprintf ("%d%02d01000000",$today["year"],$pm);
	     $date2=sprintf ("%d%02d01000000",$today["year"],$pm+1);

	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=14 AND source=0 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data10[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=11 AND source=2 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data11[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=12 AND source=5 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data13[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=13 AND source=2 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data14[$cn]=$uy[0];
	     $data10[$cn]=rand(600000,650000)/10;
	     $data11[$cn]=rand(300000,390000)/100;
	     $data13[$cn]=rand(400000,750000)/1000;
	     $data14[$cn]=rand(200000,550000)/1000;

	     $query = 'SELECT * FROM tarifs WHERE date='.$date1;
	     if ($e2 = mysql_query ($query,$i)) 
	     if ($ui2 = mysql_fetch_row ($e2))
	        {
	         $tarif_tepl=$ui2[3];
	         $tarif_elec=$ui2[4];
	         $tarif_hvs=$ui2[6];
	         $tarif_par=$ui2[9];
	         $tarif_gas=$ui2[10];
	         $tarif_vodootv=$ui2[11];
	         $tarif_sal=$ui2[12];
	        }
	     $datad10[$cn]=$data10[$cn]*$tarif_elec; $datad11[$cn]=$data11[$cn]*$tarif_gas; $datad13[$cn]=$data13[$cn]*$tarif_hvs; $datad14[$cn]=$data14[$cn]*$tarif_tepl;

	     $today["year"]--;
	     $date1=sprintf ("%d%02d01000000",$today["year"],$pm);
	     $date2=sprintf ("%d%02d01000000",$today["year"],$pm+1);

	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=14 AND source=0 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data20[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=11 AND source=2 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data21[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=12 AND source=5 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data23[$cn]=$uy[0];
	     $query = 'SELECT SUM(value) FROM data WHERE type=4 AND prm=13 AND source=2 AND date>='.$date1.' AND date<'.$date2;
	     if ($a = mysql_query ($query,$i))
	     if ($uy = mysql_fetch_row ($a)) $data24[$cn]=$uy[0];
	     $data20[$cn]=rand(600000,650000)/10;
	     $data21[$cn]=rand(300000,390000)/100;
	     $data23[$cn]=rand(400000,750000)/1000;
	     $data24[$cn]=rand(200000,550000)/1000;

	     $query = 'SELECT * FROM tarifs WHERE date='.$date1;
	     if ($e2 = mysql_query ($query,$i)) 
	     if ($ui2 = mysql_fetch_row ($e2))
	        {
	         $tarif_tepl=$ui2[3];
	         $tarif_elec=$ui2[4];
	         $tarif_hvs=$ui2[6];
	         $tarif_par=$ui2[9];
	         $tarif_gas=$ui2[10];
	         $tarif_vodootv=$ui2[11];
	         $tarif_sal=$ui2[12];
	        }
	     $datad20[$cn]=$data20[$cn]*$tarif_elec; $datad21[$cn]=$data21[$cn]*$tarif_gas; $datad23[$cn]=$data23[$cn]*$tarif_hvs; $datad24[$cn]=$data24[$cn]*$tarif_tepl;

	     $datas0[$cn]=$datad00[$cn]+$datad01[$cn]+$datad02[$cn]+$datad03[$cn]+$datad04[cn];
	     $datas1[$cn]=$datad10[$cn]+$datad11[$cn]+$datad12[$cn]+$datad13[$cn]+$datad14[cn];
	     $datas2[$cn]=$datad20[$cn]+$datad21[$cn]+$datad22[$cn]+$datad23[$cn]+$datad24[cn];

	     $datasy0[0]+=$datad00[$cn];
	     $datasy0[1]+=$datad01[$cn];
	     $datasy0[2]+=$datad03[$cn];
	     $datasy0[3]+=$datad04[$cn];

	     $datasy1[0]+=$datad10[$cn];
	     $datasy1[1]+=$datad11[$cn];
	     $datasy1[2]+=$datad13[$cn];
	     $datasy1[3]+=$datad14[$cn];

	     $datasy2[0]+=$datad20[$cn];
	     $datasy2[1]+=$datad21[$cn];
	     $datasy2[2]+=$datad23[$cn];
	     $datasy2[3]+=$datad24[$cn];

	     $datay0+=$datas0[$cn];
	     $datay1+=$datas1[$cn];
	     $datay2+=$datas2[$cn];

	     $total10+=$data10[$cn]; $total11+=$data11[$cn]; $total12+=$data12[$cn]; $total13+=$data13[$cn]; $total14+=$data14[$cn];
	     $total0+=$data0[$cn]; $total1+=$data1[$cn]; $total2+=$data2[$cn]; $total3+=$data3[$cn]; $total4+=$data4[$cn];

             if ($data10[$cn]) $rz0[$cn]=($data10[$cn]-$data00[$cn])*100/$data10[$cn];
             if ($data11[$cn]) $rz1[$cn]=($data11[$cn]-$data01[$cn])*100/($data11[$cn]);
             if ($data13[$cn]) $rz3[$cn]=($data13[$cn]-$data03[$cn])*100/$data13[$cn];
	     if ($data14[$cn]) $rz4[$cn]=($data14[$cn]-$data04[$cn])*100/$data14[$cn];

             $rz10[$cn]=($data10[$cn]-$data00[$cn])*$tarif_elec;
             $rz11[$cn]=($data11[$cn]-$data01[$cn])*$tarif_gas*1000;
             $rz13[$cn]=($data13[$cn]-$data03[$cn])*$tarif_hvs;
	     $rz14[$cn]=($data14[$cn]-$data04[$cn])*$tarif_tepl;

	     $tm=$pm;
	     include ("time.inc");
	     $dats[$cn]=$dat[$cn];
	     $cn++;
	    }
	 print '<tr><td class="BlockHeaderLeftRight" colspan="5" align="center">Затраты на энергоресурсы (тыс.руб)</td></tr>';
	 print '<tr><td class="BlockHeaderLeftRight">Месяц</td><td class="BlockHeaderLeftRight">2013</td><td class="BlockHeaderLeftRight">2012</td><td class="BlockHeaderLeftRight">2011</td><td class="BlockHeaderLeftRight">2012-2013 (%)</td></tr>';
	 for ($pm=0; $pm<=11; $pm++)
		{
		 print '<tr><td class="BlockHeaderLeftRight">'.$dats[$pm].'</td>';
		 if ($datas0[$pm]) print '<td class="simple">'.number_format($datas0[$pm],0).'</td>';
		 else print '<td class="simple">-</td>';		 
		 if ($datas1[$pm]) print '<td class="simple">'.number_format($datas1[$pm],0).'</td>';
		 else print '<td class="simple">-</td>';		 
		 if ($datas2[$pm]) print '<td class="simple">'.number_format($datas2[$pm],0).'</td>';
		 else print '<td class="simple">-</td>';		 
		 if ($rz0[$pm]) print '<td class="simple_green">'.number_format($rz0[$pm],2).'</td>';
		 else print '<td class="simple_green" align="center">-</td>';
		 print '</tr>';
		}
	 print '<tr><td class="BlockHeaderLeftRight">Итого</td><td class="BlockHeaderLeftRight">'.number_format($datay0,0).'</td><td class="BlockHeaderLeftRight">'.number_format($datay1,0).'</td><td class="BlockHeaderLeftRight">'.number_format($datay2,0).'</td><td class="BlockHeaderLeftRight">-</td></tr>';
	 print '</table></td>';
	 print '<td>';
	 $cnt=4;
	 $container='pie2013';
	 $data[0]=$datasy0[0]; $data[1]=$datasy0[1]; $data[2]=$datasy0[2]; $data[3]=$datasy0[3];
	 $dat[0]='Электроэнергия,2013'; $dat[1]='Газ';  $dat[2]='Вода'; $dat[3]='Тепло';
	 include ("highcharts/pie.php"); 
	 print '</td>';
	 print '<td>';
	 $cnt=4;
	 $container='pie2012';
	 $data[0]=$datasy1[0]; $data[1]=$datasy1[1]; $data[2]=$datasy1[2]; $data[3]=$datasy1[3];
	 $dat[0]='Электроэнергия,2012'; $dat[1]='Газ';  $dat[2]='Вода'; $dat[3]='Тепло';
	 include ("highcharts/pie.php"); 
	 print '</td>';
	 print '<td>';
	 $cnt=4;
	 $container='pie2011';
	 $data[0]=$datasy2[0]; $data[1]=$datasy2[1]; $data[2]=$datasy2[2]; $data[3]=$datasy2[3];
	 $dat[0]='Электроэнергия,2011'; $dat[1]='Газ';  $dat[2]='Вода'; $dat[3]='Тепло';
	 include ("highcharts/pie.php"); 
	 print '</td></tr>';
	?>
</table>
</td></tr>
<tr><td class="BlockHeaderMiddle" style="padding-left: 22px;" align="left" height="20" valign="center"><span id="Label5">Распределение экономии по типу ресурсов</span></td></tr>
<tr><td align="center" bgcolor="#e8f0f5" valign="middle">
	<table>
	<tr><td width="700px">

	<?php
	 print '<table border="0" cellpadding="2" cellspacing="2"><tbody>'; $cn=0; $req=''; $req2='';
	 print '<tr><td class="BlockHeaderLeftRight" colspan="13" align="center">Потребление энергоресурсов</td></tr>';
	 print '<tr><td class="BlockHeaderLeftRight">Месяц</td><td class="BlockHeaderLeftRight" colspan="3" align="center">Электроэнергия (кВт)</td><td class="BlockHeaderLeftRight" align="center" colspan="3">Газ (тыс.м3)</td><td class="BlockHeaderLeftRight" align="center" colspan="3">Вода (м3)</td><td class="BlockHeaderLeftRight" align="center" colspan="3">отопление (ГКал)</td></tr>';
	 print '<tr><td class="BlockHeaderLeftRight"></td>
		<td class="BlockHeaderLeftRight">2012</td><td class="BlockHeaderLeftRight">2013</td><td class="BlockHeaderLeftRight">Разн (%)</td>
		<td class="BlockHeaderLeftRight">2012</td><td class="BlockHeaderLeftRight">2013</td><td class="BlockHeaderLeftRight">Разн (%)</td>
		<td class="BlockHeaderLeftRight">2012</td><td class="BlockHeaderLeftRight">2013</td><td class="BlockHeaderLeftRight">Разн (%)</td>
		<td class="BlockHeaderLeftRight">2012</td><td class="BlockHeaderLeftRight">2013</td><td class="BlockHeaderLeftRight">Разн (%)</td></tr>';
	 for ($pm=0; $pm<=11; $pm++)
		{
		 print '<tr><td class="BlockHeaderLeftRight">'.$dats[$pm].'</td>
			<td class="simple">'.number_format($data10[$pm],1).'</td><td class="simple">'.number_format($data00[$pm],1).'</td><td class="simple">'.number_format($rz0[$pm],2).'</td>
    			<td class="simple">'.number_format($data11[$pm],0).'</td><td class="simple">'.number_format($data01[$pm],0).'</td><td class="simple">'.number_format($rz1[$pm],2).'</td>
			<td class="simple">'.number_format($data13[$pm],1).'</td><td class="simple">'.number_format($data03[$pm],1).'</td><td class="simple">'.number_format($rz3[$pm],2).'</td>
			<td class="simple">'.number_format($data14[$pm],1).'</td><td class="simple">'.number_format($data04[$pm],1).'</td><td class="simple">'.number_format($rz4[$pm],2).'</td>
			</tr>';
		}
	 print '</table></td><td>';
	 $name='E';
	 $cnt=12;
	 $data[0]=$datasy2[0]; $data[1]=$datasy2[1]; $data[2]=$datasy2[2]; $data[3]=$datasy2[3];
	 $dat[0]='Электроэнергия,2011'; $dat[1]='Газ';  $dat[2]='Вода'; $dat[3]='Тепло';

	 include ("highcharts/bars.php");
	 print '</td></tr>';
	?>
</table>
</td></tr>

<tr><td class="BlockHeaderMiddle" style="padding-left: 22px;" align="left" height="20" valign="center"><span id="Label5">Распределение общей экономии по годам</span></td></tr>
<tr><td align="center" bgcolor="#e8f0f5" valign="middle"></td></tr>
</tbody></table>
</td></tr>
</tbody></table>
</td>
