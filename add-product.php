<?php

$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

require_once('db-connect.php');

require_once('upload.php');

$query = "INSERT INTO `t_merchandise` (`merchandise-name`, `merchandise-description`, `merchandise-price`, `merchandise-image`) VALUES ('$name', '$description', '$price', '$image')";

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: admin.php");

?>
