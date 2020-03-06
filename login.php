<!DOCTYPE html>
<html>

<head>
    <meta charset = "utf-8">
    <title>Login Page</title>
    <?php
      if (isset($_GET['logout']))
        echo "<script language='javascript'>
                alert('Successfully logged out!');
              </script>";
    ?>

	<link rel="stylesheet" type="text/css" href="css/reset.css?v=2" />
	<link rel="stylesheet" type="text/css" href="css/style.css?v=2" />
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
			<a class="active" href="login.php">Login</a>
			<a href="register.php">Sign Up</a>
		</div>
		
	</div>
	
	<form  method="POST" action="./login_process.php"  style="margin-top:140px; margin-bottom:140px;">
		<div class="container">
			<h1 style="font-size:40px;">Login</h1><br>
			
			<section>
				<label for="email"><b>Email</b></label>
				<input name="userID" type = "text" placeholder = "Enter your username", autofocus required/>
				

				<label for="psw"><b>Password</b></label>
				<input name="password" type = "password" placeholder = "Enter your password", required/>
				

				<span class="clearfix">
					<button type="submit" class="loginbtn" value="Login">Login</button>
					<button onclick="window.location.href='index.html'" type="button" class="cancelbtn">Cancel</button>

					<a href="register.php">Create a new account</a>

				</span>
			</section>
		</div>
	</form>
	
	<?php include('footer.php'); ?>
	
  <?php
  if (isset($_GET['error'])) {
      //Determine if a variable ('error') is set and is not NULL
      if ($_GET['error'] == 1)
          echo '<p class="warning">Log in failed!</p>';
      else if ($_GET['error'] == 2)
          echo '<p class="warning">Please log in to proceed!</p>';
  }
  /*
  if(!($_SERVER["HTTPS"])) { // reload using https header if browser not using https connection
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
  } */
  ?>
  </body>

</html>
