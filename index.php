<?php
 include("config/local.php");
 $i = mysql_connect ($mysql_host,$mysql_user,$mysql_password); $e=mysql_select_db ($mysql_db_name);
 $query = "set character_set_client='cp1251'"; mysql_query ($query,$i);
 $query = "set character_set_results='cp1251'"; mysql_query ($query,$i);
 $query = "set collation_connection='cp1251_general_ci'"; mysql_query ($query,$i);
 //echo $_POST['name'].' | '.$_POST['pass'];
 if($_POST['name'] && $_POST['pass'])
    {
     $query='SELECT id,pass,name,login FROM users WHERE login=\''.mysql_real_escape_string($_POST['name']).'\' LIMIT 1';
     # Р’С‹С‚Р°СЃРєРёРІР°РµРј РёР· Р‘Р” Р·Р°РїРёСЃСЊ, Сѓ РєРѕС‚РѕСЂРѕР№ Р»РѕРіРёРЅ СЂР°РІРЅСЏРµС‚СЊСЃСЏ РІРІРµРґРµРЅРЅРѕРјСѓ 
     $quer = mysql_query ($query,$i);
     $data = mysql_fetch_assoc($quer);
     echo $data['pass'].' | '.$_POST['pass'];
     if($data['pass'] == $_POST['pass'])
    	{
    	 $query='UPDATE users SET ip="'.$_SERVER['REMOTE_ADDR'].'" WHERE id="'.$data['id'].'"';
	 mysql_query ($query,$i);
         echo $query;
	 setcookie("id", $data['id'], time()+60*60*24*30); 
	 setcookie("name", $data['name'], time()+60*60*24*30);
	 print '<script> window.location.href="index.php" </script>';
	 $query = 'INSERT INTO registers SET who="'.$data['name'].'", ip="'.$_SERVER['REMOTE_ADDR'].'", what="user login success"';
	 mysql_query ($query,$i);
         echo $query;
	}
     else  
        {
    	 $query='INSERT INTO registers SET who="'.$data['name'].'", ip="'.$_SERVER['REMOTE_ADDR'].'", what="user login failed with pass '.$_POST["pass"].'"';
	 mysql_query ($query,$i);
         echo $query;
        }
    }
if ($_GET["action"]=='logout')
    {
     setcookie("id", "", time() - 3600);
     setcookie("name", "", time() - 3600);
   }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html><head>
<meta http-equiv="content-type" content="text/html; charset=Windows-1251">
<title>ОАО Агрокомплекс "Чурилово"</title>
<link href="/favicon.ico" rel="shortcut icon">
<meta content="JavaScript" name="vs_defaultClientScript">
<link href="files/BaseStyle.css" type="text/css" rel="stylesheet">
<link href="files/pop_style.css" type="text/css" rel="stylesheet">
<link href="files/StockMarkets.css" type="text/css" rel="stylesheet">

<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-base.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-topbar.css" />
<link rel="stylesheet" type="text/css" href="ddlevelsfiles/ddlevelsmenu-sidebar.css" />
<script type="text/javascript" src="ddlevelsfiles/ddlevelsmenu.js"></script>

</head>

<body bottommargin="0" leftmargin="0" topmargin="0" rightmargin="0">

