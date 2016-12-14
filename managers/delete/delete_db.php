<?php 
	session_start();
	require_once('../../model/db_query.php');
	require_once('../../model/functions.php');

	$manager = filter_input(INPUT_POST, 'manager');
	$opponent = filter_input(INPUT_POST, 'opponent');
	$season = filter_input(INPUT_POST, 'season');
	$week = filter_input(INPUT_POST, 'week');

	$managerDB = getManagerDatabaseByName($manager);
	$opp_managerDB = getManagerDataBase($opponent);


	if ($_SESSION['is_valid_admin'] == true) {
		deleteGame($managerDB, $opp_managerDB, $season, $week);
		header("location: /managers/?manager=$manager");
	}
	else {
		header("location: /view/login.php");
	}
	

?>