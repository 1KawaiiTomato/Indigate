<?php
if(isset($_POST['addmember'])){
  $sql = "SELECT * FROM users WHERE mail='$_POST[addingmembermail]'";


  $result = $conn->query($sql);
  $user = $result->fetch_assoc();
  if(!in_array($user['id'], $members_id_array)){
    $query = $conn->prepare("INSERT INTO users_team (users_id, team_id, team_leader) VALUES (?, ?, ?)");
    $admin = 0;
    if(isset($_POST['admin_rights'])){
      $admin = 1;
    }
    $query->bind_param('ssi', $user['id'], $team['id'], $admin);
    $query->execute();
  }else{
    echo "<script type='text/javascript'>alert('Failed');</script>";
  }

}
 ?>
