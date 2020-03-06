<?php
include "connect.php"; // connection file to database

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $query = "DELETE FROM review WHERE id = $id";
    $delete = $conn->query($query);
    if($delete){
        $message ="User account has been successfully deleted.";
    }
    else{
        $message = "Sorry, something went wrong with deleting user account!";
    }

    echo $message;
    header("refresh:2; url= ./review.php");
}

$id = $_POST["id"];
$result = "SELECT id, name, email, subject FROM review WHERE id = '$id'";
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
				
				<h1 style="font-size:40px;margin-bottom:50px;"> Delete Enquiry </h1>
				

				<p><label>Review Number
				    <input type="hidden" name="id" value="' . $row['id'] . '">
					<input id="id" type = "text" value="' . $row['id'] . '" disabled/>
				</label></p>

				<p><label>Name
					<input id="name" type = "text" value="' . $row['name'] . '" disabled/>
				</label></p>
				
				<p><label>Email
					<input id="email" type = "text" value="' . $row['email'] . '" disabled/>
				</label></p>

				<p><label>Enquiry
					<textarea name="subject"  rows= "5" cols= "50" disabled>'.$row['subject'].'</textarea>
				</label></p>

			
				
                <input type="submit" name="submit" class="button" value="Delete Review" style="margin-left: 40%">
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
