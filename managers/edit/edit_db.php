<?php 
	session_start();
	require_once('../../model/db_query.php');
	require_once('../../model/functions.php');

	$orginal_season = filter_input(INPUT_POST, 'orginal_season');
	$orginal_week = filter_input(INPUT_POST, 'orginal_week');
	$manager = filter_input(INPUT_POST, 'manager');

	$season = filter_input(INPUT_POST, 'season', FILTER_VALIDATE_INT);
	$week = filter_input(INPUT_POST, 'week', FILTER_VALIDATE_INT);
	$opponent = filter_input(INPUT_POST, 'opponent', FILTER_VALIDATE_INT);
	$team_score = filter_input(INPUT_POST, 'team_score', FILTER_VALIDATE_FLOAT);
	$opp_score = filter_input(INPUT_POST, 'opp_score', FILTER_VALIDATE_FLOAT);

	$managerDB = getManagerDatabaseByName($manager);


	if ($_SESSION['is_valid_admin'] == true) {
		editGame($manager, $managerDB, $orginal_season, $orginal_week, $season, $week, $opponent, $team_score, $opp_score);
		header("location: /managers/?manager=$manager");
	}
	else {
		header("location: /view/login.php");
	}
	

?>