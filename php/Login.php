<?php
session_start();

function Login(){
    //Server connection
    require('AuthConnection.php');
   
    //Extra control
    if(!empty($_POST["Lemail"]) && !empty($_POST["Lpassword"])){            //secure authentication
            $email = mysql_real_escape_string($_POST["Lemail"]);
            $password = mysql_real_escape_string($_POST["Lpassword"]);
            $password=md5($password);
            //query for start session
            $query = "SELECT Name,ID FROM `user` WHERE email='$email' and password='$password'; ";
        
            $result = $mysqli->query($query);
            if(!$result){
                   $message = 'Invalid query: ' . $mysqli->error . "\n";
                    $message .= 'Whole query: ' . $query;
                    echo $message;
                exit;
                
            }else if($result->num_rows>0){
             $username = $result->fetch_assoc();
             $_SESSION["email"] = $email;
             $_SESSION["username"] = $username["Name"];
             $_SESSION["IDuser"] = $username["ID"];
           if($_POST["keep_login"]){
               setcookie("usermerge",$username["Name"],time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
               setcookie("idusermerge",$username["ID"],time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
               
               
               $secure_user = sha1($username["Name"]);
               $secure_id= sha1($username["ID"]);
               $salt = "MergeProject";
               $secure_script = sha1($salt.$secure_user.$secure_id); setcookie("secure",$secure_script,time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
               
           } 
            header("Location: ../main.php"); // Redirect user to secure.php
         }else{
             echo "<div class='form'><h3>Username/password is       incorrect.</h3><br/>Click here to <a                href='../index.php'>Login</a></div>";
         }
        
           
    }else{
        
        echo " non hai inserito tutti i parametri";
        
    }
    $mysqli->close();
    return;
}
Login();
?>