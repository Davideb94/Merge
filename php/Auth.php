<?php
session_start();
// you can't stay here if you'are not logged
if(empty($_SESSION["username"]) && empty($_COOKIE["usermerge"])){
    header("Location: ../index.php");
    exit(); 
    //secure control of login 
}else if(!empty($_COOKIE["usermerge"]) && !empty($_COOKIE["idusermerge"])){
    $_SESSION["IDuser"] = $_COOKIE["idusermerge"];
    $_SESSION["username"] = $_COOKIE["usermerge"];
}
?>