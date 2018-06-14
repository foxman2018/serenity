<?php require_once('header.php'); ?>

<div class="container main-content">
<div class="row">

<form method="POST" action="update-package.php">

<?php

require_once('db-connect.php');

$package_id=$_GET['package_id'];

$query = "SELECT * FROM t_packages WHERE package_id='$package_id';";

$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);

echo '<form action="update-package.php" method="post">';
echo '<input type="hidden" name="package_id" value="'.$package_id.'"/>';
echo '<input type="text" name="name" value="'.$row['package-name'].'"/><br/><br/>';
echo '<input type="text" name="description" value="'.$row['package-description'].'"/><br/><br/>';
echo '<input type="text" name="price" value="'.$row['package-price'].'"/><br/><br/>';
echo '<input class="add" type="submit"/>';

echo '</form>';

mysqli_close($link);

?>

</div>
</div>

<?php require_once('footer.php'); ?>
