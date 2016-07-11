<?php

session_start();
require('AuthConnection.php');

$new_nickname = $_POST['newnick'];

$query = "UPDATE user
            set Name = '{$new_nickname}'
            where ID = {$_SESSION['IDuser']};";

$result = $mysqli->query($query);
if(!$result){
    echo $mysqli->error;
}else{
    echo "ok";
}

$_SESSION['username'] = $new_nickname;
setcookie("usermerge",$new_nickname,time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
?>