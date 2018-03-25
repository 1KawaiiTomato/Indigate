<?php session_start(); ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'menu.php'; ?>
    <?php session_unset();session_destroy();header("Location: index.php");die();?>
    <a href="index.php"> if not manually redirected, click here.</a>
  </body>
</html>
