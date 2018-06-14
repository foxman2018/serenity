<?php

require_once('header.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

require_once('db-connect.php');

$query = "INSERT INTO `t_admin` (`admin-name`, `admin-password`, `admin-email`) VALUES ('$username', '$password', '$email')";

$result = mysqli_query($link, $query);

mysqli_close($link);

?>

<div class="container main-content">
  <div class="row title">

    <h5>New Admin Account Added</h5><br/><br/>

    <a class="button" href="sign-in.php">Log In</a>

  </div>
</div>

<?php require_once('footer.php'); ?>
