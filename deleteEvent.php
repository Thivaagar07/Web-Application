<?php
include "connect.php"; // connection file to database
if (isset($_POST['submit'])) {
    $id = $_POST['eventID'];
    echo $id;
    $query = "DELETE FROM events WHERE eventID = $id";
    $delete = $conn->query($query);
    if($delete){
        $message = "Listing has been successfully deleted.";
    }
    else{
        $message = "Sorry, something went wrong while deleting the listing!";
    }

    echo $message;
    header("refresh:3; url= ./adminHome.php");
}
$id = $_POST['eventID'];

$result = "SELECT eventID, eventName, eventDesc, location, eventDate, eventTime, capacity, price FROM events WHERE eventID = $id";
$select = $conn->query($result);
if ($select) {
    $row = mysqli_fetch_array($select);

    echo '
    <head>
        <meta charset="UTF-8">
        <title>Delete Event</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
		<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />

        
    </head>
    <body class="bg">
        <form method = "post" action = "" >
            <div class="container">
               
                <h3 style="font-size:40px;"> Delete Event </h3>
             
                
                <section>
                    <input type="hidden" name="eventID" value="' .$row['eventID'].'">
                    <br>
                    <p><label><span class="outputTitle">Event Title:</span>
                        <output name="title">' .$row['eventName'].'</output>
                    </label></p>
                    
                    <br>
                    <p style="text-align: center;"><label><span class="outputTitle" style="text-align: center">Description:</span><br> 
                    <textarea name="description"  rows= "5" cols= "50" disabled>'.$row['eventDesc'].'</textarea>
                    </label></p>
                    
                    <p style="text-align: center;"><label><span class="outputTitle">Address:</span><br> 
                    <textarea name="address"  rows= "5" cols= "50" disabled>'.$row['location'].'</textarea>
                    </label></p>
                    
                    <br>
                    <p><label><span class="outputTitle">Event Date:</span>
                    <output name="time"> '.$row['eventDate'].'</output>
                    </label></p>
                    
                    <br>
                    <p><label><span class="outputTitle">Event Time:</span>
                    <output name="time"> '.$row['eventTime'].'</output>
                    </label></p>
    
                    <br>
                    <p><label><span class="outputTitle">Capacity:</span>
                        <output name="capacity"/> '.$row['capacity'].'</output> person
                    </label></p>
                    
                    <br>
                    <p><label><span class="outputTitle">Price:</span>
                    <output name="price" id="price" value="'.$row['price'].'"/> '.$row['price'].' </output> RM per ticket
                    </label></p>
                    
                    <input type="submit" name="submit" class="button" value="Delete event" style="margin-left: 40%">
                </section>	
            </div>		
        </form>
    </body>
    </html>';
}
else {
    $message = "Something went wrong while reading data from the server!";
    echo "<script type='text/javascript'>alert('$message');
    </script>";
}
?>