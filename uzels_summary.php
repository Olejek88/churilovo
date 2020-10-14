<link href="files/BaseStyle.css" type="text/css" rel="stylesheet">
<link href="files/pop_style.css" type="text/css" rel="stylesheet">
<link href="files/StockMarkets.css" type="text/css" rel="stylesheet">
<?php                                                                             
 include("config/local.php");
 $i = mysql_connect ($mysql_host,$mysql_user,$mysql_password); $e=mysql_select_db ($mysql_db_name);
 $query = "set character_set_client='cp1251'"; mysql_query ($query,$i);
 $query = "set character_set_results='cp1251'"; mysql_query ($query,$i);
 $query = "set collation_connection='cp1251_general_ci'"; mysql_query ($query,$i);

 $query = 'SELECT * FROM uzels WHERE id='.$_GET["id"];
 $e = mysql_query ($query,$i);
 if ($e) $ui = mysql_fetch_row ($e);
 if ($ui) { $name=$ui[1]; $id=$ui[0]; $ecm1=$ui[4]; $ecm2=$ui[9]; $device=$ui[5]; $mnem=$ui[3]; }
 $query = 'SELECT COUNT(id) FROM channels WHERE device='.$ui[5];
 $e = mysql_query ($query,$i);
 if ($e) $ui = mysql_fetch_row ($e);
 if ($ui) { $cntchan=$ui[0]; }
 $query = 'SELECT * FROM ecm WHERE id='.$ecm1.' OR id='.$ecm2;
 $e = mysql_query ($query,$i);
 if ($e) $ui = mysql_fetch_row ($e);
 while ($ui) { $esm.=$ui[1].' | '; $esmdesc.=$ui[2].' | '; $ecm11=$ui[3]; $ecm22=$ui[4]; $ecm33=$ui[5]; $ecm44=$ui[6]; $ecm55=$ui[7]; $ui = mysql_fetch_row ($e); }
 $query = 'SELECT * FROM devices WHERE type=11 AND object='.$id;
 $e = mysql_query ($query,$i);
 if ($e) $ui = mysql_fetch_row ($e);
 while ($ui) { $dev.=$ui[1].' | '; $ui = mysql_fetch_row ($e); }
 $query = 'SELECT COUNT(id) FROM devices WHERE type!=11 AND object='.$id;
 $e = mysql_query ($query,$i);
 if ($e) $ui = mysql_fetch_row ($e);
 while ($ui) { $cntprib.=$ui[0]; $ui = mysql_fetch_row ($e); }

?>

<table id="Table20" align="center" border="0" cellpadding="2" cellspacing="0" width="100%" name="ProfileFrame">
<tbody><tr>
<td colspan="1" width="50%"><a href="" class="TitleLink" target="_top">Технический анализ</a>&nbsp;| <a href="" class="TitleLink" target="_top">Экономический анализ</a></td>
<td rowspan="3" align="center" valign="middle" width="50%"></td></tr>

<tr>
<td width="50%"><span id="ProfileSummeryUC1_lblName" style="font-family:Verdana;font-size:X-Small;font-weight:bold;"><?php print $name; ?></span>&nbsp;
<a id="ProfileSummeryUC1_FundHL" href="index.php?sel=channels&id=<?php print $id; ?>" target="_top"> Каналы измерения (<?php print $cntchan; ?>)</a></td>
</tr>
<tr>
<td width="70%">
<table id="Table244" align="center" border="0" cellpadding="3" cellspacing="1" width="100%">
<tbody><tr>
<td class="bluetext" align="left" nowrap="nowrap" width="40%">ЭСМ</td>
<td align="left"><a id="ProfileSummeryUC1_StockMarket" title="Company Profiles List " href="" target="_parent"><?php print $esm; ?></a><span id="ProfileSummeryUC1_lblStockMarket" class="BlackText"></span></td>
</tr>
<tr>
<td class="bluetext" align="left" nowrap="nowrap" valign="top">Контроллеры учета</td>
<td align="left"><a id="ProfileSummeryUC1_Sector" title="" href="#"><?php print $dev; ?></a></td>
</tr>
<tr>
<td class="bluetext" align="left" nowrap="nowrap">Приборы и датчики</td>
<td align="left"><a id="ProfileSummeryUC1_MarketCapacity" href="#">Устройства (<?php print $cntprib; ?>)</a></td>
</tr>                                                                                                                                                                                                           
</tbody></table>
</td></tr>

