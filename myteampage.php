<?php include 'logincheck.php'; ?>
<?php if(!isset($_GET['tid']) || !$_GET['tid']){header("Location: index.php");} ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'getcurrentteam.php'; ?>
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
      <div class="col-xs-12 col-lg-6">
        <div class="row">
          <div class="col-xs-12">
            <h1><?php echo $team['name']; ?></h1>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <p><?php echo $team['description']; ?></p><hr>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-6">
            <?php echo '<a href="assets.php?tid=' . "$team[id]" . '"type="button" class="btn btn-primary">Assets</a>'; ?>

            <a class="btn btn-primary" <?php echo 'href="' . 'ideas.php?tid=' . $_GET['tid'] . '"'; ?>>Ideas</a>
            <a class="btn btn-primary" disabled>Code</a>
          </div>
        </div>
      </div>
      <div class="col-xs-12 col-lg-6" style="border-left: solid 1px lightgray;">
        <div class="row">
          <div class="col-xs-12">
            <h1>Members:</h1>
          </div>
        </div>
        <div class="row">
          <div class="col-xs-12">
            <div style="height: 19vw; overflow-y: scroll;">
              <?php include 'getmembers.php'; ?>
            </div>
          </div>
          <div class="col-xs-12">
            <div class="row" style="height: 1vw;">
            </div>
            <div class="row">
              <div class="col-xs-12">
                <?php
                $sql = "SELECT team_leader FROM users_team WHERE users_id='$_SESSION[id]' AND team_id='$team[id]'";

                $result = $conn->query($sql);
                $admin = $result->fetch_assoc();
                if($admin['team_leader']){
                  echo '
                  <div class="container">
                  <button type="button" class="btn btn-default" name="button" data-toggle="modal" data-target="#addmembermodal">Add member</button>
                  <div class="modal fade" id="addmembermodal" role="dialog">
                  <div class="modal-dialog">
                  <div class="modal-content">
                  <div class="modal-header">
                  <h1>Add a member</h1>
                  </div>
                  <div class="modal-body">
                  <form class="form-inline" action="#" method="post">
                  <div class="">
                  <input type="text" class="form-control" name="addingmembermail" placeholder="email">
                  <button type="submit" class="btn btn-default" name="addmember">Add</button>
                  </div>
                  <div class="">
                  <input type="checkbox" name="admin_rights"> Admin rights<br>
                  </div>
                  </form>
                  </div>
                  <div class="modal-footer">
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>';
                }
                 ?>
              </div>
              <?php include "addmember.php"; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
