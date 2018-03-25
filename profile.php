<?php session_start(); if(!isset($_SESSION["id"])){header("Location: index.php");die();}?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1><?php echo "$_SESSION[name]"; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-2">
          <a href="myteams.php">My teams</a>
          <?php
          $sql = "SELECT admin FROM users WHERE id=?";
          $query = $conn->prepare($sql);
          $query->bind_param("i", $_SESSION['id']);
          $query->execute();
          if($query->get_result()->fetch_assoc()['admin']){
            echo '<div><a href="adminpanel.php">Administrator tools</a><div>';
          }
           ?>
        </div>
        <div class="col-xs-10">

        </div>
      </div>
    </div>
  </body>
</html>