<tr><td colspan="2" align="center"><hr color="#829ec5" size="1" width="98%"></td></tr>
<tr>
<td colspan="3">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody><tr>
	<td class="BlueText" align="center" valign="top"><strong>Текущие значения</strong></td>
	<td class="BlueText" style="border-left: 1px solid rgb(130, 158, 197);" align="center" valign="top" width="33%"><strong>Накопительные итоги</strong></td>
	<td style="border-left: 1px solid rgb(130, 158, 197);" align="center" valign="top" width="33%"><span id="ProfileSummeryUC1_ResearchReportLbl" class="Bluetext" style="font-weight:bold;">Мнемосхема</span></td>
	</tr>
	<tr>
	<td class="BlueText" valign="top" width="33%"><div id="ProfileSummeryUC1_StockQuotePnl">
	<table id="Table9" border="0" cellpadding="3" cellspacing="1" width="100%">
	<tbody>
	<?php
	 $query = 'SELECT * FROM channels WHERE device='.$device;
	 $e2 = mysql_query ($query,$i); $cn=0;
	 if ($e2) $uo = mysql_fetch_row ($e2);
	 while ($uo)
		{
       		 if ($cn%2==1) print '<tr class="alternatecell"><td width="70%">';
		 else  print '<tr><td width="70%" class="bluetext">';
		 print '<a href="#"><span id="ProfileSummeryUC1_PriceLabel">'.$uo[1].'</span></a></td>
		 	<td align="right"><span id="ProfileSummeryUC1_lblPrice" class="BlackText">';
		 if ($uo[9]==2) print rand(0,1);	 
		 if ($uo[9]==4) print number_format(rand(2000,4000)/100,2);
		 if ($uo[9]==11) print number_format(rand(1000,2000)/10,2);	 
		 if ($uo[9]==14) print number_format(rand(200,5000)/10,2);	 
		 if ($uo[9]==16) print number_format(rand(100,500)/1000,2);	 
		 print '</span></td></tr>';	 
		 $uo = mysql_fetch_row ($e2);
		}
	?>
	</tbody></table>						
	</div></td>
	<td class="BlueText" style="border-left: 1px solid rgb(130, 158, 197);" valign="top">
	<div id="ProfileSummeryUC1_FundamentalPnl">
	<table id="Table8" border="0" cellpadding="3" cellspacing="1" width="100%">
	<tbody>
	<?php
	 $query = 'SELECT * FROM channels WHERE (prm=11 OR prm=12 OR prm=14) AND device='.$device;
	 $e2 = mysql_query ($query,$i); $cn=0;
	 if ($e2) $uo = mysql_fetch_row ($e2);
	 while ($uo)
		{
       		 if ($cn%2==1) print '<tr class="alternatecell"><td width="70%">';
		 else  print '<tr><td width="70%" class="bluetext">';
		 print '<a href="#"><span id="ProfileSummeryUC1_PriceLabel">'.$uo[1].'</span></a></td>
		 	<td align="right"><span id="ProfileSummeryUC1_lblPrice" class="BlackText">';
		 if ($uo[9]==11) $t[$cn]=number_format(rand(1000000,2000000)/10,2);
		 if ($uo[9]==14) $t[$cn]=number_format(rand(200000,500000)/10,2);
		 if ($uo[9]==12) $t[$cn]=number_format(rand(300000,500000)/1000,2);
		 print $t[$cn]; 
		 print '</span></td></tr>';	 
		 $uo = mysql_fetch_row ($e2);
		}
	?>
	</tbody></table>
	</div></td>

	<td class="alternatecell" style="border-left: 1px solid rgb(130, 158, 197);" valign="top" width="33%"><div id="ProfileSummeryUC1_Panel1">
	<table id="Table2" border="0" cellpadding="3" cellspacing="1" height="100%" width="100%">
	<tbody><tr bgcolor="#fafcfb"><td class="BlueText" style="padding-bottom: 15px;" colspan="2" align="center" bgcolor="#fafcfb"></td></tr>
	<tr>
	<td class="BlueText" style="padding-bottom: 15px;" colspan="2" align="left" height="100%">
	<?php
	 //if ($mnem) print '<img src="'.$mnem.'" width="350px">';
	 include ("uzels_eco.php");
	?>
	</td>
	</tr></tbody></table>
	</div></td>
	</tr></tbody></table>
	</td>
	</tr>
	<tr>
	<td colspan="2" align="center"><div id="ProfileSummeryUC1_HRPnl">
	<hr color="#829ec5" size="1" width="98%">			
	</div></td>
	</tr>
	<tr>
	<td align="center" valign="top">
	<table id="Table7" border="0" cellpadding="3" cellspacing="0" width="100%"><tbody>
	<tr><td style="padding-bottom: 15px;" align="center"><span id="ProfileSummeryUC1_lblOverviewLabel" class="Bluetext" style="font-weight:bold;">Экономический анализ</span></td></tr>
	</tbody></table>

	<table id="Table6" border="0" cellpadding="3" cellspacing="0" width="100%">
	<tbody><tr id="ProfileSummeryUC1_trEstDate" style="display: block;">
	<td class="bluetext" align="right" nowrap="nowrap" width="50%">Дата монтажа/запуска:</td>
	<td><span id="ProfileSummeryUC1_lblEstDate" class="blacktext">18/06/2011</span></td></tr>

	<tr id="ProfileSummeryUC1_trPaidUp" style="display: block;">
	<td class="bluetext" align="right" nowrap="nowrap"><span id="ProfileSummeryUC1_lblPaidUpLabel">Затраты на ЭСМ:</span></td>
	<td><span id="ProfileSummeryUC1_lblPaidUp" class="blacktext"><?php print $ecm22; ?> тыс.руб</span></td></tr>

	<tr id="ProfileSummeryUC1_trBranches" style="display: block;">
	<td class="bluetext" align="right" nowrap="nowrap" valign="top">Описание ЭСМ:</td>
	<td><span id="ProfileSummeryUC1_lblBranches" class="blacktext"><p align="justify"><?php print $esmdesc; ?> </p></span></td></tr>

				<tr id="ProfileSummeryUC1_trNoEmp" style="display: block;">
	<td class="bluetext" align="right" nowrap="nowrap">No. of Employees:</td>
	<td><span id="ProfileSummeryUC1_lblNoEmp" class="blacktext">4768</span></td>
