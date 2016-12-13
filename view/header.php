<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>CIFFL Database</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
	<!-- NAV BAR -->
	<nav class="navbar navbar-default">
		<div class="container">
			<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
	      		<a class="navbar-brand" href="/">CIFFL</a>
	    	</div>

	    <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		    	<ul class="nav navbar-nav navbar-right">
		    		<?php if ($_SESSION['is_valid_admin'] == true) { ?>
		    			<li><a href="/model/logout.php">Logout</a></li>
		    		<?php } else { ?>
		        		<li><a href="/view/login.php">Admin Login</a></li>
		        	<?php } ?>
		    	</ul>
		   	</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>
	<?php  echo $_SESSION['is_valid_admin']; ?>
