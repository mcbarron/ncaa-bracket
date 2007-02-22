<?php

function connectToDB($server="damian", $userid="bracket", $password="bracket", $dbName="ncaa_bracket")
{
  global $link;
	/* Connecting, selecting database */
	$link = mysql_connect($server, $userid, $password)
	or die(mysql_error());
	mysql_select_db($dbName) or die("Could not select database");
	return $link;
}

function closeDBConnection($link)
{
	mysql_close($link);
}

function getTeamsByLetter($letter)
{
	$query = "select a.id as team_id, a.name as team_name,
                       b.id as conf_id, b.name as conf_name, c.name as division_name
                from team a, conference b, division c
                where a.name like \"$letter%\"
                and a.conference_id = b.id
              group by a.name asc;";

	$resultsDB = mysql_query($query) or die(mysql_error() . "SQL: " . $query);

	$index=0;
	while ($row = mysql_fetch_array($resultsDB, 1)) {
		$id = $row["team_id"];
		$name = $row["team_name"];
		$conf_id = $row["conf_id"];
		$conf_name = $row["conf_name"];
		$division = $row["division_name"];
		$result = new Team($id, $name, $conf_id, $conf_name, $division);
		$results[$index] = $result;
		$index++;
	}
	mysql_free_result($resultsDB);
	return $results;
}

function getTeam($id)
{
	$query = "select a.id as team_id, a.name as team_name,
                       b.id as conf_id, b.name as conf_name, c.name as division_name
                from team a, conference b, division c
                where a.id like $id
                and a.conference_id = b.id";

	$resultsDB = mysql_query($query) or die(mysql_error() . "SQL: " . $query);

	if($row = mysql_fetch_array($resultsDB, 1))
	{
		$id = $row["team_id"];
		$name = $row["team_name"];
		$conf_id = $row["conf_id"];
		$conf_name = $row["conf_name"];
		$division = $row["division_name"];
		$result = new Team($id, $name, $conf_id, $conf_name, $division);
	}
	mysql_free_result($resultsDB);
	return $result;
}

function getTeamsByAlpha()
{

	$letters = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q',
	'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');

	foreach($letters as $letter)
	$result[$letter] = getTeamsByLetter($letter);

	return $result;
}

function getBracket($year)
{
	/*
	 * Return an array indexed by position and valued with team:
	 */
  global $link;

	if($link == null)
		$link = connectToDB();

	/* Performing SQL query */
	$query = "SELECT a.bracket_position, b.name
				FROM bracket a, team b
				WHERE a.year = $year 
				and a.team_id = b.id";

	if(!($bpInfoDB = mysql_query($query)))
		return mysql_error();

	while($row = mysql_fetch_array($bpInfoDB, 1))
		$result[($row["bracket_position"])] = $row["name"];

	mysql_free_result($bpInfoDB);	
	return $result;
}

function getPositionSeeds()
{
	/*
	 * Return an array indexed by position and valued with team:
	 */
  global $link;

	if($link == null)
		$link = connectToDB();

	/* Performing SQL query */
	$query = "SELECT bracket_position, seed
				FROM bracket_flow
				WHERE bracket_position <= 64";
	$result = array();
	if(!($bpInfoDB = mysql_query($query)))
		return mysql_error();
		
	while($row = mysql_fetch_array($bpInfoDB, 1))
		$result[($row["bracket_position"])] = $row["seed"];

	mysql_free_result($bpInfoDB);	
	return $result;
}

function getBracketXml($year)
{
	/*
	 * Return an XML document like the following:
	 * 
	 * <bracket year="2007">
	 * 		<position id="1">Indiana</position>
	 * 		<position id="2">Indiana</position>
	 * 		<position id="3">Indiana</position>
	 * 		<position id="4">Indiana</position>
 	 * </bracket>
	 */
  global $link;

	$xmlString = "<?xml version=\"1.0\"?>\n<bracket year=\"$year\">\n";

	if($link == null)
		$link = connectToDB();

	/* Performing SQL query */
	$query = "SELECT a.bracket_position, b.name
				FROM bracket a, team b
				WHERE a.year = $year 
				and a.team_id = b.id";

	if(!($bpInfoDB = mysql_query($query)))
		return mysql_error();

	while($row = mysql_fetch_array($bpInfoDB, 1))
		$xmlString = $xmlString . buildPositionElement($row);
	
	$xmlString = $xmlString . "</bracket>\n";
	mysql_free_result($bpInfoDB);	
	return $xmlString;
}

