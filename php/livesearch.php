<?php
session_start();
require('../php/AuthConnection.php'); 
require('ajaxresponse.php');
$q =  mysql_real_escape_string($_GET["q"]);

if($q!= '@' && $q!= '.'){
    
    //control
    $query = "Select Name,Email,image from user where email LIKE '%$q%' and id<>'{$_SESSION['IDuser']}' and id not in (
        Select IDcontact 
        from contacts
        where IDuser = {$_SESSION['IDuser']}
    )
    limit 6;";
    $result = $mysqli->query($query);
    if(!$result){
       echo $mysqli->error;
        exit;
    }
    $array = array();
    
    $counter = 0;
    
    while($row=$result->fetch_assoc()){
        
        if(!is_null($row['image'])){
            $row['image'] = base64_encode($row['image']);
        }
        
        $array[$counter] = setresponse(0,$row);
        
        /*
        $email = $row["Email"];        
        $hint = $hint."<div class='searched_elem' value='$email' onmousedown='addpeople(event,this)'>
                            <div class='profile_pic'>
							<img class='searched_pic'";
        if(!empty($row['image'])){
            $image = $row['image'];
            $hint = $hint."src='data:image/jpeg;base64,". base64_encode($image) ."'/>";
            
        }else{
            $image = "assets/img/user.png";
            $hint = $hint."src='$image'/>";
        }
        $hint = $hint."   </div> <div class='searched_name'>
                                <div class='searched_username'>".$row['Name']."</div>
                                <div class='searched_email'>".$email."</div>
                            </div>
				        </div>";
                        
                        
        */
        $counter++;
    }
    /*
    if($hint == ""){
        $hint = "<div class='aside_element'>
                            <p>No result accoured</p>
				</div>";
    }
    echo $hint;*/
    echo json_encode($array);
}
?> 