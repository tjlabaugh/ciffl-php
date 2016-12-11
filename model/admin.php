<?php
	function add_admin($email, $password) {
	    global $db;
	    $password = sha1($email . $password);
	    $query = 'INSERT INTO administrators (emailAddress, password)
	              VALUES (:email, :password)';
	    $statement = $db->prepare($query);
	    $statement->bindValue(':email', $email);
	    $statement->bindValue(':password', $password);
	    $statement->execute();
	    $statement->closeCursor();
	}
?>