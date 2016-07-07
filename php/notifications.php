<?php
    session_start();

    require('AuthConnection.php');
    require('ajaxresponse.php');
	$user = $_SESSION['IDuser'];

	$query ="Select Who from notifies where Forwho = '{$user}'
            limit 5; "; //Suppongo che Forwho sia l'utente nella cui pagina viene mostrata la notifica

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
    }
	$array = array();
	$counter = 0;
 	while ($row = $result->fetch_assoc()){
        
		$array[$counter] = $row['Who'];
        /*
		echo'
			<div class="notification_element">
				<div class="notification_text">
					<p><b>'.$name.'</b> added you, go check his desk!</p>
				</div>
			</div>
		';*/
		$counter++;
	}
    $response = setresponse(0,$array);

    echo json_encode($response);
?>