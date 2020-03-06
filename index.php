<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Homepage</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

	
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=1" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=1" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

	<div class="welcome-wall">
	    <img src="images/welcome.jpg" alt="welcome" style="width:100%">
	</div>

	<div class="topbar">
	<div id="myLinks">
	   <a class="active" href="#home">About</a>
	   <a href="#team">Our Team</a>
	   <a href="#contact">Contact</a>
		   
		
		
		<div class="topnav-right">
			<a href="login.php">Login</a>
			<a href="register.php">Sign Up</a>
		</div>

	</div>
	</div>


	<div class="pageinfo">
		<h1>Welcome to our Event Management Website.</h1>
	</div>




	<div class="border-line">
		<h1>Our Goal</h1>
	</div>
	
	<div id="arrange">
		<div class="one" id="divone">
			<table>
				<tr>
					<td id="descb"><img src="images/f1.PNG" style="width:50px;"></td>
					<td><p>This website will provide to maintain your monthly Expenses.</p></td>
				</tr>
			</table>	
		</div>
		<div class="two" id="divone">
			<table>
				<tr>
					<td id="descb"><img src="images/f1.PNG" style="width:50px;"></td>
					<td><p>This website will provide to maintain your monthly Bills and Payments.</p></td>
				</tr>
			</table>		
		</div>
		<div class="three" id="divone">
			<table>
				<tr>
					<td id="descb"><img src="images/f1.PNG" style="width:50px;"></td>
					<td><p>This website will provide to manage your Daily Task and Activities.</p></td>
				</tr>
			</table>
		</div>
		<div class="four" id="divone">
			<table>
				<tr>
					<td id="descb"><img src="images/f1.PNG" style="width:50px;"></td>
					<td><p>This website will remind you to your Important Stuff.</p></td>
				</tr>
			</table>
		</div>
	</div>
	<br><br><br><br><br><br><br><br>
	



	<nav id="team">
		<div class="border-line">
			<h1>Our Team</h1>
		</div>
	</nav>

	
	<div class="row">
	  <div class="column">

		

		<div class="flip-card">
		  <div class="flip-card-inner">
			<div class="flip-card-front">
			  <img src="images/Avatar1.png" alt="Avatar" style="width:300px;height:300px;">
			</div>
			<div class="flip-card-back"><br>
			  <h1>Mohan Raj</h1><br>
			  <h1>Data Science</h1><br>
			  
			  <p>We love that guy</p>
			</div>
		  </div>
		</div>
		
		
		
	  </div>
	  <div class="column">
		
		<div class="flip-card">
		  <div class="flip-card-inner">
			<div class="flip-card-front">
			  <img src="images/Avatar2.png" alt="Avatar" style="width:300px;height:300px;">
			</div>
			<div class="flip-card-back"><br>
			  <h1>Thivaagar</h1><br>
			  <h1>Data Science</h1><br>
			  
			  <p>We love that guy</p>
			</div>
		  </div>
		</div>
		
		
		
	  </div>
	  <div class="column">

		<div class="flip-card">
		  <div class="flip-card-inner">
			<div class="flip-card-front">
			  <img src="images/Avatar3.png" alt="Avatar" style="width:300px;height:300px;">
			</div>
			<div class="flip-card-back">
			  <br>
			  <h1>Vasanthaan</h1><br>
			  <h1>Data Science</h1><br>
			 
			  <p>We love that guy</p>
			</div>
		  </div>
		</div>


	  </div>
	</div>


	
	<div class="enquiry">
	<h1 class="custfont">Enquiries</h1>
	<br>
	  <form method="POST"  action="./review_process.php">
		<label for="fname">Name</label>
		<input type="text" id="name" name="name" placeholder="Your name..">

		<label for="lname">Email</label>
		<input type="email" id="email" name="email" placeholder="Your last name..">


		<label for="subject">Subject</label>
		<textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

		<input type="submit" value="Submit">
	  </form>
	</div>
	

	

	<div class="footer" id="contact">
	
		<a href="https://www.facebook.com"><img class="image" id="footerimg" src="images/social/facebook.png" alt="Facebook"></a>
		<a href="https://instagram.com"><img class="image" id="footerimg" src="images/social/instagram.png" alt="Instagram"></a>
		<a href="https://twitter.com"><img class="image" id="footerimg" src="images/social/twitter.png" alt="Twitter"></a>
	</div>

		
</body>

</html>
			