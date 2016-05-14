<?php
session_start();

function Login(){
    //Server connection
    require('AuthConnection.php');
    //secure authentication
    $username = mysql_real_escape_string($_POST["username"]);
    $password = mysql_real_escape_string($_POST["password"]);
    $password=md5($password);
    //Extra control
    if(!empty($username) && !empty($password)){                
            $query = "SELECT * FROM `user` WHERE name='$username' and password='$password' ";
            $result = $mysqli->query($query);
            if(!$result){
                   $message = 'Invalid query: ' . $mysqli->error . "\n";
                    $message .= 'Whole query: ' . $query;
                    die($message);
            
            }
        
         if($result->num_rows>0){
             $_SESSION['username'] = $username;
             header("Location: secure.php"); // Redirect user to secure.php
         }else{
             echo "<div class='form'><h3>Username/password is       incorrect.</h3><br/>Click here to <a                href='index.php'>Login</a></div>";
         }
        
           
    }else{
        
        echo " non hai inserito tutti i parametri";
        
    }
    $mysqli->close();
    return;
}
Login();
?>