<?php
session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body>
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <form class="form" method="get">
            <div class="row">
              <div class="form-group col-xs-9">
                <input type="text" class="form-control" name="search" placeholder="search">
              </div>
              <div class="col-xs-3">
                <button type="submit" class="btn btn-default btn-block" name="searching">search</button>
              </div>
            </div>
          </form>
        </div>
      </div>

    <?php
    include("connectdb.php");

    $sql = "SELECT * FROM team";
    if(isset($_GET["searching"])){
      $search = $_GET['search'];
      $sql = "SELECT * FROM team WHERE name LIKE '%$search%' OR description LIKE '%$search%'";
    }
    $result = $conn->query($sql);

    echo "<hr>";
    while($row = $result->fetch_assoc()){
      echo $row['name'] . "<br>" . $row['description'] . "<br><hr>";
    }
     ?>
   </div>
  </body>
</html>