<?php
if (!$_GET["print"])
print '<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr><td>
	<table border="0" cellpadding="0" cellspacing="0" width="100%"></table>
	</td></tr>
	<tr>
	<td class="LeftBorderThik" height="20">
	<table id="Table1" border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody><tr>
	<td bgcolor="#15873c">

	<div id="ddtopmenubar" class="mattblackmenu">

	<ul>
	<li><a href="index.php" rel="ddsubmenu1">Главная</a></li>
	<li><a href="index.php" rel="ddsubmenu2">Объекты учета</a></li>
	<li><a href="index.php" rel="ddsubmenu3">Технический анализ</a></li>
	<li><a href="index.php" rel="ddsubmenu4">Экономический анализ</a></li>
	<li><a href="index.php" rel="ddsubmenu5">Тренды</a></li>
	<li><a href="index.php" rel="ddsubmenu6">Предупреждения</a></li>
	<li><a href="index.php" rel="ddsubmenu7">Информация</a></li>
	</ul>
	</div>

	<script type="text/javascript">
	ddlevelsmenu.setup("ddtopmenubar", "topbar") //ddlevelsmenu.setup("mainmenuid", "topbar|sidebar")
	</script>

	<ul id="ddsubmenu1" class="ddsubmenustyle">
		<li><a href="index.php?sel=channels2">Узлы учета по ресурсам</a>
			<ul>
			  <li><a href="index.php?sel=channels2&type=3">Учет газа</a></li>
			  <li><a href="index.php?sel=channels2&type=2">Учет воды</a></li>
			  <li><a href="index.php?sel=channels2&type=1">Учет электроэнергии</a></li>
			  <li><a href="index.php?sel=channels2&type=4">Учет тепла</a></li>
			</ul>
		</li>
		<li><a href="index.php?sel=reports">Стандартные отчеты</a>
			<ul>
			  <li><a href="index.php">Отчет за очередной отчётный период</a></li>
			  <li><a href="index.php">Отчет об общей экономии</a></li>
			</ul>
		</li>
	</ul>

	<ul id="ddsubmenu2" class="ddsubmenustyle">
		<li><a href="index.php?sel=devices">Контроллеры учета</a></li>
		<li><a href="index.php?sel=channels2">Каналы измерения</a></li>
		<li><a href="index.php?sel=currents">Текущие значения</a></li>
	</ul>

	<ul id="ddsubmenu3" class="ddsubmenustyle">
		<li><a href="index.php?sel=devices">Технические данные</a>
			<ul>
			<li><a href="index.php?sel=details&name=edizm">Единицы измерения</a></li>
			<li><a href="index.php?sel=details&name=protocols">Протоколы обмена</a></li>
			<li><a href="index.php?sel=details&name=var2">Измеряемые параметры</a></li>
			<li><a href="index.php?sel=details&name=energy">Виды энергоресурсов</a></li>
			</ul>
		</li>
		<li><a href="index.php?sel=minmax">Анализ на минимумы и максимумы</a></li>
		<li><a href="index.php?sel=channels3">Накопительные итоги</a></li>
		<li><a href="index.php?sel=archives">Все архивы</a>
			<ul>
			<li><a href="index.php?sel=archives2">Часовые</a></li>
			<li><a href="index.php?sel=archives">По дням</a></li>
			</ul>
		</li>
	</ul>

	<ul id="ddsubmenu4" class="ddsubmenustyle">
		<li><a href="">Потребление по узлам</a></li>
		<li><a href="index.php?sel=eco&id=2">Цены на энергоресурсы</a></li>
		<li><a href="index.php?sel=eco&id=3">Расклад потребления по энергоресурсам</a></li>
		<li><a href="index.php?sel=eco&id=4">Расклад потребления энергоресурсов по времени</a></li>
		<li><a href="index.php?sel=analys">Стандартный отчет по экономическому эффекту</a></li>
	</ul>

	<ul id="ddsubmenu7" class="ddsubmenustyle">
		<li><a href="index.php?sel=about">О предприятии</a></li>
		<li><a href="index.php?sel=about2">О программе</a></li>
	</ul>
	<ul id="ddsubmenu6" class="ddsubmenustyle">
		<li><a href="index.php?sel=register">Работоспособность оборудования</a></li>
		<li><a href="index.php?sel=register2">Журнал событий</a></li>
	</ul>

	<ul id="ddsubmenu5" class="ddsubmenustyle">
		<li><a href="index.php?sel=trends&type=1">Часовые</a></li>
		<li><a href="index.php?sel=trends&type=2">Суточные</a></li>
		<li><a href="index.php?sel=trends&type=4">По месяцам</a></li>
		<li><a href="index.php?sel=trends&type=9">Интервальные</a></li>
	</ul>

	</td><td bgcolor="#15873c">
        <a href="'.$_SERVER['REQUEST_URI'].'&print=1"><img border="0" src="files/prin2.gif"></a></td></tr>
	<tr>
	<td bgcolor="#ffffff">
	<table border="0" cellpadding="0" cellspacing="0" width="100%">
	<tbody><tr>
	<td nowrap="nowrap" valign="middle"></td>
	<td height="5" valign="middle" width="100%"></td>
	</tr></tbody></table>
	</td></tr></tbody></table>
</td></tr></tbody></table>';
?>

<table cellpadding="0" cellspacing="0" width="100%" border=0>
<tbody><tr><td colspan="3">
<?php
 if ($_GET["menu"]=='' && $_GET["sel"]=='') include("main.php");
 else { $file=$_GET["sel"].'.php'; include $file; }
?>
</td></tr></table></td></tr>
<tr><td colspan="3">

<?php
if (!$_GET["print"]) print '
<tr>
<td colspan="3" align="center" valign="top">
<table border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td style="font-size: 8pt; font-family: Verdana;" align="center">
<hr size="1" color="#15873C">
<table id="Table1" border="0" cellpadding="0" cellspacing="0" width="100%">
<tbody><tr>
<td align="center"><img src="files/spacer_003.gif" height="31" width="137"></td>
<td style="font-size: 8pt; font-family: Verdana;" align="center"><a href="http://www.churilovo-agro.ru/">
Copyright &copy;</a> 2010-2014, churilovo-agro.
<br>
<a href="http://www.churilovo-agro.ru/" target="_blank">Сайт предприятия</a> | 
<a href="index.php?sel=about" target="_blank">Информация о системе</a>
<font size="1" face="Verdana">Интерфейс оптимизирован под разрешение в 1280 x 1024 или выше, браузер Firefox и небольшой размер шрифта</font></td>
<td align="center" nowrap="nowrap" valign="middle"><a href="" title="" target="_blank"><img style="border: medium none ;" src="files/churilovo-logo.png" alt="ЮУАИЗ"></a><img src="files/spacer_003.gif" height="31" width="50"></td>
</tr>
</tbody></table>
<br>
</td></tr>
</tbody></table>';
?>
</td>
</tr>
</tbody></table>

<div id="SummaryDiv" style="border: 1px solid black; display: none; width: 113px; position: absolute; height: 20px; background-color: rgb(255, 255, 204);" ms_positioning="FlowLayout">
<table border="0" cellpadding="2" height="38" width="111">
<tbody><tr><td class="blacktext" nowrap="nowrap">Current</td><td class="blackText" id="tdSummary1"></td></tr>
<tr><td class="blacktext" nowrap="nowrap">Net Change</td><td class="blackText" id="tdSummary2"></td></tr>
</tbody></table>
</div>
</body></html>
