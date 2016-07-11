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
        
        /*query for number*/
        $not_query = "SELECT COUNT(*) as number
                        FROM notifies
                        WHERE ForWho = '{$_SESSION['IDuser']}'; ";
        
        $num_not = $mysqli->query($not_query);
        if(!$num_not){
            echo $mysqli->error;
            exit;
        }
        $number = $num_not->fetch_assoc();
        
        /* ------*/
        $row['number'] = $number['number'];
        $response = setresponse(0,$row);
        
        echo json_encode($response);
    }

?>