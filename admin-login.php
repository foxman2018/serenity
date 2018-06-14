<?php

session_start();

  if (empty($_POST['username']) || empty($_POST['password'])) {

  echo "Username or Password is invalid";

  } else {

  $username = $_POST['username'];
  $password = $_POST['password'];

  require_once('db-connect.php');

  // Secure password and username input

  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $query = "SELECT * FROM `t_admin` WHERE `admin-name` = '$username' AND `admin-password` = '$password'";

  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_array($result);

  // Check if details are correct

  $_SESSION['admin-id'] = $row['admin-name'];

  if ($username == $row['admin-name']) {

    header("location: index.php");

    } else {

    echo "Username or Password is invalid";

  }

  mysqli_close($link);

  }


?>
