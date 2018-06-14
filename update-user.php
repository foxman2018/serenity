<?php

require_once('db-connect.php');

$id = $_POST['user_id'];
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['first-name'];
$lastname = $_POST['last-name'];
$address = $_POST['user-address'];
$email = $_POST['user-email'];

$query = 'UPDATE `t_users` SET `user-name`="'.$username.'", `user-password`="'.$password.'", `first-name`="'.$firstname.'", `last-name`="'.$lastname.'", `user-address`="'.$address.'", `user-email`="'.$email.'" WHERE `user_id` = "'.$id.'"';

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: my-account.php");

?>
