<?php
session_start();
require('AuthConnection.php'); 

    $id = $_SESSION["IDuser"];
    $query = "Select IDcontact from contacts where iduser = '$id' ;";

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
        exit;
    }
    while($row = $result->fetch_assoc()){
        $query1 = "SELECT Name,email from user where ID = '{$row['IDcontact']}'; ";
        $contactsname = $mysqli->query($query1);
        $contactsname = $contactsname->fetch_assoc();
        echo 	"<li class='aside_element'  value='{$contactsname["Name"]}'>
                <img class='aside_pic' src='assets/img/user.png'/>
                <div class='aside_element_name'>".$contactsname['Name']."</div>
            </li>";
    }
?>