<?php
include 'connectdb.php';
$sql = $_REQUEST['sql'];
$result = $conn->query($sql);
echo "Debug info: " . $sql . "<hr>";
while ($row = $result->fetch_assoc()) {
  $keys = array_keys($row);
  foreach($keys as $key) {
      echo $key . " : " . $row[$key] . '<br>';
      if($key == "path"){
        echo "<img style='width: 50%;' src='". $row[$key] ."'><br>";
      }
  }
  echo "<hr>";
}
 ?>
