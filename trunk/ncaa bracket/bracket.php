<?php

if($year == "")
	$year = date("Y");

require('./includes/bracket_vars.inc');  // need to initialize
require('./includes/class_def.php');
require('./includes/sajax/Sajax.php');
require('./includes/dbfunctions.php');

sajax_init();
sajax_export("saveBracketPosition");
sajax_handle_client_request();

?>

<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="./includes/bracket.css">

<script language="JavaScript">

<?php
	sajax_show_javascript();
?>


function do_saveBracketPosition_cb(data) 
{
	alert("Got here");
}

function do_saveBracketPosition(bp, teamId, year) 
{
	x_saveBracketPosition(bp, teamId, year, do_saveBracketPosition_cb);
}

function getElementValue(id)
{
   element = document.getElementById(id);
   if(element != null)
       return element.value;
   else
   {
       alert("Field " + id + " could not be found.");
       return "";
   }
}

function setElementValue(id, value)
{
   element = document.getElementById(id);
   if(element != null)
       element.value = value;
   else
       alert("Field " + id + " could not be found.");
}

function saveBP(bp, seed)
{
    var sRtn;
    var index;
    var name;
    var teamId;
    var id;
    var field;
    var label;
    var elTarget;
    
    elTarget = document.getElementById(bp);

  if (window.showModalDialog)
  {    
    // Open a popup dialog to help the user find a college quicker.
    sRtn = showModalDialog("teams.php","","center=yes;dialogWidth=450pt;dialogHeight=200pt");
  }
  else
   	sRtn = window.open('teams.php','','height=200,width=450,toolbar=no,directories=no,status=no, menubar=no,scrollbars=no,resizable=no ,modal=yes');

  if (sRtn!="")
  {
     index = sRtn.indexOf(":");
     index++;
     name = sRtn.substring(index, sRtn.length);
     index--;
     teamId = sRtn.substring(0, index);
     label = seed + " - " + name;
     elTarget.replaceAdjacentText("afterBegin", label);
     do_saveBP(bp, teamId, "");
   }
	else
	  alert(name + " already exists on the bracket.");
 }


</script>
</head>
<body>

<?php

/* Get DB Connection */
$link = connectToDB();

$results = getPositionSeeds();

for($index=1; $index<=64; $index++)
{
	$temp_bp = "bp_" . $index;
	$$temp_bp = $index;
	$temp_data = "data_$index";
	$data = ($results[$index] == null)? ("&nbsp;"):($results[$index]);
	$$temp_data = "Set #$data";
	$temp_onClick = "onClick_$index";
	$$temp_onClick = "$SAVE_BP_CLICK($index, $data)";
	$temp_onMouseOver = "onMouseOver_$index";
	$$temp_onMouseOver = $ACTIVE_MOUSE_OVER;
	$temp_onMouseOut = "onMouseOut_$index";
	$$temp_onMouseOut = $ACTIVE_MOUSE_OUT;
	$temp_class = "class_$index";
	$$temp_class = $DEFAULT_TEAM_CLASS;
}

for($index=65; $index<=127; $index++)
{
	$temp_bp = "bp_" . $index;
	$$temp_bp = $index;
	$temp_data = "data_$index";
	$$temp_data = ($results[$index] == null)? ("&nbsp;"):($results[$index]);
	$temp_onClick = "onClick_$index";
	$$temp_onClick = $NO_ON_CLICK;
	$temp_onMouseOver = "onMouseOver_$index";
	$$temp_onMouseOver = $NO_MOUSE_OVER;
	$temp_onMouseOut = "onMouseOut_$index";
	$$temp_onMouseOut = $NO_MOUSE_OUT;
	$temp_class = "class_$index";
	$$temp_class = $DEFAULT_TEAM_CLASS;
}

require('./includes/bracket_template.inc');
/* Closing connection */
closeDBConnection($link);
?>

</form>
</body>
</html>