function getPosition($year, $bp)
{
	/*
	 * Return an XML document like the following:
	 * 
	 * <bracket year="2007">
	 * 		<position id="1">Indiana</position>
	 * 		<position id="2">Indiana</position>
	 * 		<position id="3">Indiana</position>
	 * 		<position id="4">Indiana</position>
 	 * </bracket>
	 */
  global $link;

	$xmlString = "<?xml version=\"1.0\"?>\n<bracket year=\"$year\">\n";

	if($link == null)
		$link = connectToDB();

	/* Performing SQL query */
	$query = "SELECT a.bracket_position, b.name
				FROM bracket a, team b
				WHERE a.year = $year
				and a.bracket_position = $bp 
				and a.team_id = b.id";

	if(!($bpInfoDB = mysql_query($query)))
		return mysql_error();

	while($row = mysql_fetch_array($bpInfoDB, 1))
		$xmlString = $xmlString . buildPositionElement($row);
	
	$xmlString = $xmlString . "</bracket>\n";
	mysql_free_result($bpInfoDB);	
	return $xmlString;
}

function buildPositionElement($row)
{
	$bp = $row["bracket_position"];
	$name = $row["name"];	
	return "\t<position id=\"$bp\">$name</position>\n";
}

/*
 * Saves the bracket positions from initial seeds through tourney results.
 */
