<?php
	session_start();

    require('AuthConnection.php');
	
	$user = $_SESSION['IDuser'];
	$id = $_GET['contact'];

	$query = " DELETE FROM contacts WHERE IDuser = '{$user}' AND IDcontact = '{$id}' ";
	$result = $mysqli->query($query);
	if(!$result){
        echo $mysqli->error;
    }

	echo "ok";
?>