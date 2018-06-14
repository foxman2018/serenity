<?php

header("Location: admin.php");

$num = $_GET['location_id'];

require_once('db-connect.php');

$query = "DELETE FROM t_locations WHERE location_id='".$num."'";

$result = mysqli_query($link, $query);

mysqli_close($link);

?>
