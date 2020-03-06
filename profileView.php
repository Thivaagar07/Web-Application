<?php
include "connect.php"; // connection file to database

if (isset($_POST['submit'])) {
    $userID = $_GET['userID'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$email=$_POST['email'];
	$dob=$_POST['dob'];
	$phone=$_POST['phone'];
    $query ="UPDATE `user` SET `email` = '$email', `fname` = '$fname', `lname` = '$lname', `dob` = '$dob', `phone` = '$phone' WHERE `user`.`userID` = $userID";
    $update = $conn->query($query);
    if($update){
        $message ="User account has been successfully updated.";
		
    }
    else{
        $message = "Sorry, something went wrong with deleting user account!";
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
		
			<ul>
				<a onclick="eventList()">Event</a>
				<a onclick="eventCreate()">Create Event</a>
				<a onclick="yourEvent()">Event List</a>
				<a onclick="liked()">My Event</a>
				
				
				
			</ul>
			<div class="topnav-right">
				<a class="active" onclick="profile()">User Profile</a>
				<a onclick="logout()">Sign out</a>
			</div>
		</div>
		<form method = "post" action = " " >
			<div class="container">
			
				<h1 style="font-size:40px;">User Information</h1><br>
				<p><label>User ID
					<input name="userID" id="userID" type = "text" value="' . $row['userID'] . '" disabled/>
				</label></p>

				<p><label>First Name
					<input name="fname" id="firstName" type = "text" value="' . $row['fname'] . '" />
				</label></p>

				<p><label>Last Name
					<input name="lname" id="lastName" type = "text" value="' . $row['lname'] . '" />
				</label></p>

				<p><label>Email
				<input name="email" id="email" type = "email" value="' . $row['email'] . '" />
				</label></p>

				<p><label>Date of Birth
					<input name="dob" type = "date" value="' . $row['dob'] . '" />
				</label></p>

				<p><label>Contact Number
					<input name="phone" type = "text" value="' . $row['phone'] . '" />
				</label></p>
				
				<input type="submit" name="submit" class="button" value="Update Profile" style="margin-left: 25%;width:150px;">
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
