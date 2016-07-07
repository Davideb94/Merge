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
		if(!is_null($contactsname['image'])){
            $contactsname['image'] = base64_encode($contactsname['image']);
        }
		$response[$counter] = setresponse(0, $contactsname);
		$counter++;
        
        /*
        echo "<li class='aside_element'  value='{$row['iduser']}' onclick='otherDesks(this)'>
                <img class='aside_pic' src='assets/img/user.png'/>
                <div class='aside_element_name'>".$contactsname['Name']."</div>
            </li>";
            
            */
    }
    echo json_encode($response);
?>