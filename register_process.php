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
      $passw1 = $_POST['passw1'];
      $fname=$_POST['fname'];
      $lname=$_POST['lname'];
      $email=$_POST['email'];
      $dob=$_POST['dob'];
      $phone=$_POST['phone'];

      /***** hashed password *****/
      $password = hash('sha512', $passw1);



      $query ="INSERT INTO user(password, fname, lname, email, dob, phone) VALUES ('{$conn->real_escape_string($password)}','{$conn->real_escape_string($fname)}','{$conn->real_escape_string($lname)}',
      '{$conn->real_escape_string($email)}', '{$conn->real_escape_string($dob)}', '{$conn->real_escape_string($phone)}')";
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
