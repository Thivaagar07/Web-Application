<?php
include "connect.php"; // connection file to database

$id = $_POST['eventID'];

$result = "SELECT eventName, eventDesc, location, eventDate, eventTime, capacity, price FROM events WHERE eventID = $id";
$select = $conn->query($result);
if ($select) {
    $row = mysqli_fetch_array($select);
    echo '
    <head>
        <meta charset="UTF-8">
        <title>Your Franchise view</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
		<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
       
        
    </head>
    <body class="bg">
        <form method = "post" action = "likedEvents.php" >
            <div class="container">
              
                <h1> User Choosen Franchise </h1>
           
                
                <section>
                    <br>
                    <p><label><span class="outputTitle">Franchisers:</span>
                        <output name="title">' .$row['eventName'].'</output>
                    </label></p>
                    
                    <br>
                    <p style="text-align: center;"><label><span class="outputTitle" style="text-align: center">Description:</span><br> 
                    <textarea name="description"  rows= "5" cols= "50" disabled>'.$row['eventDesc'].'</textarea>
                    </label></p>
                    
                    <p style="text-align: center;"><label><span class="outputTitle">Location:</span><br> 
                    <textarea name="address"  rows= "5" cols= "50" disabled>'.$row['location'].'</textarea>
                    </label></p>
                    
                    <br>
                    <p><label><span class="outputTitle">Franchise Contact:</span>
                    <output name="time"> '.$row['eventDate'].'</output>
                    </label></p>
                    
                    <br>
                    <p><label><span class="outputTitle">Franchise Image:</span>
                    <output name="time"> '.$row['eventTime'].'</output>
                    </label></p>
    
                    <br>
                    <p><label><span class="outputTitle">Rating:</span>
                        <output name="capacity"/> '.$row['capacity'].'</output> person
                    </label></p>
                    
                    <br>
                    <p><label><span class="outputTitle">Price:</span>
                    <output name="price" id="price" value="'.$row['price'].'"/> '.$row['price'].' </output> RM per ticket
                    </label></p>
                   
                </section>	
            </div>		
        </form>
    </body>
    </html>';
}
else {
    $message = "Sorry, something went wrong while reading data from the server!";
    echo "<script type='text/javascript'>alert('$message');</script>";
}
?>