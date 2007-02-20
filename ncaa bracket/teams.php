<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML><HEAD><TITLE>IU Hoops.com - Teams</TITLE>
<META http-equiv=Content-Type content="text/html; charset=windows-1252">

<?php
require('./includes/class_def.php');
require('./includes/dbfunctions.php');

$link = connectToDB();

?>


<script language="JavaScript">

function setElementValue(id, value)
{

   element = document.getElementById(id);
   if(element != null)
       element.value = value;
   else
       alert("Field " + id + " could not be found.");
}


 function getSelection()
 {
	var sTeam;
	if ("TD" == event.srcElement.tagName)
	    if ("" != event.srcElement.innerText)
		  sTeam = event.srcElement.id + ":" + event.srcElement.innerText;
    setElementValue("ret", sTeam);
    window.close();
 }

</script>
<STYLE type=text/css>
TABLE
{

}


TH.header
{
	font: italic small-caps bold 14px/17px "arial black";
	color: white;
	background-color: red;
	text-align: center;
}

TH.subheader
{
	font: italic small-caps bold 5px/7px "arial black";
	color: red;
	background-color: #FFFFCC;
	BORDER-BOTTOM: black 2px double;
}


TD
{
	width: 150px;
	text-align: left;
	valign: bottom;
	font:9px "arial";
}

TD.teams
{
	width: 50px;
	text-align: left;
	valign: bottom;
	font:9px "arial";
}

TD.space
{
	font: 1px;
}

TD.odd
{
	BORDER-BOTTOM: black 1px solid
}

TD.oddChampion
{
	BORDER-BOTTOM: black 3px double;
	font: bold 10px "arial";
	text-align: center;
}

TD.championLabel
{
	text-align: center;
}

TD.evenLeft
{
	BORDER-RIGHT: black 1px solid;
	BORDER-BOTTOM: black 1px solid
}

TD.middleLeft
{
	BORDER-RIGHT: black 1px solid
}

TD.evenRight
{
	BORDER-LEFT: black 1px solid;
	BORDER-BOTTOM: black 1px solid;
}

TD.middleRight
{
	BORDER-LEFT: black 1px solid
}

</STYLE>
</HEAD>
<BODY OnUnload="window.returnValue = document.all.ret.value;" bgcolor="#FFFFFF">
<input type="hidden" name="ret">
<?php

  $teams = getTeamsByAlpha();

  closeDBConnection($link);
   ?>
<TABLE class="teams" cellspacing=0 id="bracket_table">
<TR class="teams">
<TH class="header" colspan="17">IUHOOPS.COM</TH>
</TR>
<TR class="teams">
<TH  class="subheader" colspan="17">&nbsp;</TH>
</TR>
<TR class="teams">
</TR>
<TR class="teams">
<?php

$index = 1;
foreach($teams as $key => $value)
{
	if($index > 13)
	{
		echo "</TR><TR class=\"teams\">";
		$index = 1;
	}

	if($value != null)
		echo "<TD class=\"teams\"><a href='#$key'>$key</a></TD>";
	else
		echo "<TD class=\"teams\">$key</TD>";

	$index++;

}

?>
</TR>
<TR class="teams"></TR>
<TR class="teams"></TR>
</table>
<table class="teams">

<?php
foreach($teams as $key => $value)
{
	echo "<TR class=\"teams\">";
	echo "<TABLE class=\"teams\">";
	echo "<TR><TD colspan=5 class=\"teams\">";
	echo "<a id=\"$key\" name==\"$key\">$key</a>";
	echo "</TD></TR><TR class=\"teams\"><TD class=\"teams\">";
	echo "<TABLE class=\"teams\"><TBODY  class=\"teams\" ID=\"teams\"ALIGN=CENTER ONCLICK=\"getSelection()\">";
	echo "<TR class=\"teams\"><TD class=\"teams\">";

	$index = 1;
	if($value != null)
	{
		foreach($value as $team)
		{
			if(($index % 10) == 0)
				echo "</TBODY></TABLE></TD><TD class=\"teams\"><TABLE class=\"teams\"><TBODY class=\"teams\" ID=\"teams\"ALIGN=CENTER ONCLICK=\"getSelection()\">";

			echo "<TR class=\"teams\"><TD class=\"teams\" id=\"$team->id\">$team->name</TD></TR>";
			$index++;
		}
	}
	echo "</TBODY></TABLE></TD></TR></TABLE>";
	echo "</TBODY>";
	echo "</TABLE>";
	echo "</TR>";
}

?>

</table>
</body>
</html>