<?php
    session_start();

    require('AuthConnection.php');
    require('ajaxresponse.php');
    $query = "Select image from user where id = '{$_SESSION['IDuser']}'";

    $result = $mysqli->query($query);
    
    if(!$result){
        echo $mysqli->error;
    }else{
        $row = $result->fetch_assoc();
        $row['username'] = $_SESSION['username'];
        if(!is_null($row['image'])){
            $row['image'] = base64_encode($row['image']);
        }
        
        $response = setresponse(0,$row);
        
        echo json_encode($response);
    }

?>