</tr>

	<tr><td style="padding-top: 10px;" colspan="2" valign="top"><span id="ProfileSummeryUC1_Label3" class="bluetext"> Экономия по мероприятию</span>
	<table id="ProfileSummeryUC1_OwnershipGrd" style="background-color: rgb(250, 252, 251); border-color: White; border-width: 1px; border-style: solid; font-family: Rod; width: 100%; border-collapse: collapse;" align="Center" border="0" cellpadding="4" cellspacing="0">
	<tbody>
	<tr class="blacktext" style="font-size: xx-small;"><td><a href="index.php?sel=ecm&id=<?php print $ecm1; ?>">Затраты на внедрение (тыс. руб.):</a></td><td><?php print $ecm22; ?></td></tr>
	<tr class="alternatecell" style="font-size: xx-small;"><td><a href="index.php?sel=ecm&id=<?php print $ecm1; ?>">Срок окупаемости недисконтир. (мес.):</a></td><td><?php print $ecm33; ?></td></tr>
	<tr class="blacktext" style="font-size: xx-small;"><td><a href="index.php?sel=ecm&id=<?php print $ecm1; ?>">Годовой экономический эффект (тыс. руб.):</a></td><td><?php print $ecm44; ?></td></tr>
	<tr class="alternatecell" style="font-size: xx-small;"><td><a href="index.php?sel=ecm&id=<?php print $ecm1; ?>">Норма доходности:</a></td><td><?php print $ecm55; ?>%</td></tr>
	</tbody></table></td>
	</tr>
	<tr id="ProfileSummeryUC1_trActivites" style="display: block;">
	<td style="padding-top: 10px;" colspan="2" valign="top"><span id="ProfileSummeryUC1_Label8" class="bluetext">Вид достигаемой экономии</span><br>
	<span id="ProfileSummeryUC1_lblOverview" class="BlackText" style="font-size:XX-Small;"><?php print $ecm11; ?></span></td>
