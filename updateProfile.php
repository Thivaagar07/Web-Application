<!DOCTYPE html>
<html>

  <head>
    <meta charset = "utf-8">
    <title>Registering</title>
  </head>

  <script src="js/main.js" type = "text/javascript"></script>


  <body>
    <?php
      include "connect.php"; // connection file to database
      $userID = $_POST["userID"];
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $dob=$_POST['dob'];
      $phone=$_POST['phone'];

     
      

      $query ="UPDATE `user` SET `email` = '$email', `fname` = '$fname', `lname` = '$lname', `dob` = '$dob', `phone` = '$phone' WHERE `user`.`userID` = $userID";
      
	  $insert = $conn->query($query);
        if (!($insert)) {
            $message = "Sorry, something went wrong while creating your account!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else {
            echo "<script language='javascript' type='text/javascript'>
               successful({$conn->insert_id});
             </script>";
        }
     ?>
  </body>
</html>
