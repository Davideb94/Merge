<?php
 session_start();
require('AuthConnection.php'); 
if(!empty($_GET['name'])){
    $name = $_GET['name'];
    $path = "../upload/".$_GET['name'];
    
    $query3 = "Select Type from file where reference='{$name}';";
    $result3 = $mysqli->query($query3);
    $type = $result3->fetch_assoc();
    header("Cache-Control: public");
    header("Content-Description: File Transfer");
    header("Content-Disposition: attachment; filename= '{$name}'");
    header("Content-Transfer-Encoding: binary"); 
    header("Content-Type: {$type['Type']}");
    readfile("{$path}");
}else{
    header("Location: /main.php"); 
    exit();
}
?>