<?php

$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];

require_once('db-connect.php');

$query = "INSERT INTO `t_users` (`user-name`, `user-password`, `user-email`) VALUES ('$name', '$password', '$email')";

$result = mysqli_query($link, $query);

mysqli_close($link);

header('Location: sign-in.php');

?>