function saveBracketPosition($bracket_position, $team_id, $year)
{
  global $link;

	if($link == null)
		$link = connectToDB();

	if($year == "")
		$year = date("Y");
		
	$resultDB = mysql_query("select *
					from bracket 
					where year = \"$year\" 
				      and team_id = $team_id
                      and bracket_position = $bracket_position", 
	$link);
	 
	if(mysql_num_rows($resultDB) > 0)
		return "Team has already exists in the bracket for $year.";

	$result = mysql_query("select *
					from bracket 
					where year = \"$year\" 
				      and bracket_position = $bracket_position", 
	$link);

	if(mysql_num_rows($result) < 1)
		$stmt = "insert into bracket (bracket_position, team_id, year)
					values ($bracket_position, $team_id, \"$year\")";
	else
		$stmt = "update bracket
					set team_id = $team_id
					where year = \"$year\"
					and bracket_position = $bracket_position";
	
	mysql_free_result($resultDB);
		
	return mysql_query($stmt);
}


/*
 * Saves a players pick into the player_picks table.  This function will 
 * peform and update of the team pick if necessary.
 */
function savePick($poolId, $userId, $year, $bracketPosition, $winnerId)
{
  global $link;

	if($link == null)
		$link = connectToDB();

	$resultDB = mysql_query("select *
					from player_picks 
					where pool_id = $poolId 
					  and user_id = \"$userId\" 
					  and year = \"$year\" 
				      and bracket_position = $bracketPosition", 
	$link);

	if(mysql_num_rows($resultDB) < 1)
		$stmt = "insert into player_picks (pool_id, user_id, year, bracket_position, winning_team_id)
								values ($poolId, \"$userId\", \"$year\", $bracketPosition, $winnerId)";
	else
		$stmt = "update player_picks
					set winning_team_id = $winnerId
					where pool_id = $poolId
					and user_id = \"$userId\"
					and year = \"$year\"
					and bracket_position = $bracketPosition";
 
	mysql_free_result($resultDB);
		
	if(mysql_query($stmt))
		return true;
	else
		return mysql_error();
}

/*
 * deleteSubPositions will delete bracket entries that are after nextPosition
 * for a team in a year.
 */
function deleteSubPositions($year, $nextPosition, $currentTeamId)
{
  global $link;

	$changedPositions = "";  // return variable.
		
	if($link == null)
	$link = connectToDB();

	$stmt = "select bracket_position
					from bracket 
					where year = \"$year\" 
					  and team_id = $currentTeamId
				      and bracket_position > $nextPosition";
	$resultDB = mysql_query($stmt);

	if(mysql_num_rows($resultDB) >= 1)
	{	
		while($row = mysql_fetch_array($resultDB, 1))
		{
			$data = $row["bracket_position"];
			$changedPositions = "$changedPositions, $data";
		}
			
		$stmt = "delete
					from bracket 
					where year = \"$year\" 
					  and team_id = $currentTeamId
				      and bracket_position > $nextPosition";
		mysql_query($stmt);
	}
	mysql_free_result($resultDB);
	return $changedPositions;
}

/*
 * deleteSubPicks function is used to delete all picks for a user, team, pool, year
 * that are at a bracket position greater than nextPosition.
 */
function deleteSubPicks($poolId, $userId, $year, $nextPosition, $currentTeamId)
{
  global $link;

	$changedPositions = "";  // return variable.
		
	if($link == null)
		$link = connectToDB();

	$stmt = "select bracket_position
					from player_picks 
					where pool_id = $poolId 
					  and user_id = \"$userId\" 
					  and year = \"$year\" 
					  and winning_team_id = $currentTeamId
				      and bracket_position > $nextPosition";

	$resultDB = mysql_query($stmt);

	if(mysql_num_rows($resultDB) >= 1)
	{	
		while($row = mysql_fetch_array($resultDB, 1))
		{
			$data = $row["bracket_position"];
			$changedPositions = "$changedPositions, $data";
		}
			
		$stmt = "delete
					from player_picks 
					where pool_id = $poolId 
					  and user_id = \"$userId\" 
					  and year = \"$year\" 
					  and winning_team_id = $currentTeamId
				      and bracket_position > $nextPosition";
 
		mysql_query($stmt);
	}
	mysql_free_result($resultDB);
	return $changedPositions;
}	

/*
 * getBrackPositionInfo function is used to look up the current resident (team id) of the 
 * given bracket position as well as the next position in the bracket flow.
 */
function getBracketPositionInfo($bp)
{
  global $link;

	if($link == null)
		$link = connectToDB();

	/* Performing SQL query */
	$query = "SELECT a.team_id, b.next_position
				FROM bracket a, bracket_flow b
				WHERE a.bracket_position = $bp 
				and a.bracket_position = b.bracket_position";

	if(!($bpInfoDB = mysql_query($query)))
		return mysql_error();

	if($row = mysql_fetch_array($bpInfoDB, 1))
	{
		$teamId = $row["team_id"];
		$nextPositionId = $row["next_position"];
		$result = new BracketPositionInfo($bp, $teamId, $nextPositionId);
	}

	mysql_free_result($bpInfoDB);	
	return $result;
}

/*
 * getPickPositionInfo function is used to look up the current resident (team id) of the 
 * given bracket position for a user as well as the next position in the bracket flow.
 */
function getPickPositionInfo($bp, $userId, $poolId)
{
  global $link;

	if($link == null)
		$link = connectToDB();

	/* Performing SQL query */
	$query = "SELECT a.winning_team_id, b.next_position, a.pool_id, a.user_id
				FROM player_picks a, bracket_flow b
				WHERE a.bracket_position = $bp 
				and a.user_id = \"$user_id\"
				and a.pool_id = $poolId
				and a.bracket_position = b.bracket_position";

	if(!($bpInfoDB = mysql_query($query)))
		return mysql_error();
	 
	if($row = mysql_fetch_array($bpInfoDB, 1))
	{
		$teamId = $row["winning_team_id"];
		$nextPositionId = $row["next_position"];
		$poolId = $row["pool_id"];
		$userId = $row["user_id"];
		$result = new PickPositionInfo($bp, $teamId, $nextPositionId, $poolId, $userId);
	}
	mysql_free_result($bpInfoDB);
	return $result;
}

/*
 * promoteBracket function will take a bracket position and promote the 
 * resident team at that position to the next logical bracket position as defined
 * in the bracket_flow.  If there is an inhabitant in the new position, this 
 * function will call another function to delete all subsequent positions that
 * old team is sitting in.  This function is intended for the bracket administration
 * role that is responsible for marking winners, etc.
 */
function promoteBracketPosition($bp)
{
	$changedPositions = "";
	$bpi = getBracketPositionInfo($bp);
	$nextPosition = $bpi->nextPosition;
	$year = date("Y");
	$teamId = $bpi->teamId;
	$currentBPI = getBracketPositionInfo($nextPosition);
	$currentTeamId = $currentBPI->teamId; 	
	$changedPositions = "$nextPosition";
	$result = saveBracketPosition($nextPosition, $teamId, $year);
	$deletedPositions = deleteSubPositions($year, $nextPosition, $currentTeamId);
	$changedPositions = "$changedPositions$deletedPositions";
	return $changedPositions;
}

/*
 * promotePick function will take a specific user pick at a bracket position and promote the 
 * resident team at that position to the next logical bracket position as defined
 * in the bracket_flow.  If there is an inhabitant in the new position, this 
 * function will call another function to delete all subsequent positions that
 * old team is sitting in.  This function is intended for users making their picks.
 */
function promotePick($bp, $userId, $poolId)
{
	
	$changedPositions = "";
	if($bp <= 64)
		$ppi = getBracketPositionInfo($bp);
	else
		$ppi = getPickPositionInfo($bp, $userId, $poolId);
	$nextPosition = $ppi->nextPosition;
	$year = date("Y");
	$teamId = $ppi->teamId;
	$currentPPI = getPickPositionInfo($nextPosition, $userId, $poolId);
	$currentTeamId = $currentPPI->teamId; 	
	$changedPositions = "$nextPosition";
	$result = savePick($poolId, $userId, $year, $nextPosition, $teamId);
	$deletedPositions = deleteSubPicks($poolId, $userId, $year, $nextPosition, $currentTeamId);
	$changedPositions = "$changedPositions$deletedPositions";
	return $changedPositions;
}

?>
