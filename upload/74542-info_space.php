<?php
session_start();
require('AuthConnection.php');
$query = "SELECT sum(size) as size from file where IDuser= {$_SESSION['IDuser']};";

$result = $mysqli->query($query);
if(!$result){
    echo "error";
    
}else{
    $value = $result->fetch_assoc();
    echo  $size = 100 - round($value['size']/1073741824,2);

}
?>