<?php 
	include('../../view/header.php');
	require_once('../../model/functions.php');

	$outcome = ($win) ? "victory" : "loss";
?>

<main>
	<div>
		<?php echo "Manager: " . $manager; ?><br>
		<?php echo "opponent: " . $opponent; ?><br>
		<?php echo "season: " . $season; ?><br>
		<?php echo "week: " . $week; ?><br>
		<h1>Edit Game</h1>
		<div class="text-center delete-message">
			<h4>
				Are you sure you wish to delete<br><?php echo $manager; ?>&#39;s <?php echo $season . " " . getGameTypeName($week) . " " . $outcome; ?> against <?php echo getManagerName($opponent) . "<br>" . number_format($team_score, 2) . " to " . number_format($opp_score, 2); ?>?
			</h4>
			<form action="delete_db.php" method="post">
				<input type="hidden" name="manager" value="<?php echo $manager; ?>">
				<input type="hidden" name="opponent" value="<?php echo $opponent; ?>">
				<input type="hidden" name="season" value="<?php echo $season; ?>">
				<input type="hidden" name="week" value="<?php echo $week; ?>">


				<input type="submit" class="btn btn-danger" value="Delete">
				<a href="../?manager=<?php echo $manager ?>" class="btn btn-primary">Back</a>
			</form>
		</div>
	</div>
</main>

<?php include('../../view/footer.php') ?>