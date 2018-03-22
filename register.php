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
    <div class="fluid-container">
      <div class="row">
        <div class="col-xs-12 col-sm-6" style="border-right: 1px solid lightgray">
          <div class="row">
            <div class="col-xs-offset-1 col-xs-11">
              <h1>Create an account.</h1>
            </div>
          </div>
          <div class="row">
            <?php include 'registerform.php'; ?>
          </div>
        </div>
        <div class="col-xs-12 col-sm-6">
          <div class="row">
            <div class="col-xs-offset-1 col-xs-11">
              <h1>Or log in.</h1>
            </div>
          </div>
          <div class="row">
            <?php include 'loginform.php'; ?>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
