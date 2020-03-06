<html>

<head>
    <meta charset = "utf-8">
    <title>Liked Events</title>
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
			<a onclick="yourEvent()">Event List</a>
			<a class="active" onclick="liked()">My Event</a>
			
			
			
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
$result = "SELECT eventID, numberOfTickets, TotalPrice FROM ticketing WHERE userID = '$userID'";
$select = $conn->query($result);
if($select) {
    while ($row = mysqli_fetch_array($select)) {
            $count = $count +1;
            $eventID = $row["eventID"];
            $queryEvent = "SELECT eventName, eventDate, eventTime FROM events WHERE eventID = '$eventID'";
            $entry = $conn->query($queryEvent);
            $event = mysqli_fetch_array($entry);
            echo '<form method = "POST">
            <div class="event">'
            . $event['eventName'] . '<br>
                      <span style = "font-size: 16px; font-weight: none; color: darkgray;">' . $event['eventDate'] .' &nbsp '. $event['eventTime'] . '</span>
                      <input type="hidden" name="eventID" value = "'.$row['eventID'].'">
                      <input type="hidden" name="TotalPrice" value="'.$row['TotalPrice'].'">
                       <input type="hidden" name="numberOfTickets" value="'.$row['numberOfTickets'].'">
                     <input type="submit" class="eventButton" value="view" onclick="form.action=\'eventLikeView.php\';">
                     </div>
                     </form>';
    }
    if($count == 0)
        echo "<script type='text/javascript'>alert('You have not submitted any application!');</script>";
}
else{
    echo "<script type='text/javascript'>alert('Sorry, something went wrong while reading data!');</script>";}

?>

</body>
</html>
