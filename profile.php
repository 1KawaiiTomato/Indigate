<?php session_start(); if(!isset($_SESSION["id"])){header("Location: index.php");die();}?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1><?php echo "$_SESSION[name]"; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-2">
          <a href="myteams.php">My teams</a><br>
          <span>BackgroundColor </span><input type="color" class="btn btn-default" onchange="setNewBgColor(<?php echo $_SESSION['id']; ?>);" id="bgColorPicker">
          <script type="text/javascript">
            function setNewBgColor(sid) {
              var color = document.getElementById("bgColorPicker").value;
              document.body.style.background = "linear-gradient(to top, "+ color +", white)";
              var xhttp = new XMLHttpRequest();
              xhttp.onreadystatechange = function() {
                  if (this.readyState == 4 && this.status == 200) {
                     // Typical action to be performed when the document is ready:
                     console.log(xhttp.responseText);
                  }
              };
              xhttp.open("POST", "ManageIdeas.php", true);
              xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xhttp.send("sql=UPDATE users SET bgColor='"+ color +"' WHERE id='"+ sid +"';");
            }
          </script>
          <?php
          $sql = "SELECT admin FROM users WHERE id=?";
          $query = $conn->prepare($sql);
          $query->bind_param("i", $_SESSION['id']);
          $query->execute();
          if($query->get_result()->fetch_assoc()['admin']){
            echo '<div><a href="adminpanel.php">Administrator tools</a><div>';
          }
           ?>
        </div>
        <div class="col-xs-10">

        </div>
      </div>
    </div>
  </body>
</html>
