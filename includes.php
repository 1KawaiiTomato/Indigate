<link rel="stylesheet" href="bootstrap-3.3.7-dist/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="css/scrollbar.css">
<script src="jquery/jquery.min.js"></script>
<script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="images/favicon.png">
<title>Indigate</title>
<?php
if(isset($_SESSION['id'])){
  include 'connectdb.php';
  $sql = "SELECT bgColor FROM users WHERE id=?";
  $query = $conn->prepare($sql);
  $query->bind_param('i', $_SESSION['id']);
  $query->execute();
  $color = $query->get_result()->fetch_assoc();
  if($color['bgColor'] !== NULL){
    echo "<script>
    function changeBackground(){
      //document.body.style.background = \"". $color['bgColor'] ."\";
      document.body.style.background = \"linear-gradient(to top, ". $color["bgColor"] .", white)\";
    }
    </script>";
  }
}
 ?>
