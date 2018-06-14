<?php

session_start();

// Store colour options chosen by user as session variables

$accent = $_POST['accent'];

$_SESSION['accent'] = $accent;

$textcolour = $_POST['textcolour'];

$_SESSION['textcolour'] = $textcolour;

header("Location: my-account.php");

?>
