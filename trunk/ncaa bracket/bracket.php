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

?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<html>
<head>
<title>NCAA Bracket</title>
<link rel="stylesheet" type="text/css" href="./includes/bracket.css">
<style type="text/css">
.yui-overlay { position: absolute; top: 0; left: 0; border: 1px solid #000; background-color: #fff; padding: 4px; margin: 10px; width: 450px; }
.yui-overlay .hd { background: #ddd; padding: 3px; }
.yui-overlay .bd { padding: 3px; height: 300px; overflow: auto; }
</style>

<script type="text/javascript" src="/js/yui/yahoo-dom-event.js"></script>
<script type="text/javascript" src="/js/yui/container.js"></script>

<script type="text/javascript">
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

function saveBP2(bp, seed)
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
   	sRtn = window.open('teams.php','','height=200,width=450,toolbar=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no,modal=yes');

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

var currentBP;
function saveBP(bp, seed) {
  currentBP = bp;
  teamsOverlay.setHeader('Choose:');
  if (32 >= bp) {
    teamsOverlay.cfg.setProperty('context', ['bp_' + bp, 'tl', 'tr']);
  } else {
    teamsOverlay.cfg.setProperty('context', ['bp_' + bp, 'tr', 'tl']);
  }
  teamsOverlay.cfg.setProperty('visible', true);
}

var teamsOverlay;
YAHOO.util.Event.addListener(window, 'load', function() {
  teamsOverlay = new YAHOO.widget.Overlay('teamsOverlay', { visible: false });
  teamsOverlay.render();

  YAHOO.util.Event.addListener('teamsOverlay', 'click', teamsOverlay.hide, teamsOverlay, true);
  
  // wire up all the teams in the list
  var teams = YAHOO.util.Dom.getElementsByClassName('teamLink', 'a');
  for (var i = 0, len = teams.length; i < len; i++) {
    teams[i].onclick = function() {
      this.parentNode.removeChild(this);
      document.getElementById( 'bp_' + currentBP ).innerHTML = this.innerHTML;
      teamsOverlay.cfg.setProperty('visible', false);
      return false;
    }
  }
});

</script>
</head>
<body>

<?php

/* Get DB Connection */
$link = connectToDB();

$teamsArray = getTeamsByAlpha();
$results = getPositionSeeds();

for($index=1; $index<=64; $index++)
{
	${"bp_".$index} = "bp_".$index;
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
	${"bp_".$index} = "bp_".$index;
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
<div id="teamsOverlay" style="visibility:hidden">
  <div class="hd"></div>
  <div class="bd">
  <?php
  $start = ""; 
  foreach ($teamsArray as $letter => $teams) {
    if ($letter != $start):
      ?>
      <div id="<?php echo $letter ?>-teams">
      <h3><?php echo $letter ?></h3>
      <?php
    endif;
    
    if (null != $teams) {
      foreach ($teams as $team): 
        ?>
        <div><a class="teamLink" href="#"><?php echo $team->name; ?></a></div>
        <?php
      endforeach;
    }
    
    if ($letter != $start):
      ?>
      </div> <!-- end <?php echo $letter ?>-teams -->
      <?php
      $start = $letter;
    endif;
  }
  ?>
  </div>
</div>
</body>
</html>
