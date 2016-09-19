<?php 
session_start();

function registration(){
    //include server connection
    require('AuthConnection.php'); 
    
    //max number of users control
    
    $query = "Select count(*) as number from user;";
    
    $result = $mysqli->query($query);
    
    if(!$result){
        echo $mysqli->error;
        exit();
    }
    
    $number = $result->fetch_assoc();
    
    if($number['number']>=90){
        echo "Ops... we've reached the maximum amount of accounts we can handle at the moment. Wait for someone to fund Merge.";
        exit();
    }
    // extra control for inputs
    if(!empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["email"]) && !empty($_POST["confirm_pass"])){   
        //inizialization var
        $username = $mysqli->real_escape_string($_POST["username"]);
        $password = $mysqli->real_escape_string($_POST["password"]);
        $email = $mysqli->real_escape_string($_POST["email"]);
        $confirm_pass = $mysqli->real_escape_string($_POST["confirm_pass"]);
        
        
        //password control
        if($confirm_pass != $password){
            echo "scrittura password errata";
        }else{
            //Sign up query
            $password=md5($password);
            $query = "INSERT INTO user (Name,Password,Email) values ('$username','$password','$email');";
            $result = $mysqli->query($query);
            if(!$result){
                echo('This profile already exists. Please, try to sign up with a different mail - <a href="../index.php">Home</a>');
				exit();
            
            }
            
            
            $query1 = "SELECT ID FROM `user` WHERE email='$email' and password='$password' ";
            
           $result1 = $mysqli->query($query1);
            
            
            //error control
            if(!$result1){
                   echo $mysqli->error;
                    exit();
            
            }else{
                $id= $result1->fetch_assoc();
                $_SESSION["email"] = $email;
                $_SESSION['username'] = $username;
                $_SESSION["IDuser"] = $id['ID']; setcookie("usermerge",$username,time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
                setcookie("idusermerge",$id['ID'],time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
                $msg = "Hi,you registered successfully.";
               mail($email,"Registration Accomplished",$msg);
                
                
                
               $secure_user = sha1($username);
               $secure_id= sha1($id['ID']);
               $salt = "MergeProject";
               $secure_script = sha1($salt.$secure_user.$secure_id); setcookie("secure",$secure_script,time()+84600,"/",$_SERVER['SERVER_NAME'],false,true);
                header("Location: ../main.php");
                
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