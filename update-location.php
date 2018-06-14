<?php

require_once('db-connect.php');

$location_id=$_POST['location_id'];
$name=$_POST['name'];
$address=$_POST['address'];
$phone=$_POST['phone'];

$query = 'UPDATE t_locations SET `location-name`="'.$name.'", `location-address`="'.$address.'", `location-phone`="'.$phone.'" WHERE `location_id`="'.$location_id.'"';

$result = mysqli_query($link, $query);

mysqli_close($link);

header("Location: admin.php");

?>
