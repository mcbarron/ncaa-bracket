<?php
require("../includes/sajax/Sajax.php");
require("../includes/dbfunctions.php");

sajax_init();
sajax_export("promoteBracketPosition");
sajax_handle_client_request();
?>
<html>
<head>
<title>Promote Bracket Position Test</title>

<script>
<?php
	sajax_show_javascript();
?>
	
	function do_promoteBracketPosition_cb(data) 
	{
		document.getElementById("status").innerHTML = data;
	}
	
	function do_promoteBracketPosition() 
	{
		var bp;
		
		bp = document.getElementById("bracket_position").value;		
		x_promoteBracketPosition(bp, do_promoteBracketPosition_cb);
	}
	</script>

</head>
<body>
Bracket Position:<input type="text" name="bracket_position" id="bracket_position" value="" size="3">
<br>
<input type="button" name="check" value="Save" onclick="do_promoteBracketPosition(); return false;">
<br>
<span id="status"></span>
</body>
</html>
