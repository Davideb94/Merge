<?php
session_start();
require('AuthConnection.php'); 
require('ajaxresponse.php');

    $id = $_SESSION["IDuser"];
    $query = "Select  iduser from contacts where  IDcontact= '$id' ;";

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
        exit;
    }

    $response = array();
    $counter = 0;
    while($row = $result->fetch_assoc()){
        $query1 = "SELECT Name,email,image,ID from user where ID = '{$row['iduser']}'; ";
        $contactsname = $mysqli->query($query1);
        $contactsname = $contactsname->fetch_assoc();
		$response[$counter] = setresponse(0, $contactsname);
		$counter++;
    }
    echo json_encode($response);
?>