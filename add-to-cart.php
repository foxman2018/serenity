<?php

session_start();

$item = $_POST['item'];
$quantity = $_POST['quantity'];
$user = $_SESSION['user-id'];

require_once('db-connect.php');

// Insert item number

$query = "INSERT INTO `t_orderdetails` (`merchandise_fk`) VALUES ('$item')";

$result = mysqli_query($link, $query);

// Insert quantity and user details

$order_query = "INSERT INTO t_orders (`user_fk`, `order-quantity`) VALUES ('$user', '$quantity')";

$order_result = mysqli_query($link, $order_query);

// Retrieve newly updated basket item number

$count_query = "SELECT sum(`order-quantity`) FROM `t_orders` WHERE '$user' = `user_fk`";

$row = mysqli_query($link, $count_query);

$count = mysqli_fetch_array($row);

$_SESSION['item-count'] = $count[0];

mysqli_close($link);

header('Location: shop.php');

?>
