<?php
	session_start();

	if ($_SESSION['is_valid_admin'] == true) {
		include('add.php');
	}
	else {
		header("location: /view/login.php");
	}
?>