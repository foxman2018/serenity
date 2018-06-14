<?php

session_start();

// Check id session variable is set

if (isset($_SESSION['id'])) {

?>

<?php require_once('header.php'); ?>

<br/><br/><br/><br/>

<div class="container">

  <div class="row">

    <div class="eight columns">

    <h4>My Information</h4>

    <br/><br/>

    <?php

    require_once('db-connect.php');

    $username = $_SESSION['id'];

    $query = "SELECT * FROM `t_users` WHERE `user-name` = '$username'";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    // Output user details

    ?>

    <p>Username : <strong> <?php echo $row['user-name'] ?> </strong></p>
    <p>Password : <strong> <?php echo $row['user-password'] ?> </strong></p>
    <p>First Name : <strong> <?php echo $row['first-name'] ?> </strong></p>
    <p>Surname : <strong> <?php echo $row['last-name'] ?> </strong></p>
    <p>Address : <strong> <?php echo $row['user-address'] ?> </strong></p>
    <p>Email Address : <strong> <?php echo $row['user-email'] ?> </strong></p>

    <a class="button" href="edit-user.php">Edit Details</a><br/><br/><br/>

  </div>

  <div class="four columns colour-option">

    <h4>Website Options</h4>

    <br/><br/>

        <form action="colour-picker.php" method="post">

          Select Website Accent Colour : <br/><br/>

          <input name="accent" type="hidden" id="color_value" value="df9aff">
          <button class="jscolor {valueElement: 'color_value'} colour-box"></button><br/><br/><br/>

          Select Website Colour  :<br/><br/>

          <input type="radio" name="textcolour" value="light" checked> Light<br/>
          <input type="radio" name="textcolour" value="dark"> Night Mode<br/><br/>

          <input type="submit" value="Edit Colours">

        </form>

    </div>

  </div>

  <br/><br/><hr/>

  <div class="row location-panel">
    <table class="u-full-width">

      <h4>My Basket</h4>

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

      $userid = $_SESSION['user-id'];

      require_once('db-connect.php');

      // Output users basket items

      $result = mysqli_query($link, '
      SELECT *, SUM(`order-quantity`) AS totalQuantity
      FROM `t_orderdetails`
      INNER JOIN `t_merchandise` ON t_merchandise.merchandise_id = t_orderdetails.merchandise_fk
      INNER JOIN `t_orders` ON t_orders.order_id = t_orderdetails.orderdetail_id
      GROUP BY merchandise_id;
      ');

      while($row = mysqli_fetch_array($result)){

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

  // Fallback for no items are returned

  if (mysqli_num_rows($result) < 1) {

    echo '<a href="shop.php" class="button">Add Items</a><br/><br/><br/>';

  } else {

    echo '<a class="button" href="checkout.php">Proceed to Checkout</a>';

  }

  ?>

  </div>

  </div>

</div>

</div>

<?php require_once('footer.php');

} else {

  // Redirect user if not logged in

  header('Location: sign-in.php');

} ?>
