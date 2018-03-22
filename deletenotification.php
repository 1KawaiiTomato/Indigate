<?php
include 'connectdb.php';
$query = $conn->prepare("DELETE FROM notification WHERE id=?;");
$query->bind_param('i', $_REQUEST['nid']);
$query->execute();
print_r($query->get_result());
 ?>