</tr>

			</tbody></table>
		</td>
		<td style="border-left: 1px solid rgb(130, 158, 197);" align="center" height="20" valign="top"><div id="ProfileSummeryUC1_SubsidiaryPnl" style="text-align:right;">
	
				<table border="0" cellpadding="3" cellspacing="0" width="100%">
					<tbody><tr>
						<td style="padding-bottom: 15px;" align="center">
							<span id="ProfileSummeryUC1_Label1" class="Bluetext" style="font-weight:bold;">Сравнение потребления электроэнергии с другими точками учета</span></td>
					</tr>
					<tr>
						<td>
							<table id="ProfileSummeryUC1_SubsidiaryGrd" style="background-color: rgb(250, 252, 251); border-color: White; border-width: 1px; border-style: solid; font-family: Rod; width: 100%; border-collapse: collapse;" align="Center" border="0" cellpadding="4" cellspacing="0">
		<tbody><tr class="BlueText">
			<td>Company</td>
		</tr><tr class="alternatecell" style="font-size: xx-small;">
			<td>Ithraa Al Riyad Real Estate Co.</td>
		</tr><tr class="blacktext" style="font-size: xx-small;">
			<td>Riyad Capital</td>
		</tr><tr class="alternatecell" style="font-size: xx-small;">
			<td>Ajel Financial Consultancy Co.</td>
		</tr><tr class="blacktext" style="font-size: xx-small;">
			<td>Saudi Travellers Cheque Co.</td>
		</tr><tr class="alternatecell" style="font-size: xx-small;">
			<td>Royal Sun Alliance Insurance (Middle East)</td>
		</tr><tr class="blacktext" style="font-size: xx-small;">
			<td>Alalamiya Cooperative Insurance Co.</td>
		</tr>
	</tbody></table></td>
					</tr>
				</tbody></table>
	<img src="charts/pieplot.php">
	</div></td>
	</tr>
	<tr>
		<td colspan="2" align="center"></td>
	</tr>
	<tr>
		<td colspan="2" align="center">
			<hr color="#829ec5" size="1" width="100%">
		</td>
	</tr>
	<tr>
		<td style="padding-bottom: 15px;" align="center" width="50%"><span id="ProfileSummeryUC1_Label29" class="Bluetext" style="font-weight:bold;">Corporate Announcements</span></td>
		<td style="padding-bottom: 15px; border-left: 1px solid rgb(130, 158, 197);" align="center"><span id="ProfileSummeryUC1_Label48" class="Bluetext" style="font-weight:bold;">Company News</span></td>
	</tr>
	<tr>
		<td align="center" valign="top" width="50%">
			<table id="Table1" border="0" cellpadding="1" cellspacing="1" width="100%">
				<tbody><tr>
					<td align="center">
<table rules="all" id="ProfileSummeryUC1_FinanicalCalendarGrid" style="background-color: rgb(250, 252, 251); border-color: rgb(240, 240, 240); border-width: 0px; border-style: solid; width: 96%; border-collapse: collapse;" border="0" cellpadding="3" cellspacing="0">
	<tbody><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>Net profit announced for the 1st Quarter of the year 2011, SAR 741 million, an increase of 8%.
</td><td align="right">09/04/2011</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>Cash dividend announced for the 2nd half of the year 2010, SR 0.70 per share. 
</td><td align="right">31/01/2011</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>Net profit announced for the year 2010, SAR 2.82 billion, a decrease of 6.8%.
</td><td align="right">12/01/2011</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>Net profit announced for the 9 months ending on 30/9/2010, SAR 2.06 billion, a decrease of 2.7%.
</td><td align="right">13/10/2010</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>Cash dividend announced for the 1st Half of the year 2010, SR 0.60 per share. 
</td><td align="right">10/07/2010</td>
	</tr>
