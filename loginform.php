<?php include 'loginuser.php'; ?>
<form class="form-horizontal" method="post" action="#">
  <div class="form-group">
    <div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
      <input type="text" class="form-control" placeholder="Username" name="username">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
      <input type="password" class="form-control" placeholder="Password" name="password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-xs-offset-1 col-xs-10 col-xs-offset-1">
      <button type="submit" class="btn btn-default" name="logging">Login</button>
      <?php if($_SERVER['REQUEST_URI'] != "/indigate/register.php"){
        echo '<a href="register.php" class="btn btn-default">Don\'t have an account?</a>';
      } ?>
    </div>
  </div>
</form>
