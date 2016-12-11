<?php
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

	function getAllGames($managerDB) {
		include('database.php');

		$query = 'SELECT *
					FROM ' . $managerDB;
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$games = $statement1->fetchAll();
		$statement1->closeCursor();

		return $games;
	}

	function getTeamWins($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(win) AS "Wins"
					FROM ' . $managerDB .
					' WHERE win = true && game_type = "regular"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetchAll();
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

	function getQFGamesPlayed($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(wk) AS "games"
					FROM ' . $managerDB . '
					WHERE game_type = "quarter"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$output = $arr['games'];
		$statement1->closeCursor();

		return $output;
	}

	function getQFWins($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(win) AS "wins"
					FROM ' . $managerDB . '
					WHERE game_type = "quarter" && win = true';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$output = $arr['wins'];
		$statement1->closeCursor();

		return $output;
	}

	function getQFLosses($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(win) AS "losses"
					FROM ' . $managerDB . '
					WHERE game_type = "quarter" && win = false';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$output = $arr['losses'];
		$statement1->closeCursor();

		return $output;
	}

	function getQFWinPercentage($managerDB) {
		include('database.php');

		$query1 = 'SELECT COUNT(win) AS "wins"
					FROM ' . $managerDB . '
					WHERE win = true && game_type = "quarter"';
		$statement1 = $db->prepare($query1);
		$statement1->execute();
		$arr = $statement1->fetch();
		$wins = $arr['wins'];
		$statement1->closeCursor();

		$query2 = 'SELECT COUNT(wk) AS "games"
					FROM ' . $managerDB . '
					WHERE game_type = "quarter"';
		$statement2 = $db->prepare($query2);
		$statement2->execute();
		$arr = $statement2->fetch();
		$games = $arr['games'];
		$statement2->closeCursor();

		return floatval($wins) / floatval($games);
	}

	function getTeamPostGamesPlayed($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(wk) AS "games"
					FROM ' . $managerDB . '
					WHERE game_type != "regular"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$output = $arr['games'];
		$statement1->closeCursor();

		return $output;
	}

	function getTeamPostWins($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(win) AS "Wins"
					FROM ' . $managerDB .
					' WHERE win = true && game_type != "regular"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$wins = $arr['Wins'];
		$statement1->closeCursor();

		return $wins;
	}

	function getTeamPostLosses($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(win) AS "losses"
					FROM ' . $managerDB . '
					WHERE win = false && game_type != "regular"';
		$statement1 = $db->prepare($query);
		$statement1->execute();
		$arr = $statement1->fetch();
		$output = $arr['losses'];
		$statement1->closeCursor();

		return $output;
	}

	function getPostWinPercentage($managerDB) {
		include('database.php');

		$query1 = 'SELECT COUNT(win) AS "wins"
					FROM ' . $managerDB . '
					WHERE win = true && game_type != "regular"';
		$statement1 = $db->prepare($query1);
		$statement1->execute();
		$arr = $statement1->fetch();
		$wins = $arr['wins'];
		$statement1->closeCursor();

		$query2 = 'SELECT COUNT(wk) AS "games"
					FROM ' . $managerDB . '
					WHERE game_type != "regular"';
		$statement2 = $db->prepare($query2);
		$statement2->execute();
		$arr = $statement2->fetch();
		$games = $arr['games'];
		$statement2->closeCursor();

		return floatval($wins) / floatval($games);
	}


?>