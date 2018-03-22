<nav class="navbar navbar-inverse" style="border-radius: 0;">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#Menu">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php" style="color: white;">Indigate</a>
    </div>
    <div class="collapse navbar-collapse" id="Menu">
      <ul class="nav navbar-nav">
        <li><a href="index.php" style="color: lightblue">Home</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" style="color: lightblue;" href="">Teams<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <?php if(isset($_SESSION['id'])){echo '<li><a href="myteams.php">My teams</a></li>';} ?>
            <li><a href="browseteams.php">Browse teams</a></li>
          </ul>
        <li><a href="" style="color: lightblue;">Store</a></li>
        <li><a href="" style="color: lightblue;">Forum</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <<?php if(isset($_SESSION['id'])){include 'notificationbutton.php';} ?>
      <?php
      if(isset($_SESSION["id"])){
        echo '
          <li><a href="profile.php"><span class="glyphicon glyphicon-user"></span>' . $_SESSION['name'] . '</a></li>
          <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>';
      }else{
        echo '<ul class="nav navbar-nav navbar-right">
        <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Register</a></li>
        <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        ';
      }
       ?>
     </ul>
    </div>
  </div>
</nav>
<script type="text/javascript">
  $('[data-toggle="popover"]').popover({html:true});

  function deleteNotification(id){
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $("#not" + id).hide();
        if($("#notifications").text() > 1){
        $("#notifications").text($("#notifications").text() - 1);
      }else{
        $("#notifications").text("Notifications");
      }
        console.log(this.responseText);
      }
    };
  xmlhttp.open("POST", "deletenotification.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("nid=" + id);
  }
</script>
