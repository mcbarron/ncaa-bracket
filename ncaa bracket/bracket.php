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
<link rel="stylesheet" type="text/css" href="./includes/container.css">
<style type="text/css">
.yui-panel .hd { background: #ddd; padding: 3px; }
.yui-panel .bd { padding: 3px; height: 300px; overflow: auto; }
.yui-panel .ft { border-top: 1px solid #000; padding: 3px; }

.yui-panel .ft a { color: blue; text-decoration: none; }
.yui-panel .ft a:hover { color: green; }

#teamsPanel_c { position: aboslute; top: 0; left: 0 }
#teamList h3 { padding: 0; margin: 5px 0 7px 0; }
</style>

<script type="text/javascript" src="./js/yui/yahoo-dom-event.js"></script>
<script type="text/javascript" src="./js/yui/animation.js"></script>
<script type="text/javascript" src="./js/yui/dragdrop.js"></script>
<script type="text/javascript" src="./js/yui/container.js"></script>
<script type="text/javascript" src="./js/jquery.js"></script>
<script type="text/javascript" src="./js/bracket.js"></script>

<script type="text/javascript">
<?php
sajax_show_javascript();
?>
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
<div id="teamsPanel" style="visibility:hidden">
  <div class="hd"></div>
  <div id="teamList" class="bd" style="position: relative;">
    <div id="teamListAM" style="width: 45%; position: relative;">
      <?php
      $start = "";
      foreach (range('A','M') as $letter) {
        if ($letter != $start):
          ?>
          <div id="<?php echo $letter ?>-teams">
          <h3><?php echo $letter ?></h3>
          <?php
        endif;
        
        foreach ($teamsArray[$letter] as $team): 
          ?>
          <div><a class="teamLink" href="#"><?php echo $team->name; ?></a></div>
          <?php
        endforeach;

        if ($letter != $start):
          ?>
          </div> <!-- end <?php echo $letter ?>-teams -->
          <?php
          $start = $letter;
        endif;
      }
      ?>
    </div>
    <div id="teamListNZ" style="width: 45%; position: absolute; top: 0; right: 0">
      <?php
      $start = "";
      foreach (range('N','Z') as $letter) {
        if ($letter != $start):
          ?>
          <div id="<?php echo $letter ?>-teams">
          <h3><?php echo $letter ?></h3>
          <?php
        endif;
        
        if (null != $teamsArray[$letter]) {
          foreach ($teamsArray[$letter] as $team): 
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
  <div class="ft">
  <?php
  foreach (range('A','Z') as $letter):
    ?>
    <a class="letterLink" href="#"><?php echo $letter ?></a>
    <?php
  endforeach;
  ?>
  </div>
</div>
</body>
</html>
