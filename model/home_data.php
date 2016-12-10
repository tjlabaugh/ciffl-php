<?php
	require_once('functions.php');
	require_once('db_query.php');

	$gamesArray = createArray(getTeamGamesPlayed);
	arsort($gamesArray);
	
	$winsArray = createArray(getTeamWins);
	arsort($winsArray);

	$lossesArray = createArray(getTeamLosses);
	arsort($lossesArray);

	$winPercentages = createArray(getWinPercentage);
	arsort($winPercentages);

	$qfGamesPlayed = createArray(getQFGamesPlayed);
	arsort($qfGamesPlayed);

	$qfWins = createArray(getQFWins);
	arsort($qfWins);

	$qfLosses = createArray(getQFLosses);
	arsort($qfLosses);

	$qfWinPercentages = createArray(getQFWinPercentage);
	arsort($qfWinPercentages);
?>