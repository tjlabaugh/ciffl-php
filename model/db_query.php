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
		$arr = $statement1->fetch();
		$wins = $arr['Wins'];
		$statement1->closeCursor();

		return $wins;
	}

	function getTeamGamesPlayed($managerDB) {
		include('database.php');

		$query = 'SELECT COUNT(wk) AS "games"
					FROM ' . $managerDB . ' WHERE game_type = "regular"';
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

	function editGame($manager, $managerDB, $givenorginal_season, $givenorginal_week, $givenseason, $givenweek, $givenopponent, $giventeam_score, $givenopp_score) {
		include('database.php');
		require_once('functions.php');

		$opp_managerDB = getManagerDataBase($givenopponent);
		$teamID = getManagerID($manager);
		$teamWon = hasWon($giventeam_score, $givenopp_score);
		$oppWon = hasWon($givenopp_score, $giventeam_score);
		$givengame_type = getGameType($givenweek);

		$query1 = 'UPDATE ' . $managerDB . 
				' SET season = :season, wk = :week, game_type = :game_type, opponent = :opponent, team_score = :team_score, opp_score = :opp_score, win = :win 
					WHERE season = :orginal_season AND wk = :orginal_week';
		$statement1 = $db->prepare($query1);
		$statement1 -> bindValue(':orginal_season', $givenorginal_season);
		$statement1 -> bindValue(':orginal_week', $givenorginal_week);
		$statement1 -> bindValue(':season', $givenseason);
		$statement1 -> bindValue(':week', $givenweek);
		$statement1 -> bindValue(':game_type', $givengame_type);
		$statement1 -> bindValue(':opponent', $givenopponent);
		$statement1 -> bindValue(':team_score', $giventeam_score);
		$statement1 -> bindValue(':opp_score', $givenopp_score);
		$statement1 -> bindValue(':win', $teamWon);
		$statement1->execute();
		$statement1->closeCursor();

		$query2 = 'UPDATE ' . $opp_managerDB . 
				' SET season = :season, wk = :week, game_type = :game_type, opponent = :opponent, team_score = :team_score, opp_score = :opp_score, win = :win 
					WHERE season = :orginal_season AND wk = :orginal_week';
		$statement1 = $db->prepare($query2);
		$statement1 -> bindValue(':orginal_season', $givenorginal_season);
		$statement1 -> bindValue(':orginal_week', $givenorginal_week);
		$statement1 -> bindValue(':season', $givenseason);
		$statement1 -> bindValue(':week', $givenweek);
		$statement1 -> bindValue(':game_type', $givengame_type);
		$statement1 -> bindValue(':opponent', $teamID);
		$statement1 -> bindValue(':team_score', $givenopp_score);
		$statement1 -> bindValue(':opp_score', $giventeam_score);
		$statement1 -> bindValue(':win', $oppWon);
		$statement1->execute();
		$statement1->closeCursor();
	}

	function deleteGame($managerDB, $opp_managerDB, $givenseason, $givenweek) {
		include('database.php');

		$query1 = 'DELETE FROM ' . $managerDB . 
				' WHERE season = :season AND wk = :week';
		$statement1 = $db->prepare($query1);
		$statement1 -> bindValue(':season', $givenseason);
		$statement1 -> bindValue(':week', $givenweek);
		$statement1->execute();
		$statement1->closeCursor();

		$query2 = 'DELETE FROM ' . $opp_managerDB . 
				' WHERE season = :season AND wk = :week';
		$statement1 = $db->prepare($query2);
		$statement1 -> bindValue(':season', $givenseason);
		$statement1 -> bindValue(':week', $givenweek);
		$statement1->execute();
		$statement1->closeCursor();
	}


?>