<?php
    session_start();

    require('AuthConnection.php');
    require('ajaxresponse.php');
    $query ="Select * from file where iduser = '{$_SESSION['IDuser']}'; ";

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
    }
    

    function sizeConvert(&$size,&$type){
        if($size>1073741824){
            $type = "GB";
            $size= round($size/1073741824,2);
            
        }else if($size>1048576){
            $type = "MB";
            $size= round($size/1048576,2);
            
        }else{
            $type = "KB";
             $size= round($size/1024,2);
        }
        
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
    }
    echo json_encode($array);

?>