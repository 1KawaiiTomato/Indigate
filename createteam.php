<?php
if(isset($_POST['submit'])){
  $servername = "localhost";
  $username = "root";
  $password = "1Amafkd1dy0ukn0wthat?";
  $db = "mydb";

  // Create connection
  $conn = new mysqli($servername, $username, $password, $db);

  // Check connection
  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }
  $name = $_POST["name"];
  $description = $_POST["description"];
  $sql = "INSERT INTO team (name, description) VALUES ('$name', '$description');";
  $conn->query($sql);

  $team_id = $conn->insert_id;

  $sql = "SELECT * FROM users_team;";
  $result = $conn->query($sql);


  $username = $_SESSION['name'];
  $sql = "SELECT id FROM users WHERE username='$username';";
  $user_id = $conn->query($sql)->fetch_assoc()['id'];

  $sql = "INSERT INTO users_team (users_id, team_id, team_leader) VALUES ('$user_id', '$team_id', '1');";
  $result = $conn->query($sql);


  $sql = "SELECT * FROM users_team;";
  $result = $conn->query($sql);
}
 ?>
