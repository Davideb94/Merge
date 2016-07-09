<?php
session_start();
require('AuthConnection.php');
require('ajaxresponse.php');

$query = "SELECT * FROM user WHERE ID = {$_SESSION['IDuser']};";

$result = $mysqli->query($query);

if(!$result){
    echo $mysqli->error;
}else{
    $row = $result->fetch_assoc();
    $response = setresponse(0,$row);    
    echo json_encode($response);
}

?>