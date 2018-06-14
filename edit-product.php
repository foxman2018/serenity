<?php require_once('header.php'); ?>

<div class="container main-content">
<div class="row">

<form method="POST" action="update-package.php">

<?php

require_once('db-connect.php');

$merchandise_id=$_GET['merchandise_id'];

$query = "SELECT * FROM t_merchandise WHERE merchandise_id='$merchandise_id';";

$result = mysqli_query($link, $query);

$row = mysqli_fetch_array($result);

echo '<form action="update-merchandise.php" method="post">';
echo '<input type="hidden" name="merchandise_id" value="'.$merchandise_id.'"/>';
echo '<input type="text" name="name" value="'.$row['merchandise-name'].'"/><br/><br/>';
echo '<input type="text" name="description" value="'.$row['merchandise-description'].'"/><br/><br/>';
echo '<input type="text" name="price" value="'.$row['merchandise-price'].'"/><br/><br/>';
echo '<input class="add" type="submit"/>';
echo '</form>';

mysqli_close($link);

?>

</div>
</div>

<?php require_once('footer.php'); ?>
