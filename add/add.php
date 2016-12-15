<?php 
	include('../view/header.php');
	require_once('../model/functions.php');
?>

<main>
	<div>
		<h1>Add Game</h1>
		<form class="form-horizontal" action="add_db.php" method="post">
			<div class="form-group">
				<label for="season" class="col-sm-2">Season</label>
				<div class="col-sm-4">
					<select name="season" class="control-form" id="season">
						<?php for ($y = 2016; $y >= 2005; $y--) { ?>
							<option value="<?php echo $y; ?>"><?php echo $y; ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="week" class="col-sm-2">Week</label>
				<div class="col-sm-4">
					<select name="week" class="control-form" id="week">
						<?php for ($i = 1; $i <= 16; $i++) { ?>
							<option value="<?php echo $i; ?>"><?php echo getGameTypeName($i); ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="team1" class="col-sm-2">Team 1</label>
				<div class="col-sm-4">
					<select name="team1" class="control-form" id="team1">
						<?php for ($i = 1; $i <= 10; $i++) { ?>
							<option value="<?php echo $i; ?>"><?php echo getManagerName($i); ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="team2" class="col-sm-2">Team 2</label>
				<div class="col-sm-4">
					<select name="team2" class="control-form" id="team2">
						<?php for ($i = 1; $i <= 10; $i++) { ?>
							<option value="<?php echo $i; ?>"><?php echo getManagerName($i); ?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="form-group">
				<label for="team1_score" class="col-sm-2"><?php echo "Team 1 Score"; ?></label>
				<div class="col-sm-4">
					<input type="text" name="team1_score" id="team1_score">
				</div>
			</div>
			<div class="form-group">
				<label for="team2_score" class="col-sm-2"><?php echo "Team 2 Score"; ?></label>
				<div class="col-sm-4">
					<input type="text" name="team2_score" id="team2_score">
				</div>
			</div>
			<div class="col-sm-offset-1">
				<button type="submit" class="btn btn-success">Add</button>
				<a href="../?manager=<?php echo $manager ?>" class="btn btn-primary">Back</a>
			</div>
		</form>
	</div>
</main>

<?php include('../view/footer.php') ?>