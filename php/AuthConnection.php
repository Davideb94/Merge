<?php

// server connection
$mysqli = new mysqli("Localhost","Sign_up_user","Signup","merge");

if($mysqli->connect_error){
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
    
?>