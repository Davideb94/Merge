<?php
session_start();
require('AuthConnection.php');

$new_email = $_POST['newmail'];

$query = "UPDATE user
            set Email = '{$new_email}'
            where ID = {$_SESSION['IDuser']};";

$result = $mysqli->query($query);
if(!$result){
    echo $mysqli->error;
}else{
    echo "ok";
}
?>