<?php
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
$sql = "SELECT users_id FROM users_team WHERE team_id='$_GET[tid]'";
$result = $conn->query($sql);
$id_array = [];
while($row = $result->fetch_assoc()){
  array_push($id_array, $row['users_id']);
}
$id_array = implode(", ", $id_array);

$sql = "SELECT * FROM users WHERE id IN ($id_array);";
$result = $conn->query($sql);
$members_id_array = [];
while($row = $result->fetch_assoc()){
  array_push($members_id_array, $row['id']);
  echo "<a href='";
  if($row['username'] == $_SESSION['name']){
    echo "profile.php";
  }
  echo "'>";
  echo $row['username'] . "</a><br>";
}
 ?>
