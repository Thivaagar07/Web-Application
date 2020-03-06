<!DOCTYPE html>
<html>

<head>
    <meta charset = "utf-8">
    <title>Registering</title>
</head>



  <body>
    <?php
      include "connect.php"; // connection file to database
      $name = $_POST['name'];
      $email=$_POST['email'];
      $subject=$_POST['subject'];


      $query ="INSERT INTO review(name, email, subject) VALUES ('{$conn->real_escape_string($name)}','{$conn->real_escape_string($email)}','{$conn->real_escape_string($subject)}')";
      $insert = $conn->query($query);
        if (!($insert)) {
            $message = "Sorry, something went wrong while creating your account!";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        else {
			header("refresh:0; url= ./index.php");
        }
     ?>
  </body>
</html>
