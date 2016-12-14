<?php 
	include('../../view/header.php');
	require_once('../../model/functions.php');

	$outcome = ($win) ? "victory" : "loss";
?>

<main>
	<div>
		<h1>Edit Game</h1>
		<h4>
			Edit <?php echo $manager; ?>&#39;s <?php echo $season . " " . getGameTypeName($week) . " " . $outcome; ?> against <?php echo getManagerName($opponent) . " " . number_format($team_score, 2) . " to " . number_format($opp_score, 2); ?>
		</h4>
		<form class="form-horizontal" action="edit_db.php" method="post">
			<input type="hidden" name="manager" value="<?php echo $manager ?>">
			<input type="hidden" name="orginal_season" value="<?php echo $season ?>">
			<input type="hidden" name="orginal_week" value="<?php echo $week ?>">

			<div class="form-group">
				<label for="season" class="col-sm-2">Season</label>
				<div class="col-sm-4">
					<select name="season" class="control-form" id="season">
						<?php for ($y = 2016; $y >= 2005; $y--) { ?>
							<option value="<?php echo $y; ?>" <?php if ($season == $y) echo "selected=selected"; ?>><?php echo $y; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="week" class="col-sm-2">Week</label>
				<div class="col-sm-4">
					<select name="week" class="control-form" id="week">
						<?php for ($i = 1; $i <= 16; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if ($week == $i) echo "selected=selected"; ?>><?php echo getGameTypeName($i); ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="opponent" class="col-sm-2">Opponent</label>
				<div class="col-sm-4">
					<select name="opponent" class="control-form" id="opponent">
						<?php for ($i = 1; $i <= 10; $i++) { ?>
							<option value="<?php echo $i; ?>" <?php if ($opponent == $i) echo "selected=selected"; ?>><?php echo getManagerName($i); ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="team_score" class="col-sm-2"><?php echo "$manager's Score"; ?></label>
				<div class="col-sm-4">
					<input type="text" name="team_score" id="team_score" value="<?php echo $team_score; ?>">
				</div>
			</div>
			<div class="form-group">
				<label for="opp_score" class="col-sm-2"><?php echo getManagerName($opponent) . "'s Score"; ?></label>
				<div class="col-sm-4">
					<input type="text" name="opp_score" id="opp_score" value="<?php echo $opp_score; ?>">
				</div>
			</div>
			<div class="col-sm-offset-1">
				<button type="submit" class="btn btn-warning">Edit</button>
				<a href="../?manager=<?php echo $manager ?>" class="btn btn-primary">Back</a>
			</div>
		</form>
	</div>
</main>

<?php include('../../view/footer.php') ?>