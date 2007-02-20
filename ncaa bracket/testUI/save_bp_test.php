<?php
require ("../includes/sajax/Sajax.php");
require ("../includes/dbfunctions.php");

sajax_init();
sajax_export("saveBracketPosition");
sajax_handle_client_request();
?>
<html>
<head>
	<title>Save Seed Test</title>
	<script>
<?php

sajax_show_javascript();
?>
	
	function do_saveBracketPosition_cb(data) 
	{
		document.getElementById("status").innerHTML = data;
	}
	
	function do_saveBracketPosition() 
	{
		var bp, ti, yr;
		
		bp = document.getElementById("bracket_position").value;
		ti = document.getElementById("team_id").value;
		yr = document.getElementById("year").value;
		
		x_saveBracketPosition(bp, ti, yr, do_saveBracketPosition_cb);
	}
	</script>
	
</head>
<body>
	Bracket Position: <input type="text" name="bracket_position" id="bracket_position" value="" size="3">
	<br>
	Team ID:<input type="text" name="team_id" id="team_id" value="" size="4">
	<br>
	Year: <input type="text" name="year" id="year" value="" size="4">
	<br>
	<input type="button" name="check" value="Save"
		onclick="do_saveBracketPosition(); return false;">
	<br>
	<span id="status"></span>		
</body>
</html>