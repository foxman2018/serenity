<?php

session_start();

// Check if an admin is logged in

if (isset($_SESSION['admin-id'])) {

require_once('header.php'); ?>

<br/><br/><br/><br/>

<div class="container">
  <div class="row location-panel">
    <table class="u-full-width">

      <h5>Locations</h5>

      <br/><br/>

      <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Address</th>
        <th>Phone</th>
        <th></th>
      </tr>
    </thead>

    <tbody>

    <?php

    require_once('db-connect.php');

    // Retrieve all location data

    $result = mysqli_query($link, 'SELECT * FROM t_locations');

    while($row = mysqli_fetch_array($result)){

      $location_id = $row['location_id'];

      echo '<tr>';
      echo '<td><img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['location-image'].'" /></td>';
      echo '<td>'.$row['location-name'].'</td>';
      echo '<td>'.$row['location-address'].'</td>';
      echo '<td>'.$row['location-phone'].'</td>';
      echo '<td class="delete"><a href="edit-location.php?location_id='.$row['location_id'].'">Edit</a><br/><br/><a class="delete-button" href="delete-location.php?location_id='.$row['location_id'].'">Delete</a></td>';

    }

    ?>

  </tbody>

  </table>

  <a class="button add-panel">Add a New Location</a>

    <div class="add-panel-form">
      <br/><br/>
      <form action="add-location.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadedFile" id="fileToUpload"><br/><br/>
        <input type="text" name="name" placeholder="Location Name"><br/><br/>
        <input type="text" name="address" placeholder="Location Address"><br/><br/>
        <input type="text" name="phone" placeholder="Location Phone"><br/><br/>
        <input class="add" type="submit" value="Add">
      </form>

    </div>

  </div>

  <div class="row location-panel">
    <table class="u-full-width">

      <h5>Packages</h5>

      <br/><br/>

      <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>

    <tbody>

    <?php

    require_once('db-connect.php');

    // Retrieve all package data

    $result = mysqli_query($link, 'SELECT * FROM t_packages');

    while($row = mysqli_fetch_array($result)){

      $package_id = $row['package_id'];

      echo '<tr>';
      echo '<td><img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['package-image'].'" /></td>';
      echo '<td>'.$row['package-name'].'</td>';
      echo '<td>'.$row['package-description'].'</td>';
      echo '<td>€'.$row['package-price'].'</td>';
      echo '<td class="delete"><a href="edit-package.php?package_id='.$row['package_id'].'">Edit</a><br/><br/><a class="delete-button" href="delete-package.php?package_id='.$row['package_id'].'">Delete</a></td>';

    }

    ?>

  </tbody>

  </table>

    <a class="button add-panel">Add a New Package</a>

    <div class="add-panel-form">
      <br/><br/>
      <form action="add-package.php" method="post" enctype="multipart/form-data">
        <input type="file" name="uploadedFile" id="fileToUpload"><br/><br/>
        <input type="text" name="name" placeholder="Package Name"><br/><br/>
        <textarea type="text" name="description" placeholder="Package Description"></textarea><br/><br/>
        <input type="text" name="price" placeholder="Package Price"><br/><br/>
        <input class="add" type="submit" value="Add">
      </form>

    </div>

  </div>

  <div class="row location-panel">
    <table class="u-full-width">

      <h5>Products</h5>

      <br/><br/>

      <thead>
      <tr>
        <th>Image</th>
        <th>Name</th>
        <th>Description</th>
        <th>Price</th>
        <th></th>
      </tr>
    </thead>

    <tbody>

    <?php

    require_once('db-connect.php');

    // Retrieve all merchandise data

    $result = mysqli_query($link, 'SELECT * FROM t_merchandise');

    while($row = mysqli_fetch_array($result)){

      $merchandise_id = $row['merchandise_id'];

      echo '<tr>';
      echo '<td><img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['merchandise-image'].'" /></td>';
      echo '<td>'.$row['merchandise-name'].'</td>';
      echo '<td>'.$row['merchandise-description'].'</td>';
      echo '<td>€'.$row['merchandise-price'].'</td>';
      echo '<td class="delete"><a href="edit-product.php?merchandise_id='.$row['merchandise_id'].'">Edit</a><br/><br/><a class="delete-button" href="delete-product.php?merchandise_id='.$row['merchandise_id'].'">Delete</a></td>';

    }

    ?>

  </tbody>

  </table>

  <a class="button add-panel">Add a New Product</a>

  <div class="add-panel-form">
    <br/><br/>
    <form action="add-product.php" method="post" enctype="multipart/form-data">
      <input type="file" name="uploadedFile" id="fileToUpload"><br/><br/>
      <input type="text" name="name" placeholder="Product Name"><br/><br/>
      <textarea type="text" name="description" placeholder="Product Description"></textarea><br/><br/>
      <input type="text" name="price" placeholder="Product Price"><br/><br/>
      <input class="add" type="submit" value="Add">
    </form>

  </div>

  </div>


  <div class="row">
    <div class="twelve columns">
    <br/><br/>
    <h5>Add New Admin Account</h5>
    <br/><br/>
    <form action="add-admin.php" method="post" autocomplete="false">
      <!-- Remove Chrome Autofill with dummy inputs-->
      <input style="display:none;" type="text" name="somefakename" />

      <input type="text" name="username" placeholder="Username"><br/><br/>
      <input type="password" name="password" placeholder="Password" autocomplete="new-password"><br/><br/>
      <input type="text" name="email" placeholder="Email Address"><br/><br/>
      <input class="button" type="submit" name="register" value="Add New">
    </form>

  </div>



  </div>

  </div>

</div>

</div>


<?php require_once('footer.php');

} else {

  header('Location: sign-in.php');

}

?>
