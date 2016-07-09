<?php
    session_start();
    require('AuthConnection.php');

    if(!empty($_FILES) && $_FILES['file']['error']== 0){
                $reference = rand(1000,100000)."-".$_FILES['file']['name'];
                //controll
        
                $query = "SELECT image from user where ID = {$_SESSION['IDuser']};";
                    
                $result = $mysqli->query($query);
                
                if(!$result){
                    echo $mysqli->error;
                    
                }
                $row = $result->fetch_assoc();
                if(!is_null($row['image'])){
                   unlink("../profile_pic/".$row['image']);
                }
        
                $query ="UPDATE user
                    SET image = '$reference'
                    where ID = {$_SESSION['IDuser']};";
                
                $mysqli->query($query);
                
                if($mysqli->error){
                    echo $mysqli->error;
                    
                }
                $file_loc = $_FILES['file']['tmp_name'];
                $folder="../profile_pic/";
                move_uploaded_file($file_loc,$folder.$reference);
                echo "ok";
              
    }else{
        echo "trasmission error";
        
    }


?>