</tbody></table></td>
				</tr>
				<tr>
					<td align="right"><a id="ProfileSummeryUC1_hlFCmore" href="http://www.gulfbase.com/site/interface/Membership/announcements.aspx?c=70" target="_top">more...</a></td>
				</tr>
			</tbody></table>
		</td>
		<td style="border-left: 1px solid rgb(130, 158, 197);" align="center" valign="top" width="50%">
			<table id="Table5" border="0" cellpadding="1" cellspacing="1" width="100%">
				<tbody><tr>
					<td align="center"><table rules="all" id="ProfileSummeryUC1_NewsGrid" style="background-color: rgb(250, 252, 251); border-color: rgb(240, 240, 240); border-width: 0px; border-style: solid; width: 96%; border-collapse: collapse;" border="0" cellpadding="3" cellspacing="0">
	<tbody><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>
										<a id="ProfileSummeryUC1_NewsGrid_ctl02_HyperLink1" href="http://www.gulfbase.com/site/interface/NewsArchiveDetails.aspx?n=173401" target="_top">Riyad bank net profit rises 8pc   </a>&nbsp;
										<span id="ProfileSummeryUC1_NewsGrid_ctl02_Label9" class="blacktext" style="font-size:7pt;font-style:italic;">(Gulf Daily News - 10/04/2011)</span>
									</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>
										<a id="ProfileSummeryUC1_NewsGrid_ctl03_HyperLink1" href="http://www.gulfbase.com/site/interface/NewsArchiveDetails.aspx?n=170181" target="_top">Fitch affirms Riyad Bank at 'A+'; outlook stable</a>&nbsp;
										<span id="ProfileSummeryUC1_NewsGrid_ctl03_Label9" class="blacktext" style="font-size:7pt;font-style:italic;">(AME Info - 09/03/2011)</span>
									</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>
										<a id="ProfileSummeryUC1_NewsGrid_ctl04_HyperLink1" href="http://www.gulfbase.com/site/interface/NewsArchiveDetails.aspx?n=153955" target="_top">Saudi investor cuts Riyad bank stake</a>&nbsp;
										<span id="ProfileSummeryUC1_NewsGrid_ctl04_Label9" class="blacktext" style="font-size:7pt;font-style:italic;">(Reuters - 11/10/2010)</span>
									</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>
										<a id="ProfileSummeryUC1_NewsGrid_ctl05_HyperLink1" href="http://www.gulfbase.com/site/interface/NewsArchiveDetails.aspx?n=143162" target="_top">Riyad Bank has more bad news on earnings</a>&nbsp;
										<span id="ProfileSummeryUC1_NewsGrid_ctl05_Label9" class="blacktext" style="font-size:7pt;font-style:italic;">(The National - 12/07/2010)</span>
									</td>
	</tr><tr style="color: Black; font-family: Verdana; font-size: xx-small;">
		<td>
										<a id="ProfileSummeryUC1_NewsGrid_ctl06_HyperLink1" href="http://www.gulfbase.com/site/interface/NewsArchiveDetails.aspx?n=143001" target="_top">Riyad Bank's Second-Quarter Profit Declines 16.5% to 766 Mln Riyals</a>&nbsp;
										<span id="ProfileSummeryUC1_NewsGrid_ctl06_Label9" class="blacktext" style="font-size:7pt;font-style:italic;">(Bloomberg - 10/07/2010)</span>
									</td>
	</tr>
</tbody></table></td>
				</tr>
				<tr>
					<td align="right"><a id="ProfileSummeryUC1_hlNmore" href="http://www.gulfbase.com/site/interface/newsarchive.aspx?source=ps&amp;q=RIBL" target="_top">more...</a></td>
				</tr>
			</tbody></table>
		</td>
	</tr>
	<tr>
		<td id="ProfileSummeryUC1_TD1" colspan="2" align="center">
			<hr color="#829ec5" size="1" width="98%">
		</td>

	</tr>
	<tr id="ProfileSummeryUC1_trNotesTitle" style="display: none;">
	<td colspan="2" align="center"><span id="ProfileSummeryUC1_Label28" class="Bluetext" style="font-weight:bold;">Notes</span></td>
</tr>

	<tr id="ProfileSummeryUC1_trNotesGrid" style="display: none;">
	<td colspan="2" align="center" width="100%">
			<hr color="#829ec5" size="1" width="98%">
		</td>
</tr>
	<tr>
		<td colspan="2" align="center" valign="top">
		</td>
	</tr>
</tbody></table>
</form>
<!-- developed for changing the container frame -->
<table id="sizetablepp">
<tbody><tr><td>&nbsp;</td></tr></tbody></table>
<script language="javascript">
var h=document.getElementById('sizetablepp').offsetTop;
function measure()
	{
	if (document.getElementById('theBody').scrollHeight>h)
		{
		h=h+(document.getElementById('theBody').scrollHeight-h)+1;
		parent.setFrameHeight(h);
		setTimeout("measure()", 10000);
		}
	}
measure();
</script>
</body></html>
