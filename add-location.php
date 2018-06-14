<?php

$name = $_POST['name'];
$address = $_POST['address'];
$phone = $_POST['phone'];

require_once('db-connect.php');

require_once('upload.php');

$query = "INSERT INTO `t_locations` (`location-name`, `location-address`, `location-phone`, `location-image`) VALUES ('$name', '$address', '$phone', '$image')";

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: admin.php");

?>
