<?php
$user = 'root';
$pass = '';
$db = 'our event';

$conn = new mysqli('localhost', $user, $pass, $db) or die("Unable to connect");
if($conn->select_db($db) == false) {
    $create = "create database our event";
    $conn->query($create);
}


//$table  = "SELECT * FROM drop";
//$checkTable = $conn->query($table);
//if(!$checkTable){
//    $create = "CREATE TABLE drop(
//  eventID int NOT NULL,
//  userID int NOT NULL,
//  numberOfTickets int NOT NULL,
//  totlePrice decimal(10,0) NOT NULL,
//  )";
//    $ok = $conn->query($create);
//    if($ok){
//        echo "fffffffffff";
//    }
//    else{
//        echo "0000000000000000000000000000";
//    }
//
//}
?>