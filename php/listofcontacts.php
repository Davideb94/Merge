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
        $query1 = "SELECT Name,email,image from user where ID = '{$row['IDcontact']}'; ";
        $contactsname = $mysqli->query($query1);
        $contactsname = $contactsname->fetch_assoc();
        $image = $contactsname["image"];
        echo 	"<li class='aside_element people_element' value='{$contactsname["Name"]}'>";
            if(is_null($image)){
                echo "<img class='aside_pic' src='assets/img/user.png'/>";
            }else{
               echo "<img class='aside_pic' src='data:image/jpeg;base64,". base64_encode($image)."'/>";
                
            }
			echo "<div class='aside_element_name'>".$contactsname['Name']."</div>
            	</li>";
    }
?>