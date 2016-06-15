<?php 
session_start();

function registration(){
    //include server connection
    require('AuthConnection.php'); 
    // extra control for inputs
    if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["confirm_pass"])){   
        //inizialization var
        $username = mysql_real_escape_string($_POST["username"]);
        $password = mysql_real_escape_string($_POST["password"]);
        $email = mysql_real_escape_string($_POST["email"]);
        $confirm_pass = mysql_real_escape_string($_POST["confirm_pass"]);
        
        
        //password control
        if($confirm_pass != $password){
            echo "scrittura password errata";
        }else{
            //Sign up query
            $password=md5($password);
            $query = "INSERT INTO USER (Name,Password,Email) values ('$username','$password','$email');";
            $result = $mysqli->query($query);
            if(!$result){
                   $message = 'Invalid query: ' . $mysqli->error . "\n";
                    $message .= 'Whole query: ' . $query;
                    die($message);
            
            }
            
            
            $query1 = "SELECT ID FROM `user` WHERE email='$email' and password='$password' ";
            
           $result1 = $mysqli->query($query1);
            
            
            //error control
            if(!$result1){
                   $message = 'Invalid query: ' . $mysqli->error . "\n";
                    $message .= 'Whole query: ' . $query;
                    die($message);
            
            }else{
                $id= $result1->fetch_assoc();
                $_SESSION["email"] = $email;
                $_SESSION['username'] = $username;
                $_SESSION["IDuser"] = $id; setcookie("usermerge",$username,time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
                setcookie("idusermerge",$id,time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
                header("Location: ./main.php");
                
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