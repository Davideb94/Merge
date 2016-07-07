<?php
    session_start();
    require('AuthConnection.php');

    if(!empty($_FILES) && $_FILES['file']['error']== 0){
                $reference = rand(1000,100000)."-".$_FILES['file']['name'];
                $query ="INSERT INTO user (image) values('$reference');";
                
                $mysqli->query($query);
                
                if($mysqli->error){
                    echo $mysqli->error;
                    
                }
                $file_loc = $_FILES['file']['tmp_name'];
                $folder="../profile_pic/";
                move_uploaded_file($file_loc,$folder.$reference);
    }else{
        echo "trasmission error";
        
    }


?>