<?php require_once('header.php'); ?>

<div class="container main-content">
  <div class="row">

    <form method="POST" action="update-location.php">

    <?php

    require_once('db-connect.php');


    $location_id=$_GET['location_id'];

    $query = "SELECT * FROM t_locations WHERE location_id='$location_id'";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    echo '<form action="update-location.php" method="post">';
    echo '<input type="hidden" name="location_id" value="'.$location_id.'"/>';
    echo '<input type="text" name="name" value="'.$row['location-name'].'"/><br/><br/>';
    echo '<input type="text" name="address" value="'.$row['location-address'].'"><br/><br/>';
    echo '<input type="text" name="phone" value="'.$row['location-phone'].'"/><br/><br/>';
    echo '<input class="add" type="submit"/>';

    echo '</form>';


    mysqli_close($link);

    ?>

  </div>
</div>

<?php require_once('footer.php'); ?>
