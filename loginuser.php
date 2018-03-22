<?php
if(isset($_POST['logging']) && isset($_POST['username']) && isset($_POST['password'])){
  include("connectdb.php");
  $query = $conn->prepare("SELECT * FROM users WHERE username=?;");
  $query->bind_param('s', $_POST['username']);
  $query->execute();
  $result = $query->get_result();
  if(mysqli_num_rows($result)) {
    $user = $result->fetch_assoc();
    if($_POST['password'] == $user['password']){

      $_SESSION["id"] = $user["id"];
      $_SESSION["name"] = $user["username"];
      header("Location: index.php");
      die();
    }else{
      echo "<div class='row'><div class='col-xs-offset-1 col-xs-11'><kbd style='background: red;'>wrong password</kbd></div></div>";
    }
  }else{
    echo "<div class='row'><div class='col-xs-offset-1 col-xs-11'><kbd style='background: red;'>Account does not exist</kbd></div></div>";
  }
}
 ?>
