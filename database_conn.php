<?php
  $database = new mysqli("localhost","root","","eventdb");
  if (mysqli_connect_errno())
    printf("<p style=color:red>Connection to database failed: ", mysqli_connect_error());
?>
