<?php
    session_start();

    require('AuthConnection.php');
    
    $query ="Select * from file where iduser = '{$_SESSION['IDuser']}'; ";

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
    }
    

    function sizeConvert(&$size,&$type){
        if($size>1073741824){
            $type = "GB";
            $size= round($size/1073741824,2);//KB
            
        }else if($size>1048576){
            $type = "MB";
            $size= round($size/1048576,2); //MB
            
        }else{
            $type = "KB";
             $size= round($size/1024,2); //GB
        }
        
    }

    while ($row = $result->fetch_assoc()){
        $mysize = $row['Size'];
        sizeConvert($mysize,$mytype);
        $name = $row['Name'];
        $info = new SplFileInfo($name);
        $extension = $info->getExtension();
        
        $url = "./upload/{$name}";
     
        if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
               
            echo "<div class='file_card'
                    style='background-color: transparent' 
                >
					<div class='card_cover'     
                          style=' background-image: url($url);
                                       background-repeat: no-repeat;
                                       background-position: center center;
                                       background-size: auto 249px;'
                            ";
        }else{
            echo "<div class='file_card'>
					<div class='card_cover' ";
        }
                    
                        
        echo    " >
                <div class='cover_text_extension'>.".
                    $extension
                    ."<div class='cover_text_size'>".
                        $mysize
                        ."<div class='cover_text_unit'>".
                        $mytype
                        ."</div>
                    </div>
                </div>
            </div>
            <div class='card_footer'>
            <p>".
                $row['Name']
            ."</p>
            </div>
        </div>";
    }
?>