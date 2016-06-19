<?php
	session_start();

    require('AuthConnection.php');
	
	$user = $_SESSION['IDuser'];
	$name = $_GET['name'];

	$query = " DELETE FROM file WHERE reference = '{$name}' AND IDuser = '{$user}' ";
	$result = $mysqli->query($query);
	if(!$result){
        echo $mysqli->error;
    }

	unlink("../upload/".$name);

	echo $name;
?>