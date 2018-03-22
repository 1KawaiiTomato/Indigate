<?php
include 'connectdb.php';
$query = $conn->prepare("UPDATE idea SET title=?, post=? WHERE id=?");
$query->bind_param('ssi', $_REQUEST['title'], $_REQUEST['post'], $_REQUEST['id']);
$query->execute();
print_r($query->get_result());
 ?>
