<?php
session_start();
session_destroy();
if(!empty($_COOKIE["usermerge"]) && !empty($_COOKIE["idusermerge"]) && !empty($_COOKIE["secure"])){
        setcookie("usermerge","",time()-60,"/",$_SERVER['SERVER_NAME'],false,true);
    setcookie("idusermerge","",time()-60,"/",$_SERVER['SERVER_NAME'],false,true);
    setcookie("secure","",time()-60,"/",$_SERVER['SERVER_NAME'],false,true);
    
    
    
}
$_SESSION["firstvisit"] = true;
header("Location: ../index.php"); // Redirecting To Home Page
?>