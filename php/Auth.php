<?php
session_start();
// you can't stay here if you'are not logged
if(empty($_SESSION["email"]) && empty($_COOKIE["usermerge"])){
    header("Location: ../index.php");
    exit(); 
    //secure control of login 
}else if(empty($_SESSION["email"]) && !empty($_COOKIE["usermerge"])){
    $_SESSION["email"] = $_COOKIE["usermerge"];
    exit(); 
}
?>