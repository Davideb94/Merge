<?php
session_start();
require('AuthConnection.php');

$newpass = mysql_real_escape_string($_POST["newpass"]);

    $newpass = md5($newpass);
    $query = "UPDATE user
            set Password = {$newpass}
            where ID = {$_SESSION['iduser']};";

    $result = $mysqli->query($query);
    if(!$result){
        echo "error";
    }else{
        echo "ok";
    }
?>