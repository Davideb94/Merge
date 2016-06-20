<?php
    session_start();

    require('AuthConnection.php');
    
    $query = "Select image from user where id = '{$_SESSION['IDuser']}'";

    $result = $mysqli->query($query);
    
    if(!$result){
        echo $mysqli->error;
    }else{
        $row = $result->fetch_assoc();
        
        
        if(is_null($row['image'])){
            echo "<span class='ident'>
                    <div class='vertical_center'></div>
						<div class='vertical_center'>
							<a href='#'>
								<img id='ident_pic' src='assets/img/user.png' />
							</a>
						</div>
						<div class='vertical_center'></div>";            
        }else{
              echo "<span class='ident'>
                    <div class='vertical_center'></div>
						<div class='vertical_center'>
							<a href='#'>
								<img id='ident_pic' src='data:image/jpeg;base64,". base64_encode($row['image'])."'/>"."
							</a>
						</div>
						<div class='vertical_center'></div>";   
            
        }
        
        echo "</span>
                <span class='ident'>
                <div class='vertical_center'></div>
						<div class='vertical_center' id='ident_name'><p>".
                            $_SESSION['username']
						."</p></div>
						<div class='vertical_center'></div>
                </span>"; 
        echo "</li>";
        
    }
    



?>