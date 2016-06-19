<?php
session_start();
require('AuthConnection.php'); 

$contact = $_GET["q"];
$me = $_SESSION["IDuser"];

$query = "SELECT ID FROM user where email = '$contact';";
$result = $mysqli->query($query);
if(!$result){
    echo "trovato nessun contato con quel nome";
    echo $mysqli->error;
}else{
    $idcontact = $result->fetch_assoc();
    
    $query1 ="INSERT INTO contacts(iduser,idcontact) values ('$me','{$idcontact['ID']}');";
    
 
    
   
    $result1 = $mysqli->query($query1);
  	var_dump($result1);
    if(!$result1){
        echo "contatto non aggiunto".$mysqli->error;
        exit;
    }
    echo "Contatto aggiunto";
    $myname =$_SESSION["username"];
    
    $notcreate = "INSERT into notifies(who,Type,forwho) values ('$myname','Adding','{$idcontact['ID']}')";
    $result2 = $mysqli->query($notcreate);
}



?>