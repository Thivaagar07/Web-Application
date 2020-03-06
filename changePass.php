<?php
include "connect.php"; // connection file to database

if (isset($_POST['submit'])) {
    $userID = $_GET['userID'];
	$passw1 = $_POST['passw1'];
	$password = hash('sha512', $passw1);
    $query ="UPDATE `user` SET `password` = '$password' WHERE `user`.`userID` = $userID";
    $update = $conn->query($query);
    if($update){
        $message ="User password has been successfully updated.";
		
    }
    else{
        $message = "Sorry, something went wrong with updating your password!";
    }

    echo "<script type='text/javascript'>alert('$message');</script>";
    
}

$userID = $_GET["userID"];
$result = "SELECT userID, fname, lname, email, dob, phone FROM user WHERE userID = '$userID'";
$select = $conn->query($result);
if($select) {
    $row = mysqli_fetch_array($select);
    echo '<html>
<head>
	<meta charset="UTF-8">
	<title>User Profile</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
	<script src="js/main.js" type = "text/javascript"></script>

</head>

	<body class="bg">
		<div class="topbar">
		
			
			<a onclick="eventList()">Event</a>
			<a onclick="eventCreate()">Create Event</a>
			<a onclick="yourEvent()">Event List</a>
			<a onclick="liked()">My Event</a>
					
				
			
			<div class="topnav-right">
				<a class="active" onclick="profile()">User Profile</a>
				<a onclick="logout()">Sign out</a>
			</div>
		</div>
		<form method = "post" action = " " >
			<div class="container">
			
				<h1 style="font-size:40px;">Change Password</h1><br>
				
				<p><label>User ID
					<input name="userID" id="userID" type = "text" value="' . $row['userID'] . '" disabled/>
				</label></p>
				
				<label>Password</label><span class="redStar"> *</span>
				<input name="passw1" type = "password" pattern=".{6,20}" placeholder = "Enter your password" title = "Password must be between 6 to 20 characters" required onchange="
				  if (this.checkValidity())
					form.passw2.pattern = this.value;
				"/>
				

				<label>Confirm Password</label><span class="redStar"> *</span>
				<input name="passw2" type = "password" placeholder = "Re-enter your password" title = "Password must be between 6 to 20 characters" required/>
				
				<input type="submit" name="submit" class="button" value="Back" onclick="profile()" style="margin-left: 25%;width:150px;">
				<input type="pswdChng" class="button" value="Change Password" onclick="changePass()" style="width:150px;">
				
				

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
