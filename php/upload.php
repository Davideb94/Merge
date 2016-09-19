<?php
    session_start();
    require('AuthConnection.php'); 
    if(!empty($_FILES)){
        $counter =  sizeof($_FILES);
        for ($i = 0; $i<$counter;$i++){
            if($_FILES['file'.$i]['error']== 0){
                                
                 //space occupied control
                if($_FILES['file'.$i]['type'] == "application/octet-stream"){
                    echo "Impossible to upload this type of file.";
                    
                }else{

                $query3 = "Select space_occupied from user where ID='{$_SESSION['IDuser']}';";

                $result3 = $mysqli->query($query3);

                if(!$result3){
                    echo $mysqli->error;

                }else{
                    $permission = $result3->fetch_assoc();
                    $ok = $permission['space_occupied'];

                }
                if($ok+$_FILES['file'.$i]['size']>=1073741824){
                    echo "max_space_reached";
                    exit();
                }
                
                $file_name = $mysqli->real_escape_string($_FILES['file'.$i]['name']);
                $reference = rand(1000,100000)."-".$file_name;
                $query ="INSERT INTO file (Size,Type,Name,IDuser,reference,policy) values('{$_FILES['file'.$i]['size']}','{$_FILES['file'.$i]['type']}','{$file_name}','{$_SESSION['IDuser']}','$reference','PUBLIC');";
                $mysqli->query($query);
                
                if($mysqli->error){
                    echo $mysqli->error;
                    exit();
                    
                }
                $file_loc = $_FILES['file'.$i]['tmp_name'];
                $folder="../upload/";
                move_uploaded_file($file_loc,$folder.$reference);
                //thumbnail creation
                $extension = pathinfo($folder.$reference, PATHINFO_EXTENSION);
                echo $extension;
                if($extension=="jpeg" || $extension=="png" || $extension=="jpg"){
                    $size = 0.20; 
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
            }else{
                echo "error";
            }
            
            
        }
        echo "ok";
    }else{
        echo "trasmission error";
        
    }


?>