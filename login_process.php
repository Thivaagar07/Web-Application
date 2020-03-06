<?php
  session_start();
  include 'connect.php';

  $id = $_POST['userID'];
  $password = $_POST['password'];
 // admin log in
    $adminResult = "SELECT name, password FROM admin WHERE adminID = $id LIMIT 1";
    $adminSelect = $conn->query($adminResult);
    if (!($adminSelect))
        header("location: ./login.php?error=1");

    $adminRow = mysqli_fetch_array($adminSelect);

    //store Password --> $hashedPw
    $hashedPw = $adminRow['password'];

    if ($hashedPw == $password) { // compares both hashed password
        // session variables storing info. of users
        $_SESSION['userID'] = $id;
        $_SESSION['FName'] = $row['fname'];

        header("location: ./adminHome.php");
    } else {

        // user log in
        $id = $_POST['userID'];
        $password = $_POST['password'];
        $userResult = "SELECT fname, password FROM user WHERE userID = $id LIMIT 1";
        $userSelect = $conn->query($userResult);
        if (!($userSelect))
            header("location: ./login.php?error=1");

        $userRow = mysqli_fetch_array($userSelect);

        //store Password --> $hashedPw
        $hashedPw = $userRow['password'];
        $password = hash("sha512", $password); // hash entered password

        if ($hashedPw == $password) { // compares both hashed password
            // session variables storing info. of users
            $_SESSION['userID'] = $id;
            $_SESSION['FName'] = $row['fname'];

            header("location: ./event.php?userID= $id");
        } else
            header("location: ./login.php?error=1"); //login failed

    }
 ?>
