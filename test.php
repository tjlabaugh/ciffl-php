<?php
    require_once('model/database.php');

    // Get name for selected manager_id
    $manager_id = 1;

    $queryManagers = 'SELECT * FROM managers
                          WHERE manager_id = :manager_id';
    $statement1 = $db->prepare($queryManagers);
    $statement1->bindValue(':manager_id', $manager_id);
    $statement1->execute();
    $manager = $statement1->fetch();
    $manager_name = $manager['manager_name'];
    $statement1->closeCursor();

    // Get All Managers
    $queryAllManagers = 'SELECT * FROM managers
                            ORDER BY manager_name';
    $statement2 = $db->prepare($queryAllManagers);
    $statement2->execute();
    $managers = $statement2->fetchAll();
    $statement2->closeCursor();

    // Add Manager
    $add_id = null;
    $add_name = "Kevin";

    $query = 'INSERT INTO managers
                 (manager_id, manager_name)
              VALUES
                 (:manager_id, :manager_name)';
    $statement3 = $db->prepare($query);
    $statement3->bindValue(':manager_id', $add_id);
    $statement3->bindValue(':manager_name', $add_name);
//    $statement3->execute();
    $statement3->closeCursor();

    echo "Hello $manager_name!";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CIFFL</title>
</head>
<body>
    <div>
        <?php foreach ($managers as $manager) {
            echo $manager['manager_id'] . " | " . $manager['manager_name'] . "<br>";
        } ?>
    </div>
</body>
</html>