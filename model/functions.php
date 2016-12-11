<?php 

	// Returns database table given the team ID.
	function getManagerDataBase($teamID) {
		switch ($teamID) {
			case 1:
				return "alexv_career";
				break;
			case 2:
				return "billg_career";
				break;
			case 3:
				return "craigp_career";
				break;
			case 4:
				return "dant_career";
				break;
			case 5:
				return "drewb_career";
				break;
			case 6:
				return "ericg_career";
				break;
			case 7:
				return "johno_career";
				break;
			case 8:
				return "tjl_career";
				break;
			case 9:
				return "mikea_career";
				break;
			case 10:
				return "mattk_career";
				break;
		}
	}

	function getManagerDatabaseByName($managerName) {
		switch ($managerName) {
			case 'Alex':
				return "alexv_career";
				break;
			case 'Bill':
				return "billg_career";
				break;
			case 'Craig':
				return "craigp_career";
				break;
			case 'Dan':
				return "dant_career";
				break;
			case 'Drew':
				return "drewb_career";
				break;
			case 'Eric':
				return "ericg_career";
				break;
			case 'John':
				return "johno_career";
				break;
			case 'TJ':
				return "tjl_career";
				break;
			case 'Mike':
				return "mikea_career";
				break;
			case 'Matt':
				return "mattk_career";
				break;
		}
	}

	// Return type of the game when given week. Ex: Week 3 = regular; Week 16 = championship
	function getGameType($week) {
		if ($week <= 13) {
			return 'regular';
		}
		if ($week == 14) {
			return 'quarter';
		}
		if ($week == 15) {
			return 'semi';
		}
		if ($week == 16) {
			return 'champ';
		}
	}

	// Return if team as won or lost
	function hasWon($teamScore, $oppScore) {
		if ($teamScore > $oppScore) {
			return '1';
		}
		else {
			return '0';
		}
	}

	function createArray($runFunction) {
		return array('Alex'=>$runFunction('alexv_career'),
						'Bill'=>$runFunction('billg_career'),
						'Craig'=>$runFunction('craigp_career'),
						'Dan'=>$runFunction('dant_career'),
						'Drew'=>$runFunction('drewb_career'),
						'Eric'=>$runFunction('ericg_career'),
						'John'=>$runFunction('johno_career'),
						'Matt'=>$runFunction('mattk_career'),
						'Mike'=>$runFunction('mikea_career'),
						'TJ'=>$runFunction('tjl_career'));
	}

	
?>