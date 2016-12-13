<?php
	include('header.php');
?>
<div class="container">
	<h1>Admin Login</h1>
	<form class="form-horizontal" action="../model/admin.php" method="post">
		<div class="form-group">
			<label for="username" class="col-sm-1">Username</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" name="username" id="username">
			</div>
		</div>
		<div class="form-group">
			<label for="password" class="col-sm-1">Password</label>
			<div class="col-sm-4">
				<input type="password" class="form-control" name="password" id="password">
			</div>
		</div>
		<div class="col-sm-offset-1">
			<button type="submit" class="btn btn-default">Login</button>
		</div>
	</form>
</div>

<?php include('footer.php'); ?>