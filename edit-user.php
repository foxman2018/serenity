<?php

session_start();
require_once('header.php');

?>

<div class="container main-content">
  <div class="row">

    <h4>Edit Details</h4><br/><br/>

    <?php

    require_once('db-connect.php');

    $id = $_SESSION['user-id'];

    $query = "SELECT * FROM `t_users` WHERE user_id = '$id'";

    $result = mysqli_query($link, $query);

    $row = mysqli_fetch_array($result);

    echo '<form action="update-user.php" method="post">';

    echo '<input type="hidden" name="user_id" value="'.$id.'"/>';
    echo '<input type="text" name="username" value="'.$row['user-name'].'"/><br/><br/>';
    echo '<input type="text" name="password" value="'.$row['user-password'].'"/><br/><br/>';
    echo '<input type="text" name="first-name" value="'.$row['first-name'].'"/><br/><br/>';
    echo '<input type="text" name="last-name" value="'.$row['last-name'].'"/><br/><br/>';
    echo '<input type="text" name="user-address" value="'.$row['user-address'].'"><br/><br/>';
    echo '<input type="text" name="user-email" value="'.$row['user-email'].'"/><br/><br/>';
    echo '<input class="add" type="submit"/>';

    echo '</form>';

    mysqli_close($link);

    ?>

  </div>
</div>

<?php require_once('footer.php'); ?>
