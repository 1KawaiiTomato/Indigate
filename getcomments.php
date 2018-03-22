<?php
$namequery = $conn->prepare("SELECT username FROM users WHERE id=?");
$query = $conn->prepare("SELECT comment, users_id FROM comment WHERE idea_id=? ORDER BY id DESC");
$query->bind_param('i', $_GET['iid']);
$query->execute();
$result = $query->get_result();
while ($row = $result->fetch_assoc()){
  $namequery->bind_param('i', $row['users_id']);
  $namequery->execute();
  $name = $namequery->get_result()->fetch_assoc();
  echo '<div class="well well-lg">';
  echo $name['username'] . ":<br>";
  echo $row['comment'];
  echo '</div>';
}
 ?>
