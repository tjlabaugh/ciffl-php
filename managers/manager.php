<?php 
	include('../view/header.php');
	require_once('manager_data.php');
	require_once('../model/functions.php');

	if ($_SESSION['is_valid_admin'] == true) {
		$colspan = 8;
	}
	else {
		$colspan = 7;
	}
?>
<main>
	<h1><?php echo $manager ?>'s Career Stats</h1>
	<!-- Regular Season -->
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th colspan="4">Regular Season</th>
			</tr>
			<tr>
				<th>Games</th>
				<th>Wins</th>
				<th>Losses</th>
				<th>Win %</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $teamGames; ?></td>
				<td><?php echo $teamWins; ?></td>
				<td><?php echo $teamLosses; ?></td>
				<td><?php echo number_format($teamWinPercentage, 3); ?></td>
			</tr>
		</tbody>
	</table>
	<!-- Post Season -->
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th colspan="4">Post Season</th>
			</tr>
			<tr>
				<th>Games</th>
				<th>Wins</th>
				<th>Losses</th>
				<th>Win %</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><?php echo $postTeamGames; ?></td>
				<td><?php echo $postTeamWins; ?></td>
				<td><?php echo $postTeamLosses; ?></td>
				<td><?php echo number_format($postTeamWinPercentage, 3); ?></td>
			</tr>
		</tbody>
	</table>
	<!-- Game List -->
	<table class="table table-striped table-hover table-bordered">
		<thead>
			<tr>
				<th colspan="<?php echo $colspan; ?>">All Games</th>
			</tr>
			<tr>
				<th>Season</th>
				<th>Week</th>
				<th>Game Type</th>
				<th>Opponent</th>
				<th>Team Score</th>
				<th>Opponent Score</th>
				<th>Win/Loss</th>
				<?php if ($_SESSION['is_valid_admin'] == true) { ?>
				<th> </th>
				<?php } ?>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($games as $row=>$game) {
					$data = array('manager'=>$manager,
								'season'=>$game['season'],
								'week'=>$game['wk'],
								'game_type'=>$game['game_type'],
								'opponent'=>$game['opponent'],
								'team_score'=>$game['team_score'],
								'opp_score'=>$game['opp_score'],
								'win'=>$game['win']);
					$getURL = http_build_query($data);
			?>
			<tr>
				<td><?php echo $game['season']; ?></td>
				<td><?php echo $game['wk']; ?></td>
				<td><?php echo $game['game_type']; ?></td>
				<td><a href="?manager=<?php echo getManagerName($game['opponent']); ?>"><?php echo getManagerName($game['opponent']); ?></a></td>
				<td><?php echo $game['team_score']; ?></td>
				<td><?php echo $game['opp_score']; ?></td>
				<td><?php echo ($game['win']) ? "Win" : "Loss"; ?></td>
				<?php if ($_SESSION['is_valid_admin'] == true) { ?>
				<td>
					<a href="edit?<?php echo $getURL; ?>"><button class="btn btn-warning">Edit</button></a>
					<a href="delete?<?php echo $getURL; ?>"><button class="btn btn-danger">Delete</button></a>	
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</main>

<?php include('../view/footer.php'); ?>