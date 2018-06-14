<?php

session_start();

require_once('header.php');

?>

<img class="header-img" src="img/header-2.jpg" />

<div class="container main-content">
  <div class="row title">

    <div class="twelve columns title-header">
      <div class="opacity-screen">
        Shop
      </div>
    </div>
    <div class="twelve columns title">

      <h3>Shop with Serenity</h3>

      <hr/>

      <p>Serenity’s online spa shop is stocked with the full range of Serenity signature spa products. Choose from cleansers and toners, gifts for him, bath and body products to numerous different gift sets which would make the perfect present for all occasions. </p>

    </div>
  </div>

  <?php

  require_once('db-connect.php');

  $result = mysqli_query($link, 'SELECT * FROM t_merchandise');

  $i = 1;

  while($row = mysqli_fetch_array($result)){ ?>

      <div class="row item-list">
        <div class="five columns product">

          <?php

          // Add zero to item number if number has only 1 digit

          if ($i <= 9) {

            echo '<div class="item-number">0'.$i.'</div>';

          } else {

            echo '<div class="item-number">'.$i.'</div>';

          }

          echo '<span class="product-name">'.$row['merchandise-name'].' </span> ';

          echo '<td><img class="product-image" src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['merchandise-image'].'" /></td><br/><br/>';

          echo '<strong>€'.$row['merchandise-price'].'</strong><br/><br/>';

          // Only add to cart if user is logged on

          if (isset($_SESSION['user-id'])) {

          echo '<form action="add-to-cart.php" method="post">';

          echo '<input type="hidden" name="item" value="'.$row['merchandise_id'].'">';

          echo 'Quantity : <input type="number" name="quantity" value="1" min="1" max="50"><br/><br/>';

          echo '<input type="submit" value="Add To Cart"/><br/><br/>';

          echo '</form>';

          } else {

          // Redirect to login page

          echo '<a class="button" href="sign-in.php">Add To Cart</a><br/><br/>';

          }

          echo $row['merchandise-description'];

          ?>

        </div>

        <?php

        // Add space for every second item

        if ($i %2 == 0) {

          echo '</div>';

        } else {

          echo '<div class="two columns"><br/><br/><br/><br/><br/><br/></div>';

        }

          $i++;

        }

        mysqli_close($link);

        ?>

      </div>

  </div>

</div>

<?php require_once('footer.php'); ?>
