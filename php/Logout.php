<?php
session_start();
session_destroy();
setcookie("usermerge","",time()-60,"/",$_SERVER['SERVER_NAME'],false,true);
setcookie("idusermerge","",time()-60,"/",$_SERVER['SERVER_NAME'],false,true);
header("Location: ../index.php"); // Redirecting To Home Page
?>