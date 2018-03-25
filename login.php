<?php
session_start();
if(isset($_SESSION['id'])){
  header('Location: index.php');
  die("Already logged in.");
}
?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'menu.php'; ?>
    <div class="fluid-container">
      <div class="row">
        <?php include 'loginform.php'; ?>
      </div>
    </div>
  </body>
</html>
