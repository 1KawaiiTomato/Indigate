<?php
function sendNotif()
{
  include 'getcurrentteam.php';
  $tid = $team['id'];
  $id_array = array();
  $sql = "SELECT users_id FROM users_team WHERE team_id='$tid';";
  $result = $conn->query($sql);
  print_r($result);
  while($row = $result->fetch_assoc()){
    echo $row['users_id'];
    array_push($id_array, $row['users_id']);
  }
  print_r($id_array);


  $query = $conn->prepare("INSERT INTO notification (notification, users_id) VALUES (?, ?);");
  foreach ($id_array as $id) {
    $message = $_SESSION['name'] . ' uploaded asset in team ' . $team['name'];
    $query->bind_param('si', $message, $id);
    $query->execute();
    print_r($query->get_result());
  }
}
$target_dir = "uploads/";

include 'getcurrentteam.php';
$sql = "INSERT INTO assets (path, team_id) VALUES ('tmp', '$team[id]')";
print_r($conn->query($sql));
$aid = $conn->insert_id;
$target_file = basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$target_file = $target_dir . $aid . "." . $imageFileType;

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        $sql = "UPDATE assets
        SET path='$target_file'
        WHERE id='$aid'";
        $conn->query($sql);
        sendNotif();
        header("Location: index.php");
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
