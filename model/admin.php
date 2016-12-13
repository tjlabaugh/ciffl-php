<?php
	session_start();

	$givenusername = filter_input(INPUT_POST, 'username');
	$givenpassword = filter_input(INPUT_POST, 'password');

	function isValidLogin($givenusername, $givenpassword) {
		include('database.php');
		$encryptPassword = sha1($givenusername . $givenpassword);
	    $query = 'SELECT admin_id FROM admin
	              WHERE username = :username AND password = :password';
	    $statement = $db->prepare($query);
	    $statement->bindValue(':username', $givenusername, PDO::PARAM_STR);
	    $statement->bindValue(':password', $encryptPassword, PDO::PARAM_STR);
	    $statement->execute();
	    $valid = ($statement->rowCount() == 1);
	    $statement->closeCursor();
	    return $valid;
	}

//	if (!isset($_SESSION['isValidLogin'])) {
    //	$action = 'login';
//	}

//	if (isValidLogin($givenusername, $givenpassword)) {
//		echo "SUCCESSFUL!";
//	}

	if (isValidLogin($givenusername, $givenpassword)) {
	    $_SESSION['is_valid_admin'] = true;
	    header("Location: /" );
	} else {
	//    $login_message = 'You must login to view this page.';
	    include('../view/login.php');
	}

//	$valid = isValidLogin($givenusername, $givenpassword);
//	echo " // " . $valid;

?>