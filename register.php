<!DOCTYPE html>

<html>

<head>
    <meta charset = "utf-8">
    <title>Sign Up</title>
	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
    <script type="text/javascript"></script>
</head>

<body>

	<div class="welcome-wall">
	    <img src="images/welcome.jpg" alt="welcome" style="width:100%">
	</div>

	<div class="topbar">
		<ul>
		   <a href="index.php">About</a>
		   <a href="index.php">Our Team</a>
		   <a href="#contact">Contact</a>
		   
		</ul>
		
		<div class="topnav-right">
			<a href="login.php">Login</a>
			<a class="active" href="register.php">Sign Up</a>
		</div>
		
	</div>
	
	<div class="container" style="margin-top:140px; margin-bottom:140px;">
		<h1 style="font-size:40px;">Sign Up</h1><br>
		<p>Please fill in this form to create an account.</p>
		<hr>
		<section>
			<form method="POST"  action="./register_process.php" >
				<label>First Name</label><span class="redStar"> *</span>
				<input name="fname" type = "text" placeholder="Enter your First Name", autofocus required/>
				<br>
				<label>Last Name</label><span class="redStar"> *</span>
				<input name="lname" type = "text" placeholder="Enter your Last Name", required/>
				<br>

				<label>Email</label><span class="redStar"> *</span>
				<input name="email" type = "text" placeholder="youremail@domain.com" required/>
				<br>
				
				<label>Date of Birth</label>
				<input name="dob" type = "date" placeholder="yyyy/mm/dd" required/>
				<br>

				<label>Phone Number</label><span class="redStar"> *</span>
				<input name="phone" type = "text" pattern="\d{3}[\-]\d{7}" placeholder="011-1234567" required/>
				<br>

				<label>Password</label><span class="redStar"> *</span>
				<input name="passw1" type = "password" pattern=".{6,20}" placeholder = "Enter your password" title = "Password must be between 6 to 20 characters" required onchange="
				  if (this.checkValidity())
					form.passw2.pattern = this.value;
				"/>
				<!-- on change, if passw1 pattern is correct, passw2's pattern condition is replaced with the value entered in passw1 -->

				<label>Confirm Password</label><span class="redStar"> *</span>
				<input name="passw2" type = "password" placeholder = "Re-enter your password" title = "Password must be between 6 to 20 characters" required/>
				

				<span class="clearfix">
					<button type="submit" name="Submit" class="signupbtn" value="Register">Sign Up</button>

					<button type = "reset" class="cancelbtn" value = "Clear" />Clear</button>
				</span>
				<a href="login.php">Sign In</a>
			</form>
		</section>
	</div>
	<?php include('footer.php'); ?>
</body>

</html>
