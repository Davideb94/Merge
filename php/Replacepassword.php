<?php
session_start();
require('../php/AuthConnection.php');
function random_password( $length = 8 ) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $password = substr( str_shuffle( $chars ), 0, $length );
    return $password;
}
$email = $mysqli->real_escape_string($_POST['email']);
$query = "Select * from user where email ='{$email}';";
$ok = $mysqli->query($query);
$ok1 = $ok->fetch_assoc();

$check = 1;
if(!is_null($ok1)){
    $pass = random_password(8);
    $newpassword = md5($pass);
    
    $query1 = "UPDATE user
                SET Password = '{$newpassword}'
                where email = '{$email}';";
    $ok = $mysqli->query($query1);
    if(!$ok){
        echo $mysqli->error;
    }else{
        $msg = "Your password was changed into {$pass}.";
      $sent = mail($email,"Password Changed.",$msg);
        if($sent){
            $check = 0;
        }
    }
    
}
 echo $check;

?>