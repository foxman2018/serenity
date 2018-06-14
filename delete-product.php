<?php

header("Location: admin.php");

$num = $_GET['merchandise_id'];

require_once('db-connect.php');

$query = "DELETE FROM t_merchandise WHERE merchandise_id='".$num."'";

$result = mysqli_query($link, $query);

mysqli_close($link);

?>
