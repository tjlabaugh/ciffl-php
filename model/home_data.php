<?php
	require_once('functions.php');

	$gamesArray = array('Alex'=>getTeamGamesPlayed('alexv_career'),
						'Bill'=>getTeamGamesPlayed('billg_career'),
						'Craig'=>getTeamGamesPlayed('craigp_career'),
						'Dan'=>getTeamGamesPlayed('dant_career'),
						'Drew'=>getTeamGamesPlayed('drewb_career'),
						'Eric'=>getTeamGamesPlayed('ericg_career'),
						'John'=>getTeamGamesPlayed('johno_career'),
						'Matt'=>getTeamGamesPlayed('mattk_career'),
						'Mike'=>getTeamGamesPlayed('mikea_career'),
						'TJ'=>getTeamGamesPlayed('tjl_career'));
	arsort($gamesArray);
	
	$winsArray = array('Alex'=>getTeamWins('alexv_career'),
						'Bill'=>getTeamWins('billg_career'),
						'Craig'=>getTeamWins('craigp_career'),
						'Dan'=>getTeamWins('dant_career'),
						'Drew'=>getTeamWins('drewb_career'),
						'Eric'=>getTeamWins('ericg_career'),
						'John'=>getTeamWins('johno_career'),
						'Matt'=>getTeamWins('mattk_career'),
						'Mike'=>getTeamWins('mikea_career'),
						'TJ'=>getTeamWins('tjl_career'));
	arsort($winsArray);

	$lossesArray = array('Alex'=>getTeamLosses('alexv_career'),
						'Bill'=>getTeamLosses('billg_career'),
						'Craig'=>getTeamLosses('craigp_career'),
						'Dan'=>getTeamLosses('dant_career'),
						'Drew'=>getTeamLosses('drewb_career'),
						'Eric'=>getTeamLosses('ericg_career'),
						'John'=>getTeamLosses('johno_career'),
						'Matt'=>getTeamLosses('mattk_career'),
						'Mike'=>getTeamLosses('mikea_career'),
						'TJ'=>getTeamLosses('tjl_career'));
	arsort($lossesArray);

	$winPercentages = array('Alex'=>getWinPercentage('alexv_career'),
						'Bill'=>getWinPercentage('billg_career'),
						'Craig'=>getWinPercentage('craigp_career'),
						'Dan'=>getWinPercentage('dant_career'),
						'Drew'=>getWinPercentage('drewb_career'),
						'Eric'=>getWinPercentage('ericg_career'),
						'John'=>getWinPercentage('johno_career'),
						'Matt'=>getWinPercentage('mattk_career'),
						'Mike'=>getWinPercentage('mikea_career'),
						'TJ'=>getWinPercentage('tjl_career'));
	arsort($winPercentages);

?>