<?php
session_start();
require('AuthConnection.php'); 
// you can't stay here if you'are not logged
if(empty($_SESSION["username"]) && empty($_COOKIE["usermerge"])){
    header("Location: ../index.php");
    exit(); 
    //secure control of login 
}else if(empty($_SESSION["username"]) && !empty($_COOKIE["usermerge"]) && !empty($_COOKIE["idusermerge"])){
    // controllo se iduser e username corrispondono
    
    $query = "SELECT * from user where id= '{$_COOKIE["idusermerge"]}' and name = '{$_COOKIE["usermerge"]}';";
    
    $result = $mysqli->query($query);
    
    if(!$result){
        echo $mysqli->error;
    }else if($row = $result->fetch_assoc()>0){
            $secure_user = sha1($_COOKIE["usermerge"]);
            $secure_id= sha1($_COOKIE["idusermerge"]);
            $salt = "MergeProject";
            $secure_script = sha1($salt.$secure_user.$secure_id);
            if($secure_script == $_COOKIE["secure"]){
                $_SESSION["IDuser"] = $_COOKIE["idusermerge"];
                $_SESSION["username"] = $_COOKIE["usermerge"];
                header("Location: main.php");  
            }else{
                header("Location: ../index.php");
            }
                  
    }else{
         header("Location: ../index.php");
    }
}
?>