<?php 
	include('db_query.php');
	require_once('../model/functions.php');
	require_once('../model/db_query.php');
	require_once('manager.php');

	$managerDB = getManagerDatabaseByName($manager);

	$teamGames = getTeamGamesPlayed($managerDB);
	$teamWins = getTeamWins($managerDB);
	$teamLosses = getTeamLosses($managerDB);
	$teamWinPercentage = getWinPercentage($managerDB);

	$postTeamGames = getTeamPostGamesPlayed($managerDB);
	$postTeamWins = getTeamPostWins($managerDB);
	$postTeamLosses = getTeamPostLosses($managerDB);
	$postTeamWinPercentage = getPostWinPercentage($managerDB);

	$games = getAllGames($managerDB);

?>