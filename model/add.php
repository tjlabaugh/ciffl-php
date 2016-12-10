<?php
	require_once('database.php');
	require_once('functions.php');

	$year = filter_input(INPUT_POST, 'year', FILTER_VALIDATE_INT);
	$week = filter_input(INPUT_POST, 'week', FILTER_VALIDATE_INT);
	$team1 = filter_input(INPUT_POST, 'team1', FILTER_VALIDATE_INT); 
	$team2 = filter_input(INPUT_POST, 'team2', FILTER_VALIDATE_INT);
	$team1_score = filter_input(INPUT_POST, 'team1_score', FILTER_VALIDATE_FLOAT);
	$team2_score = filter_input(INPUT_POST, 'team2_score', FILTER_VALIDATE_FLOAT);
	$action = filter_input(INPUT_POST, 'action');

	if ($action == 'add') {
		echo "Year: $year - Week: $week - Team_1: $team1 - Team_2: $team2 - Team_1_Score: $team1_score - Team_2_Score: $team2_score";

		$manager1 = getManagerDataBase($team1);
		$manager2 = getManagerDataBase($team2);
		$game_type = getGameType($week);
		$team1_win = hasWon($team1_score, $team2_score);
		$team2_win = hasWon($team2_score, $team1_score);
		echo "Team One: $team1_win Team Two: $team2_win";
//		addGameToDB($manager1, $year, $week, $game_type, $team2, $team1_score, $team2_score, $won);
//		addGameToDB($year, $week, $game_type, $team1, $team2_score, $team1_score, hasWon($team2_score, $team1_score));

		$query1 = 'INSERT INTO ' . $manager1 .
						' (season, wk, game_type, opponent, team_score, opp_score, win)
					VALUES
						(:season, :wk, :game_type, :opponent, :team_score, :opp_score, :win)';
		$statement1 = $db->prepare($query1);
		$statement1->bindValue(':season', $year);
		$statement1->bindValue(':wk', $week);
		$statement1->bindValue(':game_type', $game_type);
		$statement1->bindValue(':opponent', $team2);
		$statement1->bindValue(':team_score', $team1_score);
		$statement1->bindValue(':opp_score', $team2_score);
		$statement1->bindValue(':win', $team1_win);
		$statement1->execute();
		$statement1->closeCursor();

		$query2 = 'INSERT INTO ' . $manager2 .
						' (season, wk, game_type, opponent, team_score, opp_score, win)
					VALUES
						(:season, :wk, :game_type, :opponent, :team_score, :opp_score, :win)';
		$statement2 = $db->prepare($query2);
		$statement2->bindValue(':season', $year);
		$statement2->bindValue(':wk', $week);
		$statement2->bindValue(':game_type', $game_type);
		$statement2->bindValue(':opponent', $team1);
		$statement2->bindValue(':team_score', $team2_score);
		$statement2->bindValue(':opp_score', $team1_score);
		$statement2->bindValue(':win', $team2_win);
		$statement2->execute();
		$statement2->closeCursor();
	}	

?>

<div style="width: 50%; margin: 0 auto;">
	<form method="POST" action="add.php">
		<input type="hidden" name="action" value="add">
		<label>Year</label>
		<select name="year">
			<option value="2016">2016</option>
			<option value="2015">2015</option>
			<option value="2014">2014</option>
		</select>
		<br />
		<label>Week</label>
		<select name="week">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="11">11</option>
			<option value="12">12</option>
			<option value="13">13</option>
		</select>
		<br />
		<label>Team 1</label>
		<select name="team1">
			<option value="0"></option>
			<option value="1">Alex V</option>
			<option value="2">Bill G</option>
			<option value="3">Craig P</option>
			<option value="4">Dan T</option>
			<option value="5">Drew B</option>
			<option value="6">Eric G</option>
			<option value="7">John O</option>
			<option value="8">TJ L</option>
			<option value="9">Mike A</option>
			<option value="10">Matt K</option>
		</select>
		<br />
		<label>Team 2</label>
		<select name="team2">
			<option value="0"></option>
			<option value="1">Alex V</option>
			<option value="2">Bill G</option>
			<option value="3">Craig P</option>
			<option value="4">Dan T</option>
			<option value="5">Drew B</option>
			<option value="6">Eric G</option>
			<option value="7">John O</option>
			<option value="8">TJ L</option>
			<option value="9">Mike A</option>
			<option value="10">Matt K</option>
		</select>
		<br />
		<label>Team 1 Score</label>
		<input type="text" name="team1_score">
		<br />
		<label>Team 2 Score</label>
		<input type="text" name="team2_score">
		<br />
		<button name="submit">Add Game</button>
	</form>
</div>