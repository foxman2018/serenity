<?php

session_start();

  if (empty($_POST['username']) || empty($_POST['password'])) {

  echo "Username or Password is invalid";

  } else {

  $username = $_POST['username'];
  $password = $_POST['password'];

  require_once('db-connect.php');

  // Secure username and password

  $username = stripslashes($username);
  $password = stripslashes($password);
  $username = mysqli_real_escape_string($link, $username);
  $password = mysqli_real_escape_string($link, $password);

  $query = "SELECT * FROM `t_users` WHERE `user-name` = '$username' AND `user-password` = '$password'";

  $result = mysqli_query($link, $query);

  $row = mysqli_fetch_array($result);

  // Store session variables

  $_SESSION['id'] = $row['user-name'];

  $_SESSION['user-id'] = $row['user_id'];

  $_SESSION['name'] = $row['first-name'];

  $_SESSION['address'] = $row['user-address'];

  if ($username == $row['user-name']) {

    header("location: index.php");

    } else {

    echo "Username or Password is invalid";

  }

  $user = $row['user_id'];

  // Retrieve basket item number

  $count_query = "SELECT sum(`order-quantity`) FROM `t_orders` WHERE `user_fk` = '$user'";

  $count = mysqli_query($link, $count_query);

  $itemCount = mysqli_fetch_array($count);

  $_SESSION['item-count'] = $itemCount[0];

  mysqli_close($link);

  }

?>
