<?php include 'logincheck.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-lg-6" style="border-right: 1px solid lightgray;">
          <div class="row">
            <div class="col-xs-12">
              <h1>Create team.</h1>
            </div>
          </div>
          <?php include 'addteam.php'; ?>
        </div>
        <div class="col-xs-12 col-lg-6">
          <div class="row">
            <div class="col-xs-12">
              <h1>My teams.</h1>
            </div>
          </div>
          <?php include 'getteams.php'; ?>
        </div>
      </div>
    </div>
  </body>
</html>
