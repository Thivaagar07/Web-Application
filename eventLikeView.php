<?php
include "connect.php"; // connection file to database

$id = $_POST['eventID'];
$totalPrice = $_POST['TotalPrice'];
$noOfTickets = $_POST['numberOfTickets'];
$result = "SELECT eventName, eventDesc, location, eventDate, eventTime, capacity, price FROM events WHERE eventID = $id";
$select = $conn->query($result);




if ($select) {
    $row = mysqli_fetch_array($select);
    echo '

    <head>
        <meta charset="UTF-8">
        <title>liked event view</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
		<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
        <script>
			function liked(){
				window.location = "likedEvents.php?userID=" + document.getElementById("userID").value;
			}
			function goBack() {
			  window.history.back("likedEvents.php?userID=");
			}
		</script>
    </head>
    <body>
        <form method = "post" action = "likedEvents.php" >
            <div class="eventForm">
                
                <h1 style="text-align:center;font-size:40px;"> Your Booked Event(s) </h1>
                
                
                <section class="container">
                    <br>
                    <p><label><span class="outputTitle">Event Title:</span>
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
                    <p><label><span class="outputTitle">Event Date</span>
                    <output name="time">: '.$row['eventDate'].'</output>
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
                    <p><label><span class="outputTitle">Price: </span>
                    <output name="price" id="price" value="'.$row['price'].'"/> '.$row['price'].' </output> RM per ticket
                    </label></p>
                    
                    <div style="margin-top:50px;"> <span style="margin-left: 40%; color: #333;"> Your Booking </span>
                       
                        <p><label>Tickets:
                        <input name="tickets" id="tickets" type = "text" value="'.$noOfTickets.' person" disabled/>
                        </label></p>
                        <p><label>Total Price:
                        <input name="totalPrice" value="RM '.$totalPrice.'" id="totalPrice" type = "text" disabled/>
                        </label></p>
                    </div>
					
					
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