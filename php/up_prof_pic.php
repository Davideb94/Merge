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
                move_uploaded_file($file_loc,$folder."x".$reference);
                 // This sets it to a .jpg, but you can change this to png or gif 
                header('Content-type: image/jpeg'); 
                
                 // Setting the resize parameters
                list($width, $height) = getimagesize($folder."x".$reference); 
                 // Creating the Canvas 
                $tn= imagecreatetruecolor(100, 100); 
                
                $info = getimagesize($folder."x".$reference);
                $extension = image_type_to_extension($info[2]);
                if($extension == ".jpeg" || $extension == ".jpg"){
                    $source = imagecreatefromjpeg($folder."x".$reference); 
                }else{
                    $source = imagecreatefrompng($folder."x".$reference);
                }
                

                 // Resizing our image to fit the canvas 
                imagecopyresized($tn, $source, 0, 0, 0, 0, 100, 100,$width, $height); 

                 // Outputs a jpg image, you could change this to gif or png if needed 
                imagejpeg($tn,"../profile_pic/".$reference,100);
                unlink($folder."x".$reference);
                echo "ok";
              
    }else{
        echo "trasmission error";
        
    }


?>