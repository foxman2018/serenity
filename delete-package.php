<?php

header("Location: admin.php");

$num = $_GET['package_id'];

require_once('db-connect.php');

$query = "DELETE FROM t_packages WHERE package_id='".$num."'";

$result = mysqli_query($link, $query);

mysqli_close($link);

?>
