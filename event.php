<!DOCTYPE html>
<html>
<head>
    
    <title>Event Management</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
    <script src="js/main.js" type = "text/javascript"></script>
	
</head>
<body>
    <form method="POST">
        <?php
         echo '<input type="hidden" id="userID" value="'.$_GET['userID'].'">';
        ?>
		<div class="topbar">
		
			<ul>
				<a class="active" onclick="eventList()">Event</a>
				<a onclick="eventCreate()">Create Event</a>
				<a onclick="yourEvent()">Event List</a>
				<a onclick="liked()">My Event</a>
				
				
				
			</ul>
			<div class="topnav-right">
				<a onclick="profile()">User Profile</a>
				<a onclick="logout()">Sign out</a>
			</div>
		</div>
    </form>
	
    <form method = "POST" action = "" >
		<div>

			<section>
				<div style="margin:20px; margin-left:80px;">
					<p style="margin-left: 10%"><label>Search for events
					<input class="search-box" type = "searchQuery" name = "searchText" placeholder = "Enter an event name" size="30"/>
					</label>
					<input type="submit" name="search" class="button" value="search">
					</p>
				</div>

				<?php

				include "connect.php"; // connection file to database
				if (isset($_POST['search'])) {
					$search = $_POST['searchText'];
					if (!empty($search)) {
						$result = "SELECT eventID, eventName, eventDate, eventTime FROM events WHERE eventName LIKE '%$search%'";
					} else {
						$result = "SELECT eventID, eventName, eventDate, eventTime FROM events";
					}
				}
				else {
					$result = "SELECT eventID, eventName, eventDate, eventTime FROM events";
				}

				$select = $conn->query($result);
				if($select) {
					while ($row = mysqli_fetch_array($select)) {
						echo '<form method = "POST">
							 
							  <div class="event">'
							. $row['eventName'] . '<br>
							<span style = "font-size: 16px; font-weight: none; color: darkgray;">' . $row['eventDate'] .' &nbsp '. $row['eventTime'] . '</span>
							<input type="hidden" name="eventID" value = "'.$row['eventID'].'">
							<input type="hidden" name="userID" value="'.$_GET['userID'].'">
							<input type="submit" class="eventButton" value="View" onclick="form.action=\'eventView.php\';">
						</div>
						
						</form>';
					}
				}
				else{
					echo '<div style="position: relative; left: 40%;"> There was no listing found!</div>';
				}
				?>
				
			</section>
		</div>
    </form>
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
