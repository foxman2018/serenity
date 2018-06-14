<?php

session_start();

$user = $_SESSION['user-id'];

require_once('db-connect.php');

// Delete all basket items

$query = "DELETE FROM `t_orders` WHERE `user_fk` = '$user'";

$result = mysqli_query($link, $query);

// Retrieve newly updated basket item number

$count_query = "SELECT sum(`order-quantity`) FROM `t_orders` WHERE `user_fk` = '$user'";

$count = mysqli_query($link, $count_query);

$itemCount = mysqli_fetch_array($count);

$_SESSION['item-count'] = $itemCount[0];

mysqli_close($link);

header('Location: purchased.php');

?>
