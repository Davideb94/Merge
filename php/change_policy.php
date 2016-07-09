<?php
    session_start();
    require('AuthConnection.php');

    $file = $_GET['name'];

    $query = "SELECT policy 
                FROM file
                WHERE IDuser = '{$_SESSION['IDuser']}' and reference = '{$file}';";
    
    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
    }else{
        $row = $result->fetch_assoc();
        $changed = "PUBLIC";
        if($row['policy']== 'PUBLIC'){
            $changed = 'PRIVATE';
        }
        $query = "UPDATE file
                    SET policy = '{$changed}'
                    WHERE IDuser = '{$_SESSION['IDuser']}' and reference = '{$file}';";
        $result = $mysqli->query($query);
        if(!$result){
            echo $mysqli->error;
        }else{
            echo "ok";
        }
        
    }

?>