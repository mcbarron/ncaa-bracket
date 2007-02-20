<?php

class Team
{
	var $id;
	var $name;
	var $conference;

	function Team($_id, $_name, $_conference_id, $_conference, $_division)
	{
		$this->id = $_id;
		$this->name = $_name;
		$this->conference = new Conference($_conference_id, $_conference, $_division);
	}
}

class Conference
{
	var $id;
	var $name;
	var $fullName;
	var $division;

	function Conference($_id, $_name, $_divisionName)
	{
		$this->id = $_id;
		$this->name = $_name;
		$this->division = $_divisionName;
	}
}

class BracketTeam
{
    var $seed;
    var $id;
    var $name;
    var $region_id;
    var $seedToPosition;
    var $seedToGame;


    function BracketTeam($_seed, $_id, $_name, $_region_id)
    {
        $this->seed = $_seed;
        $this->id = $_id;
        $this->name = $_name;
        $this->region_id = $_region_id;
        $this->seedToPosition = array(1=>1,16=>2,8=>3,9=>4,5=>5,12=>6,4=>7,13=>8,6=>9,11=>10,3=>11,14=>12,7=>13,10=>14,2=>15,15=>16);
        $this->seedToGame = array(1=>1,16=>1,8=>2,9=>2,5=>3,12=>3,4=>4,13=>4,6=>5,11=>5,3=>6,14=>6,7=>7,10=>7,2=>8,15=>8);
    }

    function bracketPosition()
    {
       $index = $this->seed;
       $seedPosition = $this->seedToPosition[$index];
       return $seedPosition + (16 * ($this->region_id - 1));
    }

}

class GameResult
{
    var $game_id;
    var $winner;
    var $loser;
    var $winning_score;
    var $losing_score;

    function GameResult($_game_id, $_winner_id, $_loser_id, $_winning_score, $_losing_score)
    {
        $this->game_id = $_game_id;
        $this->winner = getTeam($_winner_id);
        $this->loser = getTeam($_loser_id);
        $this->winning_score = $_winning_score;
        $this->losing_score = $_losing_score;
    }
}

class PlayerPick
{
    var $game_id;
    var $winner;
    var $winner_id;
    var $user;
    var $year;

    function PlayerPick($_game_id, $_winner, $_winner_id, $_user, $_year)
    {
        $this->game_id = $_game_id;
        $this->winner = $_winner;
        $this->winner_id = $_winner_id;
        $this->user = $_user;
        $this->year = $_year;
    }
}

class PlayerResult
{
	var $first_name;
	var $last_name;
	var $point_total;
	var $max_possible;
	var $champion_pick;
	var $pick_percentage;


	function GameResult($_first_name, $_last_name, $_point_total, $max_point_total, $champion_pick, $pick_percentage)
	{
		$this->first_name = $_first_name;
		$this->last_name = $_last_name;
		$this->point_total = $_point_total;
		$this->max_possible = $max_point_total;
		$this->champion_pick = $champion_pick;
		$this->pick_percentage = $pick_percentage;
	}



	/**
	   1. select d.first_name, d.last_name, sum(c.point_value), count(*) / max(a.game_id)
          from bracket_results a, bracket_picks b, game_id_points c, user d
          where a.game_id = b.game_id
          and a.winning_team_id = b.winning_team_id
          and b.game_id = c.game_id
          and b.user_id = d.id
          group by b.user_id

		2.	select a.user_id, b.name
	        from bracket_picks a, team b
	        where a.game_id = 63
	        and a.winning_team_id = b.id

	    3.








	*/

}

class BracketMapping
{
	var $position;
	var $seed;
	var $region;

	function BracketMapping($_position, $_seed, $_region)
	{
		$this->position = $_position;
		$this->seed = $_seed;
		$this->region = $_region;
	}
}

class BracketPositionInfo
{
	var $bracketPosition;
	var $teamId;
	var $nextPosition;

	function BracketPositionInfo($_bracketPosition, $_teamId, $_nextPosition)
	{
		$this->bracketPosition = $_bracketPosition;
		$this->teamId = $_teamId;
		$this->nextPosition = $_nextPosition;
	}
}

class PickPositionInfo
{
	var $bracketPosition;
	var $teamId;
	var $userId;
	var $poolId;
	var $nextPosition;

	function PickPositionInfo($_bracketPosition, $_teamId, $_nextPosition, $_poolId, $_userId)
	{
		$this->bracketPosition = $_bracketPosition;
		$this->teamId = $_teamId;
		$this->nextPosition = $_nextPosition;
		$this->userId = $_userId;
		$this->poolId = $_poolId;
	}
}

?>