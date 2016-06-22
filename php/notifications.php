<?php
    session_start();

    require('AuthConnection.php');

	$user = $_SESSION['IDuser'];

	$query ="Select Who from notifies where Forwho = '{$user}'; "; //Suppongo che Forwho sia l'utente nella cui pagina viene mostrata la notifica

    $result = $mysqli->query($query);
    if(!$result){
        echo $mysqli->error;
    }
	
	$counter = 0;
 	while ( ($row = $result->fetch_assoc())&&($counter<=5) ){
		$name = $row['Who'];
		
		echo'
			<div class="notification_element">
				<div class="notification_text">
					<p><b>'.$name.'</b> added you, go check his desk!</p>
				</div>
			</div>
		';
		$counter ++;
	}
?>