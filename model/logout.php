<?php
	session_start();
	unset($_SESSION['is_valid_admin']);
	header("location: /");
?>