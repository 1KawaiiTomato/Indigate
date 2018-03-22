<?php
$query =  $conn->prepare("SELECT path FROM assets WHERE team_id=? ORDER BY id DESC");
$query->bind_param('i', $_GET['tid']);
$query->execute();
$query->store_result();
$query->bind_result($path);
while($query->fetch()){
  echo '<div class="col-xs-12 text-center">';
  echo "<img src=" . $path . ' alt="img" style="width: 50%;">';
  echo "<hr></div>";
}
$query->free_result();
$query->close();
 ?>
