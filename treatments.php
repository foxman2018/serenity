<?php require_once('header.php'); ?>

<img class="header-img" src="img/header-1.jpg" />

<div class="container main-content">
  <div class="row title">
    <div class="twelve columns title-header">
      <div class="opacity-screen">
        Treatments
      </div>
    </div>
    <div class="twelve columns title">

      <h3>Treatments with Serenity</h3>

      <hr/>

      <p>With over 20 years industry expertise their specialised team have the latest on trend treatments to offer from lazer and semi-permanent make up to their very own signature treatments using their own Serenity product creations using Irish resources and produce to cater to every individual client's needs. Get in touch with one of our locations to arrange a session with one of our treatment specialists .</p>

    </div>
  </div>

  <?php

  require_once('db-connect.php');

  $i = 1;

  $result = mysqli_query($link, 'SELECT * FROM t_packages');

  while($row = mysqli_fetch_array($result)){ ?>

    <div class="row item-list">
      <div class="six columns">

        <?php

        echo '<span class="package-name">'.$row['package-name'].'</span>';

        echo '<div class="package-info">';

        // Add zero to item number if number has only 1 digit

        if ($i <= 9) {

          echo '<div class="package-number">0'.$i.'</div>';

        } else {

          echo '<div class="package-number">'.$i.'</div>';

        }

        echo '<div class="item-divider"></div>';

        echo '<strong>€'.$row['package-price'].'</strong><br/><br/> ';

        echo $row['package-description'].'</div>';

        ?>

      </div>

      <div class="six columns">

        <?php echo '<td><img src="'.dirname($_SERVER['PHP_SELF']).'/uploads/'.$row['package-image'].'" /></td>'; ?>

      </div>

    </div>

    <?php

    $i++;

    }

    mysqli_close($link);

    ?>

</div>

<?php require_once('footer.php'); ?>
