<?php

require_once('db-connect.php');

$merchandise_id = $_POST['merchandise_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$query = 'UPDATE t_merchandise SET `merchandise-name`="'.$name.'", `merchandise-description`="'.$description.'", `merchandise-price`="'.$price.'"  WHERE merchandise_id="'.$merchandise_id.'"';

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: admin.php");

?>
