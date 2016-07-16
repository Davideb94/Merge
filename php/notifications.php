<?php
    session_start();

    require('AuthConnection.php');
    require('ajaxresponse.php');
	$user = $_SESSION['IDuser'];
    //fetch notification
	$query ="Select Who from notifications where Forwho = '{$user}'; "; 

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
    }
	$array = array();  
	$counter = 0;
 	while ($row = $result->fetch_assoc()){
        //fetch names
        $query ="Select Name from user where ID = '{$row['Who']}'; "; 

        $result1 = $mysqli->query($query);
        if(!$result1){
            echo $mysqli->error;
        }
        $name = $result1->fetch_assoc();
        
        $packet = array();
        
        $packet['Name']= $name['Name'];
        $packet['ID']= $row['Who'];
        
		$array[$counter] = setresponse(0,$packet);
		$counter++;
	}
    $response = setresponse(0,$array);

    echo json_encode($response);
?>