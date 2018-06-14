<?php require_once('header.php'); ?>

<img class="header-img" src="img/header-3.jpg" />

<div class="container main-content">
  <div class="row title">

  <div class="twelve columns title-header">
    <div class="opacity-screen">
      Locations
    </div>
  </div>
  <div class="twelve columns title location">

    <h3>Locations with Serenity</h3>

    <hr/>

    <p> Indulge in an experience for mind, body and soul with our tailored treatments menu to help transcend you into a world of escapism and pure relaxation at our various locations situated in the South East.</p>

  </div>

<?php

require_once('db-connect.php');

$i = 1;

$result = mysqli_query($link, 'SELECT * FROM t_locations');

while($row = mysqli_fetch_array($result)){

  echo '<div class="location-number">';

  // Add a zero to the front of the number if number is only 1 digit

  if ($i <= 9) {

    echo '<div class="package-number">0'.$i.'</div>';

  } else {

    echo '<div class="package-number">'.$i.'</div>';

  }

  echo '<div class="location-name"><h4>'.$row['location-name'].'</h4></div></div>';

  echo '<td><img class="location-image" src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['location-image'].'" /></td>';
  echo '<div class="location-address">Located at : <strong>'.$row['location-address'].'</strong></div><br/>';
  echo '<div class="location-phone">Call us on : <strong>'.$row['location-phone'].'</strong></div>';

  $i++;

?>

  <hr/>

<?php

}

mysqli_close($link);

?>

</div>

<?php require_once('footer.php'); ?>
