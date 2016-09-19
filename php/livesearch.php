<?php
session_start();
require('../php/AuthConnection.php'); 
require('ajaxresponse.php');
$q =  $mysqli->real_escape_string($_GET["q"]);

if($q!= '@' && $q!= '.'){
    
    //control
    $query = "Select Name,Email,image from user where email LIKE '%$q%' and id<>'{$_SESSION['IDuser']}' and id not in (
        Select IDcontact 
        from contacts
        where IDuser = {$_SESSION['IDuser']}
    )
    limit 6;";
    $result = $mysqli->query($query);
    if(!$result){
       echo $mysqli->error;
        exit;
    }
    $array = array();
    
    $counter = 0;
    
    while($row=$result->fetch_assoc()){        
        $array[$counter] = setresponse(0,$row);
        $counter++;
    }
    echo json_encode($array);
}
?> 