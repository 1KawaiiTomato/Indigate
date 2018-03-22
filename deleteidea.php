<?php
include 'connectdb.php';
$sql = "UPDATE idea SET active='0' WHERE id=?";
$query = $conn->prepare($sql);
$query->bind_param('i', $_REQUEST['id']);
$query->execute();
print_r($query->get_result());
//echo $sql;
 ?>
