<html>

<head>
    <meta charset = "utf-8">
    <title>Users List</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
    <script src="js/main.js" type = "text/javascript"></script>
	
</head>
<body>
 
		<div class="topbar">
			<a onclick="admin()">Admin Home</a>
			<a class="active" onclick="review()">View Review</a>
			
			<div class="topnav-right">
				<form method="POST">
					<a onclick="userDelete()">User Profile</a>
					<a onclick="logout()">Sign out</a>
				</form>
			</div>
		</div>
		
<?php
include "connect.php"; // connection file to database
$count = 0;
$result = "SELECT id, name, email, subject FROM review";
$select = $conn->query($result);
if($select) {
    while ($row = mysqli_fetch_array($select)) {
        $count = $count + 1;
        echo '<form method = "POST">
                 <div style="height:auto;" class="event">'
                        . $row['name'] . '<br>
					  <input type="submit" class="eventButton" style="left: -20px; top: -4px;; float: right;" value="Delete" onclick="form.action=\'deleteReview.php\';">
					  <span style = "font-size: 16px; font-weight: none; color: darkgray;">' . $row['email'] .'</span><br>
                      <span style = "font-size: 16px; font-weight: none; color: darkgray;">' . $row['subject'] .'</span><br>
                      <input type="hidden" name="id" value = "' . $row['id'] . '">

				</div>
            </form>';
    }
    if($count == 0)
        echo "<script type='text/javascript'>alert('No more users with an active account.');</script>";
}
else{
    echo "<script type='text/javascript'>alert('Sorry, something went wrong while reading data!');</script>";
}

?>

</body>
</html>
