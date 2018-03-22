<?php
if(isset($_POST["submit"])){
  if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    exit('Invalid email address'); // Use your own error handling ;)
  }

  include 'connectdb.php';

  $select = $conn->query("SELECT `Mail` FROM `users` WHERE `mail` = '".$_POST['email']."'");
  if(mysqli_num_rows($select)) {
      die('<div class="col-xs-12 text-center"><kbd style="background: red;">This email is already being used</kbd></div>');
  }

  $query = $conn->prepare("INSERT INTO users (name, forename, username, mail, password) VALUES (?, ?, ?, ?, ?);");
  $query->bind_param("sssss", $_POST["name"], $_POST["forename"], $_POST["username"], $_POST["email"], $_POST["password"]);
  $result = $query->execute();
  if($result){
    echo '<div class="col-xs-12 text-center"><kbd style="background: green;">Account created</kbd></div>';
  }
}
 ?>
