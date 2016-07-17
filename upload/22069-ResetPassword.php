<?php
session_start();
require('AuthConnection.php');

    
    $oldpass = mysql_real_escape_string($_POST["oldpass"]);
   
    $oldpass = md5($oldpass);
    $query = "SELECT Password from user where ID = {$_SESSION['IDuser']}";
    $result = $mysqli->query($query);

    if(!$result){
        echo "error";
    }else{
        $row = $result->fetch_assoc();
        if($row['Password']==$oldpass){
            $newpass = mysql_real_escape_string($_POST["newpass"]);
            $newpass = md5($newpass);
            $query = "UPDATE user
            set Password = '{$newpass}'
            where ID = '{$_SESSION['IDuser']}';";

            $result1 = $mysqli->query($query);
            if(!$result1){
                echo $mysqli->error;
            }
        }else{
            echo "error match";
        }
    }
    
    
?>