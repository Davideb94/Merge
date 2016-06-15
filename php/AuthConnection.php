<?php

// server connection
$mysqli = new mysqli("Localhost","Merge_user","merge","merge");

if($mysqli->connect_error){
    die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
}
    
?>