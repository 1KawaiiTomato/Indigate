<?php
if(isset($_SESSION['id'])){

  include("connectdb.php");

  $sql = "SELECT team_id FROM users_team WHERE users_id=$_SESSION[id];";
  $result = $conn->query($sql);

  $id_array = [];
  while($row = $result->fetch_assoc()){
    array_push($id_array, $row['team_id']);
  }

  $id_array = implode(", ", $id_array);
  $sql = "SELECT * FROM team WHERE id IN ($id_array);";
  $result = $conn->query($sql);

  if(!$result){
    echo "No teams yet.";
    return;
  }

  echo "<div class='container-fluid'>";
  $count = 0;
  while($row = $result->fetch_assoc()){
    echo '
    <div class="row">
  <button type="button" class="btn btn-lg btn-info collapsed btn-block" data-toggle="collapse" data-target="#collapsedesc'. $count .'">'
  . $row["name"];
  ///////////////////////////////////////////////////////////////////////////////////////////
                    // TODO: add icon if team_leader
  ///////////////////////////////////////////////////////////////////////////////////////////
  echo '</button>
  <div id="collapsedesc' . $count . '" class="collapse">
  <div class="jumbotron">
  '. $row['description'] . "<div class='text-right'><a href='myteampage.php?tid=" . $row['id'] . "'>Open team</a></div>" . '
  </div>
  </div>
  </div>
    ';
    $count++;
  }
  echo "</div>";
}
 ?>
