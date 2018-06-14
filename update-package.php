<?php

require_once('db-connect.php');

$package_id = $_POST['package_id'];
$name = $_POST['name'];
$description = $_POST['description'];
$price = $_POST['price'];

$query = 'UPDATE t_packages SET `package-name`="'.$name.'", `package-description`="'.$description.'", `package-price`="'.$price.'"  WHERE package_id="'.$package_id.'"';

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: admin.php");

?>
