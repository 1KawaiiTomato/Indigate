<?php
include 'connectdb.php';
$query = $conn->prepare("SELECT * FROM team WHERE id=?;");
$query->bind_param('i', $_GET['tid']);
$query->execute();
$team = $query->get_result()->fetch_assoc();
 ?>
