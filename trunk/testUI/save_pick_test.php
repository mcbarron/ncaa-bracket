<?php
require ("../includes/sajax/Sajax.php");
require ("../includes/dbfunctions.php");

sajax_init();
sajax_export("savePick");
sajax_handle_client_request();
?>
<html>
<head>
	<title>Save Pick Test</title>
	<script>
<?php

sajax_show_javascript();
?>
	
	function do_savePick_cb(data) 
	{
		document.getElementById("status").innerHTML = data;
	}
	
	function do_savePick() 
	{
		var year, pool_id, user_id, bracket_position, winner_id;
		
		bracket_position = document.getElementById("bracket_position").value;
		winner_id = document.getElementById("winner_id").value;
		year = document.getElementById("year").value;
		user_id = document.getElementById("user_id").value;
		pool_id = document.getElementById("pool_id").value;
		
		x_savePick(pool_id, user_id, year, bracket_position, winner_id, do_savePick_cb);
	}
	</script>
	
</head>
<body>
	Bracket Position: <input type="text" name="bracket_position" id="bracket_position" value="" size="3">
	<br>
	Winner ID:<input type="text" name="winner_id" id="winner_id" value="" size="4">
	<br>
	Year: <input type="text" name="year" id="year" value="" size="4">
	<br>
	User ID: <input type="text" name="user_id" id="user_id" value="" size="30">
	<br>
	Pool ID: <input type="text" name="pool_id" id="pool_id" value="" size="2">
	<br>
	<input type="button" name="check" value="Save"
		onclick="do_savePick(); return false;">
	<br>
	<span id="status"></span>		
</body>
</html>