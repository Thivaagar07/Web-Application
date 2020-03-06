<?php
include "connect.php"; // connection file to database

$userID = $_POST["userID"];
$eventID = $_POST["eventID"];
$totalPrice = $_POST["finalPrice"];
$noOfTickets = $_POST["tickets"];
$capacity = $_POST["capacity"];
$newCapacity = $capacity - $noOfTickets;
$result = "INSERT INTO ticketing (eventID, userID, numberOfTickets, TotalPrice) VALUES ({$conn->real_escape_string($eventID)}, {$conn->real_escape_string($userID)}, 
    {$conn->real_escape_string($noOfTickets)}, {$conn->real_escape_string($totalPrice)})";
$insert = $conn->query($result);

if ($insert) {
    $query = "UPDATE events SET capacity= $newCapacity WHERE eventID= $eventID";
    $update = $conn->query($query);
    if($update)
        $message = "Your application have been successfully sent! Your application ID is {$conn->insert_id}";
   
    else 
        $message = "Sorry, we were unable to update your application!";
    
    }
 else {
    $message = "Sorry, you have already submitted your application!";
  
}

echo $message;

header("refresh:3; url=./event.php?userID= $userID");



?>