<?php

require_once('header.php');

$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$address = $_POST['address'];

require_once('db-connect.php');

$query = "INSERT INTO `t_users` (`user-name`, `user-password`, `user-email`, `user-address`, `first-name`, `last-name`) VALUES ('$username', '$password', '$email', '$address', '$firstname', '$lastname')";

$result = mysqli_query($link, $query);

mysqli_close($link);

?>

<div class="container main-content">
  <div class="row title">

    <h5>Congratulations, you have been added as a new user!</h5><br/><br/>
    <p>Please log in with your new details to explore what Serenity has to offer and what we can do for you.</p><br/><br/><br/><br/>

    <a class="button" href="sign-in.php">Log In</a>

  </div>
</div>

<?php require_once('footer.php'); ?>
