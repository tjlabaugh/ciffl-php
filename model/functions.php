<?php 

	// Returns database table given the team ID.
	function getManagerDataBase($teamID) {
		switch ($teamID) {
			case 1:
				return "alexv_career";
				break;
			case 2:
				return "billg_career";
				break;
			case 3:
				return "craigp_career";
				break;
			case 4:
				return "dant_career";
				break;
			case 5:
				return "drewb_career";
				break;
			case 6:
				return "ericg_career";
				break;
			case 7:
				return "johno_career";
				break;
			case 8:
				return "tjl_career";
				break;
			case 9:
				return "mikea_career";
				break;
			case 10:
				return "mattk_career";
				break;
		}
	}

	// Return type of the game when given week. Ex: Week 3 = regular; Week 16 = championship
	function getGameType($week) {
		if ($week <= 13) {
			return 'regular';
		}
		if ($week == 14) {
			return 'quaterfinal';
		}
		if ($week == 15) {
			return 'semifinal';
		}
		if ($week == 16) {
			return 'championship';
		}
	}

	// Return if team as won or lost
	function hasWon($teamScore, $oppScore) {
		if ($teamScore > $oppScore) {
			return '1';
		}
		else {
			return '0';
		}
	}

	// Add game to database
	function addGameToDB($managerDB, $year, $week, $game_type, $opponent, $teamScore, $oppTeamScore, $won) {
		require_once('database.php');
		require_once('add.php');

		echo "Year: $year - Week: $week - Type: $game_type - Opp: $opponent - TeamScore: $teamScore - OppScore: $oppTeamScore, Won?: $won";

		$query = 'INSERT INTO ' . $managerDB .
						' (season, wk, game_type, opponent, team_score, opp_score, win)
					VALUES
						(:season, :wk, :game_type, :opponent, :team_score, :opp_score, :win)';
		$statement1 = $db->prepare($query);
		$statement1->bindValue(':season', $year);
		$statement1->bindValue(':wk', $week);
		$statement1->bindValue(':game_type', $game_type);
		$statement1->bindValue(':opponent', $opponent);
		$statement1->bindValue(':team_score', $teamScore);
		$statement1->bindValue(':opp_score', $oppTeamScore);
		$statement1->bindValue(':win', $won);
		$statement1->execute();
		$statement1->closeCursor();
	}

	function getTeamWins($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(win) AS "Wins"
					FROM ' . $managerDB .
					' WHERE win = true && game_type = "regular"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$wins = $arr['Wins'];
		$statement1->closeCursor();

		return $wins;
	}

	function getTeamGamesPlayed($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(wk) AS "games"
					FROM ' . $managerDB . '
					WHERE game_type = "regular"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$output = $arr['games'];
		$statement1->closeCursor();

		return $output;
	}

	function getTeamLosses($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(win) AS "losses"
					FROM ' . $managerDB . '
					WHERE win = false && game_type = "regular"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$output = $arr['losses'];
		$statement1->closeCursor();

		return $output;
	}

	function getWinPercentage($managerDB) {
		include('database.php');

		$query1 = 'SELECT COUNT(win) AS "wins"
					FROM ' . $managerDB . '
					WHERE win = true && game_type = "regular"';
		$statement1 = $db->prepare($query1);
		$statement1->execute();
		$arr = $statement1->fetch();
		$wins = $arr['wins'];
		$statement1->closeCursor();

		$query2 = 'SELECT COUNT(wk) AS "games"
					FROM ' . $managerDB . '
					WHERE game_type = "regular"';
		$statement2 = $db->prepare($query2);
		$statement2->execute();
		$arr = $statement2->fetch();
		$games = $arr['games'];
		$statement2->closeCursor();


		return floatval($wins) / floatval($games);

	}
?>