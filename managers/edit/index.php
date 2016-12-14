<?php
	session_start();
	$manager = filter_input(INPUT_GET, 'manager');
	$season = filter_input(INPUT_GET, 'manager');
	$manager = filter_input(INPUT_GET, 'manager');
	$manager = filter_input(INPUT_GET, 'manager');
	$manager = filter_input(INPUT_GET, 'manager');

	if ($_SESSION['is_valid_admin'] == true) {
		include('edit.php');
	}
	else {
		header("location: /");
	}
?>