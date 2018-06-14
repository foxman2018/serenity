<?php

session_start();

require_once('header.php'); ?>

<div class="container main-content">

<div class="row location-panel">

    <?php

    $userid = $_SESSION['user-id'];

    require_once('db-connect.php');

    $result = mysqli_query($link, '
    SELECT *, SUM(`order-quantity`) AS totalQuantity
    FROM `t_orderdetails`
    INNER JOIN `t_merchandise` ON t_merchandise.merchandise_id = t_orderdetails.merchandise_fk
    INNER JOIN `t_orders` ON t_orders.order_id = t_orderdetails.orderdetail_id
    GROUP BY merchandise_id;
    ');

    // Fallback if no items are returned

    if (mysqli_num_rows($result) < 1) {

      echo '<h4>You have no items in your basket</h4><br/><br/>';

      echo '<a href="shop.php" class="button">Add Items</a><br/><br/><br/>';

    } else {

    ?>

    <table class="u-full-width">

    <h5>Review Your Order</h5>

    <br/><br/>

    <thead>
    <tr>
      <th>Image</th>
      <th>Name</th>
      <th>Description</th>
      <th>Quantity</th>
      <th>Price</th>
      <th></th>
    </tr>
  </thead>

  <tbody>

  <?php

  while($row = mysqli_fetch_array($result)){

    // Output basket items

    $merchandise_id = $row['merchandise_id'];

    echo '<tr>';
    echo '<td><img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['merchandise-image'].'" /></td>';
    echo '<td>'.$row['merchandise-name'].'</td>';
    echo '<td>'.$row['merchandise-description'].'</td>';
    echo '<td>'.$row['totalQuantity'].'</td>';
    echo '<td>€'.number_format(($row['merchandise-price'] * $row['totalQuantity']), 2).'</td>';
    echo '<td class="delete"><a class="delete-button" href="delete-basket-item.php?order_id='.$row['order_id'].'">Remove</a></td>';

  }

  ?>

</tbody>

</table>

<?php

// Get total price of items in the basket

$total = mysqli_query($link, 'SELECT SUM(`merchandise-price` * `order-quantity`) AS `total`
                              FROM `t_orderdetails`
                              INNER JOIN `t_merchandise` ON t_merchandise.merchandise_id = t_orderdetails.merchandise_fk
                              INNER JOIN `t_orders` ON t_orders.order_id = t_orderdetails.orderdetail_id
                              ');

$totalprice = mysqli_fetch_array($total);

// Output total price

echo '<h5 class="total">Total Order : €'.number_format($totalprice['total'], 2).'</h5><br/><h6 class="total">Shipping : <i>Free</i></h6>';

?>

<br/><br/><br/>

<div class="row">
  <div class="twelve columns">

<h5>Please Enter Your Payment Details</h5>

</div>
</div>

<div class="row">
    <div class="six columns">

    <br/><br/>

    <h6><strong>Credit Card Details</strong></h6>
    <br/>

      <select>
        <option value="visa">Visa </option>
        <option value="mastercard">Mastercard </option>
        <option value="laser">Laser </option>
      </select><br/><br/>
      <input type="text" name="creditcard" placeholder="Card Number"><br/><br/>
      <input type="text" name="expiry" placeholder="Expiry Date"><br/><br/>
      <input type="text" name="security" placeholder="Security Number"><br/><br/>
      <input type="text" name="cardholder" placeholder="Card Holder Name"><br/><br/><br/>

      <h6><strong>Shipping Details</strong></h6>
      <br/>

      <?php

      // Retrieve users name and address

      require_once('db-connect.php');

      $username = $_SESSION['id'];

      $query = "SELECT * FROM `t_users` WHERE `user-name` = '$username'";

      $result = mysqli_query($link, $query);

      $row = mysqli_fetch_array($result);

      ?>

      <p>Full Name : <strong> <?php echo $row['first-name'].' '.$row['last-name'] ?> </strong></p>
      <p>Address : <strong> <?php echo $row['user-address'] ?> </strong></p><br/>


        <a class="button" href="delete-basket.php">Proceed with Purchase</a>

    </form>
  </div>

  <?php } ?>

</div>

</div>

</div>

<?php require_once('footer.php'); ?>
