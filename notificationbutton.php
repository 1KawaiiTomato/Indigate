<li> <a title="Notifications" data-content="
  <?php
  include 'connectdb.php';
  $query = $conn->prepare("SELECT * FROM notification WHERE users_id=? ORDER BY id DESC;");
  $query->bind_param('i', $_SESSION['id']);
  $query->execute();
  $result = $query->get_result();
  if($result->num_rows > 0){
    while($row = $result->fetch_assoc()){
      echo '<div id=\''. "not" . $row['id'] .'\'>';
      echo '<a class=\'glyphicon glyphicon-remove\' onclick=\'deleteNotification('. $row['id'] .');\'></a><br>';
      echo $row['notification'];
      echo "<hr>";
      echo '</div>';
    }
  }else{
    echo "No notifications.";
  }
  ?>
  " data-toggle="popover" data-placement="bottom"><span class="glyphicon glyphicon-bell"></span>
  <?php
  if($result->num_rows > 0){
    echo '<span class="badge" id="notifications">';
    echo $result->num_rows;
    echo '</span>';
  }else{
    echo "Notifications";
  }
  ?>
</a>
</li>
