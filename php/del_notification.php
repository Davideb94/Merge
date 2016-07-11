<?php
session_start();
require('AuthConnection.php'); 


$not = $_POST['IDnot'];

$query = "DELETE FROM notifies
            where Who = '{$not}' and Forwho = '{$_SESSION['IDuser']}';";

$result = $mysqli->query($query);

if(!$result){
    echo $mysqli->error;
}else{
    echo "ok";
}

?>