<?php 
session_start();

function registration(){
    //include server connection
    require('AuthConnection.php');
    
    //inizialization var
    $username = mysql_real_escape_string($_POST["username"]);
    $password = mysql_real_escape_string($_POST["password"]);
    $email = mysql_real_escape_string($_POST["email"]);
    $confirm_pass = mysql_real_escape_string($_POST["confirm_pass"]);
    
    // extra control for inputs
    if(!empty($username) && !empty($password) && !empty($email) && !empty($confirm_pass)){   
        
        //password control
        if($confirm_pass != $password){
            echo "scrittura password errata";
        }else{
            //Sign up query
            $password=md5($password);
            $query = "INSERT INTO USER (Name,Password,Email) values ('$username','$password','$email');";
            $result = $mysqli->query($query);
            
            //error control
            if(!$result){
                   $message = 'Invalid query: ' . $mysqli->error . "\n";
                    $message .= 'Whole query: ' . $query;
                    die($message);
            
            }else{
                $_SESSION['username'] = $username;
                header("Location: secure.php");
                
            }
        }
    }else{
        
        echo " non hai inserito tutti i parametri";
        
    }
    $mysqli->close();
    return;
}
registration();
?>