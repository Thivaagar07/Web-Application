<?php
include "connect.php"; // connection file to database
$userID = $_GET["userID"];
if (isset($_POST['submit'])) {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $address = $_POST['address'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $capacity = $_POST['capacity'];
    $price = $_POST['price'];
    $userID = $_GET["userID"];
    $result = "INSERT INTO events (eventName, eventDesc, location, eventDate, eventTime, capacity, price, userFK) VALUES ('{$conn->real_escape_string($title)}', '{$conn->real_escape_string($description)}', 
    '{$conn->real_escape_string($address)}', '{$conn->real_escape_string($date)}', '{$conn->real_escape_string($time)}', {$conn->real_escape_string($capacity)}, {$conn->real_escape_string($price)}, {$conn->real_escape_string($userID)})";
    $insert = $conn->query($result);
    if ($insert) {
        $message = "Your new listing has been successfully created! The listing ID is {$conn->insert_id}";
    } else {
        $message = "Sorry, something went wrong while creating your listing!";
    }

    echo "<script type='text/javascript'>alert('$message');</script>";
}

?>
<html>
<head>
    <meta charset="UTF-8">
    <title>Create an event</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
	<script src="js/main.js" type = "text/javascript"></script>
	
</head>
<body>
	<form method = "POST" action = "" >
        <?php
         echo '<input type="hidden" id="userID" value="'.$_GET['userID'].'">';
        ?>
		<div class="topbar">
		
			<ul>
				<a onclick="eventList()">Event</a>
				<a onclick="eventCreate()" class="active">Create Event</a>
				<a onclick="yourEvent()">Event List</a>
				<a onclick="liked()">My Event</a>		
			</ul>
			<div class="topnav-right">
				<a onclick="profile()">User Profile</a>
				<a onclick="logout()">Sign out</a>
			</div>
		</div>
		
		<div class="container">
			<header>
				<h3>Create Your Event</h3>
			</header>

			<section>
				<label>Franchisers<span class="redStar"> *</span></label>
				<input name="title" type = "text" autofocus required />
				

				<label>Description</label><br>
				<textarea name="description"  rows= "4" cols= "50" placeholder="Write your goals!"></textarea>
				

                <label>Time<span class="redStar"> *</span></label>
                <input name="time" type="time" placeholder = "hh:mm:ss" required /><br>
                
				<label>Address</label><br>
				<textarea name="address"  rows= "4" cols= "50" placeholder="Write your event venue!" required></textarea>

				<label>Capacity<span class="redStar"> *</span></label>
				<input name="capacity" type = "number" value = "0" min = "0" step = "1" size = "5" required /><br>
				
				<label>Date<span class="redStar"> *</span></label>
				<input name="date" type = "date" required /><br>
				
				<label>Price<span class="redStar"> *</span></label>
				<input name="price" type = "number" value = "0" min = "0" step = "0.01" size = "5" required /><br>
				

				<span class="clearfix">
					<input type="submit" name = "submit" class="button" value="Create">
					<input type = "reset" class="button" value = "Reset" />
				</span>
			</section>
		</div>

	</form>
</body>
</html>