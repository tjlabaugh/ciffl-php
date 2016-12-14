<?php
	session_start();
	$manager = filter_input(INPUT_GET, 'manager');
	$season = filter_input(INPUT_GET, 'season');
	$week = filter_input(INPUT_GET, 'week');
	$game_type = filter_input(INPUT_GET, 'game_type');
	$opponent = filter_input(INPUT_GET, 'opponent');
	$team_score = filter_input(INPUT_GET, 'team_score');
	$opp_score = filter_input(INPUT_GET, 'opp_score');
	$win = filter_input(INPUT_GET, 'win');

	if ($_SESSION['is_valid_admin'] == true) {
		include('edit.php');
	}
	else {
		header("location: /view/login.php");
	}
?>