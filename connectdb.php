<?php
$servername = "localhost";
$username = "root";
$password = "1Amafkd1dy0ukn0wthat?";
$db = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 ?>
