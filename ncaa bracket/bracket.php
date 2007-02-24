<?php

if($year == "")
	$year = date("Y");

require('./includes/bracket_vars.inc');  // need to initialize
require('./includes/class_def.php');
require('./includes/sajax/Sajax.php');
require('./includes/dbfunctions.php');

sajax_init();
//$sajax_debug_mode = 1;
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

$currentBracket = getBracket($year);
$teamsArray = getTeamsByAlpha();
$results = getPositionSeeds();

for($index=1; $index<=64; $index++)
{
  $seed = $results[$index];
  if (isset($currentBracket[$index])) {
    $name = str_replace("State", "St", $currentBracket[$index]);
    
    ${"bp_$index"} = "bp_".$index;
    ${"data_$index"} = "($seed) $name";
  } else {
  	${"bp_$index"} = "bp_$index";
  	${"data_$index"} = "Set #".($seed == null ? "&nbsp;" : $seed);
  	${"onClick_$index"} = "$SAVE_BP_CLICK($index, $seed)";
  	${"onMouseOver_$index"} = $ACTIVE_MOUSE_OVER;
  	${"onMouseOut_$index"} = $ACTIVE_MOUSE_OUT;
  	${"class_$index"} = $DEFAULT_TEAM_CLASS;
  }
}

for($index=65; $index<=127; $index++)
{
	${"bp_$index"} = "bp_$index";
	${"data_$index"} = ($results[$index] == null)? ("&nbsp;"):($results[$index]);
	${"onClick_$index"} = $NO_ON_CLICK;
	${"onMouseOver_$index"} = $NO_MOUSE_OVER;
	${"onMouseOut_$index"} = $NO_MOUSE_OUT;
	${"class_$index"} = $DEFAULT_TEAM_CLASS;
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
          <div><a id="team-<?php echo $team->id ?>" class="teamLink" href="#"><?php echo $team->name; ?></a></div>
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
            <div><a id="team-<?php echo $team->id ?>" class="teamLink" href="#"><?php echo $team->name; ?></a></div>
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
