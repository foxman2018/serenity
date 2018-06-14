<?php

session_start();

// Kill the session and return home

if (session_destroy()) {

  header("Location: index.php");

}

?>
