<?php 
	session_start();
	require_once('../model/db_query.php');
	require_once('../model/functions.php');

	$season = filter_input(INPUT_POST, 'season', FILTER_VALIDATE_INT);
	$week = filter_input(INPUT_POST, 'week', FILTER_VALIDATE_INT);
	$team1 = filter_input(INPUT_POST, 'team1', FILTER_VALIDATE_INT);
	$team2 = filter_input(INPUT_POST, 'team2', FILTER_VALIDATE_FLOAT);
	$team1_score = filter_input(INPUT_POST, 'team1_score', FILTER_VALIDATE_FLOAT);
	$team2_score = filter_input(INPUT_POST, 'team2_score', FILTER_VALIDATE_FLOAT);

	$manager1_DB = getManagerDataBase($team1);
	$manager2_DB = getManagerDataBase($team2);


	if ($_SESSION['is_valid_admin'] == true) {
		addGameToDB($manager1_DB, $manager2_DB, $team1, $team2, $season, $week, $team1_score, $team2_score);
		header("location: /");
	}
	else {
		header("location: /view/login.php");
	}
	

?>