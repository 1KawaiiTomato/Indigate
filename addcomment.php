<?php
if(isset($_POST['submittedcomment'])){
  include 'getcurrentteam.php';

  $query = $conn->prepare("INSERT INTO comment (comment, users_id, idea_id) VALUES (?, ?, ?)");
  $query->bind_param('sii', $_POST['comment'], $_SESSION['id'], $_GET['iid']);
  $query->execute();


  $query = $conn->prepare("SELECT title FROM idea WHERE id=?");
  $query->bind_param('i', $_GET['iid']);
  $query->execute();
  $result = $query->get_result();
  print_r($result);
  $ideaName = $result->fetch_assoc()['title'];
  echo $ideaName;


  $tid = $team['id'];
  $id_array = array();
  $sql = "SELECT users_id FROM users_team WHERE team_id='$tid';";
  $result = $conn->query($sql);
  print_r($result);
  while($row = $result->fetch_assoc()){
    //echo $row['users_id'];
    if($row["users_id"] != $_SESSION['id']){
      array_push($id_array, $row['users_id']);
    }
  }
  //print_r($id_array);


  $query = $conn->prepare("INSERT INTO notification (notification, users_id) VALUES (?, ?);");
  foreach ($id_array as $id) {
    $message = $_SESSION['name'] . ' commented on idea ' . $ideaName;
    $query->bind_param('si', $message, $id);
    $query->execute();
    print_r($query->get_result());
  }
}
 ?>
