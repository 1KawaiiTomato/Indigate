<?php
if(isset($_POST['submittedidea'])){
  $title = $_POST['title'];
  $idea = $_POST['idea'];
  $id = $_SESSION['id'];
  $tid = $team['id'];
  $tn = $team['name'];
  $params = array($title, $idea, $id, $tid);
  $query = $conn->prepare("INSERT INTO idea (title, post, users_id, team_id) VALUES (?, ?, ?, ?)");
  $query->bind_param('ssii', $title, $idea, $id, $tid);
  $query->execute();


  $id_array = array();
  $sql = "SELECT users_id FROM users_team WHERE team_id='$tid';";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    array_push($id_array, $row['users_id']);
  }
  print_r($id_array);


  $query = $conn->prepare("INSERT INTO notification (notification, users_id) VALUES (?, ?);");
  foreach ($id_array as $id) {
    $message = 'new idea created in '.$tn;
    $query->bind_param('si', $message, $id);
    $query->execute();
    print_r($query->get_result());
  }
}
 ?>
