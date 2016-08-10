<?php
session_start();
require('AuthConnection.php');

    //cascading for files
    $query = " SELECT reference FROM file where IDuser = '{$_SESSION['IDuser']}' ";
    $result = $mysqli->query($query);
    
    if(!$result){
        echo $mysqli->error;
        echo "error";
    }else{
        while($row = $result->fetch_assoc()){
            unlink("../upload/".$row['reference']);

            $queryref = " DELETE FROM file where reference = '{$row['reference']}' ";
            $result1 = $mysqli->query($queryref);
             if(!$result1){
                echo $mysqli->error;
                exit;
            }else{
                echo "ok";
    }
        }

    }
    //cascading for concacts
    $query2 = "DELETE FROM contacts where IDuser = {$_SESSION['IDuser']} or IDcontact = {$_SESSION['IDuser']};";

    $result = $mysqli->query($query2);

    if(!$result){
        echo $mysqli->error;
        exit;
    }else{
        echo "ok";
    }
    //cascading for notifications
    $query3 = "DELETE FROM notifications where Forwho = {$_SESSION['IDuser']};";

    $result = $mysqli->query($query3);

    if(!$result){
        echo $mysqli->error;
        exit;
    }else{
        echo "ok";
    }
    //DELETING USER
    $query1 = "DELETE FROM user where id = {$_SESSION['IDuser']};";

    $result = $mysqli->query($query1);

    if(!$result){
        echo $mysqli->error;
        exit;
    }else{
        echo "ok";
    }
    session_destroy();
    $_SESSION["firstvisit"] = true;
    setcookie("usermerge","",time()-60,"/",$_SERVER['SERVER_NAME'],false,true);
    setcookie("idusermerge","",time()-60,"/",$_SERVER['SERVER_NAME'],false,true);
?>