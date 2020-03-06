<?php
include "connect.php"; // connection file to database

$userID = $_POST["userID"];
$id = $_POST['eventID'];

$result = "SELECT eventName, eventDesc, location, eventDate, eventTime, capacity, price FROM events WHERE eventID = $id";
$select = $conn->query($result);
if ($select) {
    $row = mysqli_fetch_array($select);
    echo '
    <head>
        <meta charset="UTF-8">
        <title>event view</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
		<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
        
        
        <script type = "text/javascript">
            function calculateTotle() {
                var price = document.getElementById("price").value;
                var tickets = document.getElementById("tickets").value;
                var totle = price * tickets;
                document.getElementById("totalPrice").value = totle;
                document.getElementById("finalPrice").value = totle;
            }
        </script>
    </head>
    <body class="bg">
        <form method = "post" action = "ticket.php" >
            <div class="container">
                <header>
                    <h3>Event Attendance</h3>
                </header>
                
                <section>
                    <input type="hidden" name="userID" value="'.$userID.'">
                    <input type="hidden" name="eventID" value="'.$id.'">
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
                    <p><label><span>Event Date:</span>
                    <output name="time"> '.$row['eventDate'].'</output>
                    </label></p>
                    
                    <br>
                    <p><label><span>Event Time:</span>
                    <output name="time"> '.$row['eventTime'].'</output>
                    </label></p>
                    <input type="hidden" name="capacity" value="'.$row['capacity'].'">
                    <br>
                    <p><label><span>Capacity:</span>
                        <output name="capacity"/> '.$row['capacity'].'</output> person
                    </label></p>
                    
                    <br>
                    <p><label><span>Price:</span>
                    <output name="price" id="price" value="'.$row['price'].'"/> '.$row['price'].' </output> RM per ticket
                    </label></p>
                    
                    <div>
                       
                        <p><label>Tickets:<span class="redStar">* </span>
                        <input name="tickets" id="tickets" type = "number" value = "0" min = "0" step = "1" size = "5" onchange="calculateTotle()" required/> person
                        </label></p>
                        <p><label>Total Price:
                        <input name="totalPrice" value="0" id="totalPrice" type = "text" size="9" disabled/>
                        <input type="hidden" id="finalPrice" name="finalPrice">
                        </label></p>
                        
                        <input type="submit" class="button" value="Register">
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