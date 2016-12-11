<?php
	echo "Hello";

	$givenusername = filter_input(INPUT_POST, 'username');
	$givenpassword = filter_input(INPUT_POST, 'password');

	echo " " . $givenusername;
	echo " " . $givenpassword . " ";

	function isValidLogin($givenusername, $givenpassword) {
		include('database.php');
	//  $password = sha1($email . $password);
	    $query = 'SELECT admin_id FROM admin
	              WHERE username = :username AND password = :password';
	    $statement = $db->prepare($query);
	    $statement->bindValue(':username', $givenusername, PDO::PARAM_STR);
	    $statement->bindValue(':password', $givenpassword, PDO::PARAM_STR);
	    $statement->execute();
	    $valid = ($statement->rowCount() == 1);
	    $statement->closeCursor();
	    return $valid;
	}

	$valid = isValidLogin($givenusername, $givenpassword);
	echo " // " . $valid;

?>