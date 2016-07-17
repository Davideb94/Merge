<?php
    session_start();
    require('AuthConnection.php');

    if(!empty($_FILES)){
       
        $counter =  sizeof($_FILES);
        for ($i = 0; $i<$counter;$i++){
            if($_FILES['file'.$i]['error']== 0){
                $reference = rand(1000,100000)."-".$_FILES['file'.$i]['name'];
                $query ="INSERT INTO file (Size,Type,Name,IDuser,reference,policy) values('{$_FILES['file'.$i]['size']}','{$_FILES['file'.$i]['type']}','{$_FILES['file'.$i]['name']}','{$_SESSION['IDuser']}','$reference','PUBLIC');";
                
                $mysqli->query($query);
                
                if($mysqli->error){
                    echo $mysqli->error;
                    
                }
                $file_loc = $_FILES['file'.$i]['tmp_name'];
                $folder="../upload/";
                move_uploaded_file($file_loc,$folder.$reference);
                //thumbnail creation
                $extension = pathinfo($folder.$reference, PATHINFO_EXTENSION);
                if($extension=="jpeg" || $extension=="png" || $extension=="jpg"){
                    $size = 0.45; 
                    list($width, $height) = getimagesize($folder.$reference); 
                    $modwidth = $width * $size; 
                    $modheight = $height * $size; 
                    $tn= imagecreatetruecolor($modwidth, $modheight); 
                    if($extension=="jpeg"|| $extension=="jpg"){
                        $source = imagecreatefromjpeg($folder.$reference); 
                    }else{
                        $source = imagecreatefrompng($folder.$reference);
                    }
                    imagecopyresized($tn, $source, 0, 0, 0, 0, $modwidth, $modheight,$width, $height); 

                    imagejpeg($tn,"../thumbnails/".$reference,100);
                }
            }
            
        }
        echo "ok";
    }else{
        echo "trasmission error";
        
    }


?>