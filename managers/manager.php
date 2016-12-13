<?php 
	include('../view/header.php');
	require_once('manager_data.php');

	if ($_SESSION['is_valid_admin'] == true) {
		$colspan = 8;
	}
	else {
		$colspan = 7;
	}
?>
<div class="container">
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
			<?php foreach ($games as $row=>$game) { ?>
			<tr>
				<td><?php echo $game['season']; ?></td>
				<td><?php echo $game['wk']; ?></td>
				<td><?php echo $game['game_type']; ?></td>
				<td><?php echo $game['opponent']; ?></td>
				<td><?php echo $game['team_score']; ?></td>
				<td><?php echo $game['opp_score']; ?></td>
				<td><?php echo $game['win']; ?></td>
				<?php if ($_SESSION['is_valid_admin'] == true) { ?>
				<td>
					<button class="btn btn-warning">Edit</button>
					<button class="btn btn-danger">Delete</button>
				</td>
				<?php } ?>
			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>

<?php include('../view/footer.php'); ?>