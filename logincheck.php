<?php
session_start();
if(!isset($_SESSION['id'])){
  header("Location: index.php");
  die("You must be logged in.");
}
 ?>
