<html>

<head>
    <meta charset = "utf-8">
    <title>Users Profile</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
    <script src="js/main.js" type = "text/javascript"></script>
	
</head>
<body>
		<div class="topbar">
			<a onclick="admin()">Admin Home</a>
			<a onclick="review()">View Review</a>
			
			<div class="topnav-right">
				<form method="POST">
					<a class="active" onclick="userDelete()">User Profile</a>
					<a onclick="logout()">Sign out</a>
				</form>
			</div>
		</div>
<?php
include "connect.php"; // connection file to database
$count = 0;
$result = "SELECT userID, fname, lname, email FROM user";
$select = $conn->query($result);
if($select) {
    while ($row = mysqli_fetch_array($select)) {
        $count = $count + 1;
        echo '<form method = "POST">
                 <div class="event">'
                        . $row['fname'] . '&nbsp' . $row['lname'] . '<br>
                      <span style = "font-size: 16px; font-weight: none; color: darkgray;">' . $row['email'] .'</span>
                      <input type="hidden" name="userID" value = "' . $row['userID'] . '">
                     <input type="submit" class="eventButton" style="left: -20px; top: -4px;; float: right;" value="Delete" onclick="form.action=\'deleteUser.php\';">
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
<script>
	function toggleNavigation(element) {
	  element.classList.toggle('active-navbar');
	}
	
	function shiftPage(element) {
	  element.classList.toggle('shift-page');
	}

	document.getElementById('menuButton').addEventListener('click', function() {
	  Array.from(document.getElementsByClassName('side-navbar')).forEach(toggleNavigation);
	  Array.from(document.getElementsByClassName('page')).forEach(shiftPage);
	});
</script>