<?php

session_start();

require_once('header.php');

$user = $_SESSION['user-id'];

require_once('db-connect.php');

// Remove the orders

$query = "DELETE FROM `t_orders` WHERE `user_fk` = '$user'";

$result = mysqli_query($link, $query);

// Retrieve newly updated basket item number

$count_query = "SELECT sum(`order-quantity`) FROM `t_orders` WHERE `user_fk` = '$user'";

$count = mysqli_query($link, $count_query);

$itemCount = mysqli_fetch_array($count);

$_SESSION['item-count'] = $itemCount[0];


mysqli_close($link);

?>

<div class="container main-content">

  <div class="row">

    <div class="twelve columns">

      <!-- Thank you message -->

      <h5>Thank you for you purchase <?php echo $_SESSION['name']; ?>!</h5><br/><br/>

      Your items will be shipped to : <br/><strong> <?php echo $_SESSION['address']; ?> </strong><br/><br/><br/>

      <p>Please allow <strong>up to 10 business days</strong> for delivery.</p>

      <p>Thank you for your order. We value your trust in our company, and we will do our best to meet your service expectations. Your purchase also includes a standard 90 day warranty should a problem arise. If you have any questions, please don’t hesitate to contact us. </p><br/><br/>

      <a class="button" href="index.php">Return Home</a>

    </div>


  </div>

</div>

<?php require_once('footer.php'); ?>
