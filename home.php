<?php include('view/header.php'); ?>
<?php require_once('model/database.php'); ?>
<?php require_once('model/home_data.php'); ?>
<?php ?>
	<div class="container">
		<h1>CIFFL Database</h1>
		<h3>Regular Season </h3>
		<div class="row">
			<!-- Games Played -->
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Games Played</th>
						</tr>
					</thead>
					<?php foreach ($gamesArray as $name=>$games) { ?>
						<tr>
							<td><a href="managers/<?php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo $games ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- Wins -->
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Wins</th>
						</tr>
					</thead>
					<?php foreach ($winsArray as $name=>$wins) { ?>
						<tr>
							<td><a href="managers/<?php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo $wins ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- Losses -->
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Losses</th>
						</tr>
					</thead>
					<?php foreach ($lossesArray as $name=>$loss) { ?>
						<tr>
							<td><a href="managers/<?php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo $loss ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- Win Percentage -->
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Win Percentage</th>
						</tr>
					</thead>
					<?php foreach ($winPercentages as $name=>$winPercentage) { ?>
						<tr>
							<td><a href="managers/<?php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo number_format($winPercentage, 3) ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>

		<h3>Post Season</h3>
		<h4>Quarterfinal Games</h4>
		<div class="row">
			<!-- Quarterfinal Games Played -->
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Games Played</th>
						</tr>
					</thead>
					<?php foreach($qfGamesPlayed as $name=>$games) { ?>
						<tr>
							<td><a href="managers/</php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo $games ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- Quarterfinal Wins -->	
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Wins</th>
						</tr>
					</thead>
					<?php foreach($qfWins as $name=>$qfwin) { ?>
						<tr>
							<td><a href="managers/</php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo $qfwin ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- Quarterfinal Losses -->
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Losses</th>
						</tr>
					</thead>
					<?php foreach($qfLosses as $name=>$qfloss) { ?>
						<tr>
							<td><a href="managers/</php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo $qfloss ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
			<!-- Quarterfinal Win Percentage-->
			<div class="col-md-3">
				<table class="table table-striped table-hover table-bordered">
					<thead>
						<tr>
							<th colspan="2">Win Percentage</th>
						</tr>
					</thead>
					<?php foreach($qfWinPercentages as $name=>$qfWinPercentage) { ?>
						<tr>
							<td><a href="managers/</php echo $name ?>"><?php echo $name ?></a></td>
							<td><?php echo number_format($qfWinPercentage, 3); ?></td>
						</tr>
					<?php } ?>
				</table>
			</div>
		</div>		
	</div>
	


<?php include('view/footer.php'); ?>