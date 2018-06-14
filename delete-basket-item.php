<?php

session_start();

$num = $_GET['order_id'];

require_once('db-connect.php');

// Delete order

$query = "DELETE FROM t_orders WHERE order_id = '".$num."'";

$result = mysqli_query($link, $query);

// Delete order details

$delete_query = "DELETE FROM t_orderdetails WHERE orderdetail_id = '".$num."'";

$result = mysqli_query($link, $delete_query);

$user = $_SESSION['user-id'];

// Retrieve newly updated basket item number

$count_query = "SELECT sum(`order-quantity`) FROM `t_orders` WHERE `user_fk` = '$user'";

$count = mysqli_query($link, $count_query);

$itemCount = mysqli_fetch_array($count);

$_SESSION['item-count'] = $itemCount[0];

mysqli_close($link);

header('Location: ' . $_SERVER['HTTP_REFERER']);

?>
