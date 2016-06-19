<?php
    session_start();
    require('AuthConnection.php');

    if(!empty($_FILES)){
       
        $counter =  sizeof($_FILES);
        for ($i = 0; $i<$counter;$i++){
            if($_FILES['file'.$i]['error']== 0){
                
                $query ="INSERT INTO file (Size,Type,Name,IDuser) values('{$_FILES['file'.$i]['size']}','{$_FILES['file'.$i]['type']}','{$_FILES['file'.$i]['name']}','{$_SESSION['IDuser']}');";
                
                $mysqli->query($query);
                
                if($mysqli->error){
                    echo $mysqli->error;
                    
                }
                $file = $_FILES['file'.$i]['name'];
                $file_loc = $_FILES['file'.$i]['tmp_name'];
                $folder="../upload/";
                move_uploaded_file($file_loc,$folder.$file);
            }
            
        }
        
        
        
    }else{
        echo "trasmission error";
        
    }


?>