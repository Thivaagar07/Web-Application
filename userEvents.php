<html>

<head>
    <meta charset = "utf-8">
    <title>Your Events</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />

    <script src="js/main.js" type = "text/javascript"></script>
</head>
<body>

	<?php
	 echo '<input type="hidden" id="userID" value="'.$_GET['userID'].'">';
	?>
	<div class="topbar">
	
		<ul>
			<a onclick="eventList()">Event</a>
			<a onclick="eventCreate()">Create Event</a>
			<a class="active" onclick="yourEvent()">Event List</a>
			<a onclick="liked()">My Event</a>
			
			
			
		</ul>
		<div class="topnav-right">
			<a onclick="profile()">User Profile</a>
			<a onclick="logout()">Sign out</a>
		</div>
	</div>

<?php
include "connect.php"; // connection file to database




$userID = $_GET["userID"];
$count = 0;
$result = "SELECT eventID, eventName, eventDate, eventTime FROM events WHERE userFK = '$userID'";
$select = $conn->query($result);
if($select) {
    while ($row = mysqli_fetch_array($select)) {
        $count = $count + 1;
        echo '
		
		<form method = "POST">
                 <div class="event">'
            . $row['eventName'] . '<br>
                      <span style = "font-size: 16px; font-weight: none; color: darkgray;">' . $row['eventDate'] . ' &nbsp ' . $row['eventTime'] . '</span>
                      <input type="hidden" name="eventID" value = "' . $row['eventID'] . '">
                     <input type="submit" class="eventButton" value="view" onclick="form.action=\'userEventView.php\';">
                 </div>
            </form>';
    }
    if($count == 0)
        echo "<script type='text/javascript'>alert('You have no active applications at this time.');</script>";
}
else{
    echo "<script type='text/javascript'>alert('Sorry, something went wrong while reading data!');</script>";}

?>

</body>
</html>
