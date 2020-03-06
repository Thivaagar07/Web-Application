<?php
include "connect.php"; // connection file to database

if (isset($_POST['submit'])) {
    $id = $_POST['userID'];
    $query = "DELETE FROM user WHERE userID = $id";
    $delete = $conn->query($query);
    if($delete){
        $message ="User account has been successfully deleted.";
    }
    else{
        $message = "Sorry, something went wrong with deleting user account!";
    }

    echo $message;
    header("refresh:3; url= ./adminHome.php");
}

$userID = $_POST["userID"];
$result = "SELECT userID, fname, lname, email, dob, phone FROM user WHERE userID = '$userID'";
$select = $conn->query($result);

if($select) {
    $row = mysqli_fetch_array($select);
    echo '<html>
	<head>
		<meta charset="UTF-8">
		<title>Delete User</title>
		<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
		<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />

	</head>
	<body class="bg">
		<form method = "post" action = "" >
			<div class="container">
				
				<h1 style="font-size:40px;margin-bottom:50px;"> Delete User </h1>
				

				<p><label>User ID:
				    <input type="hidden" name="userID" value="' . $row['userID'] . '">
					<input id="userID" type = "text" value="' . $row['userID'] . '" disabled/>
				</label></p>

				<p><label>First Name:
					<input id="firstName" type = "text" value="' . $row['fname'] . '" disabled/>
				</label></p>

				<p><label>Last Name:
					<input id="lastName" type = "text" value="' . $row['lname'] . '" disabled/>
				</label></p>

				<p><label>Email:
				<input id="email" type = "text" value="' . $row['email'] . '" disabled/>
				</label></p>

				<p><label>DOB:
					<input name="dob" type = "text" value="' . $row['dob'] . '" disabled/>
				</label></p>

				<p><label>Phone:
					<input name="phone" type = "text" value="' . $row['phone'] . '" disabled/>
				</label></p>
				
                <input type="submit" name="submit" class="button" value="Delete User" style="margin-left: 40%">
			</div>

		</form>

	</body>
	</html>';
}
else {
    $message = "Something went wrong while reading data from the server!";
    echo $message;
    header("refresh:3; url= ./adminHome.php");
}
?>
