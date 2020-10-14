<?
 print '<table width=300px cellpadding=1 cellspacing=1 bgcolor=#ffffff align=center>
 <tr><td width=300 valign=top>
 <table width=300 bgcolor=#eeeeee valign=top cellpadding=1 cellspacing=1>
 <tr class="BlockHeaderLeftRight" style="height:18px"><td bgcolor="#1881b6" align=center>дата</td>';
 $query = 'SELECT * FROM channels WHERE device='.$id;
 //echo $query;
 if ($e) $e = mysql_query ($query,$i); $cnt=0;
 while ($ui = mysql_fetch_row ($e))
	{
	 print '<td bgcolor="#1881b6" align="center">'.$ui[15].'</td>';
	 $chan[$cnt]=$ui[0]; $names[$cnt]=$ui[1];
	 $cnt++;
	}
 print '</tr>';
 print '<tr>';
 for ($d=0;$d<$cnt;$d++)
	{
         $query = 'SELECT * FROM prdata WHERE type=0 AND channel='.$chan[$d];
         if ($a = mysql_query ($query,$i))
         if ($uy = mysql_fetch_row ($a))
	    {
    	     if ($d==0) print '<td bgcolor="#1881b6" align="center">'.$uy[4].'</td>';
	     print '<td bgcolor="#1881b6" align="center">'.$uy[5].'</td>';
	    }
	}
 print '</tr>';
 print '</table>';
 print '</td></tr></table>';
?>
