<?php
session_start();
require('AuthConnection.php'); 
require('ajaxresponse.php');
 //printing your file
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

    //Authorization control
    $myid = $_SESSION['IDuser'];
    $otherdesk = $_POST['str'];

    $secure = "SELECT * from contacts where IDuser ='$otherdesk' and idcontact ='$myid' ; ";
    
    $result0 = $mysqli->query($secure);
    if(!$result0){
        echo $mysqli->error;
    }
    $result0=$result0->fetch_assoc();
    if($result0 == 0){
        echo "YOU HAVE NOT AUTHORIZATION TO SEE THIS!";
        exit;       
    }
      $query ="Select * from file where iduser = '{$otherdesk}' and policy = 'PUBLIC'; ";

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
    }

    $array = array();
    $counter = 0;
    while ($row = $result->fetch_assoc()){
        
        sizeConvert($row['Size'],$mytype);
        $name = $row['reference'];
        $row['info'] = new SplFileInfo($name);
        $row['info'] = $row['info']->getExtension();
        
        $row['dim'] = $mytype;
        $array[$counter] = setresponse(0,$row);
        $counter++;
        
        /*
        $mysize = $row['Size'];
        sizeConvert($mysize,$mytype);
        $name = $row['reference'];
        $info = new SplFileInfo($name);
        $extension = $info->getExtension();
        
        $url = '"./upload/'.$name.'"';
        $url_download = 'upload/'.$name;
        if($extension == "png" || $extension == "jpeg" || $extension == "jpg"){
               
            echo "	<div class='file_card'
                    style='background-color: transparent' 
                	>
					<div class='card_hover'>
						<a href='$url_download' download>
							<div class='card_download' name='$name' onclick='downloadFile(this)'>
								<img class='download_icon' src='./assets/img/download.png'>
							</div>
						</a>
					</div>
					<div class='card_cover'     
                          style='  background-image: url($url);
								   background-repeat: no-repeat;
								   background-position: center center;
								   background-size: auto 249px;'
                  ";
        }else{
            echo "<div class='file_card'>
					<div class='card_cover' ";
        }
                    
                        
        echo    "   >
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
        $counter = $counter + 1;
        */
    }
    echo json_encode($array);
?>