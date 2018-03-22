<?php
session_start();
if(!isset($_SESSION['id']) || !$_GET['tid']){
  header("Location: index.php");
  die("You didn't load a team");
}
 ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body>
    <?php include 'menu.php'; ?>
    <?php include 'getcurrentteam.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12 col-lg-6">
          <h1><?php echo $team['name']; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
          <a class="btn btn-default" <?php echo 'href="' . 'myteampage.php?tid=' . $_GET['tid'] . '"'; ?>>back</a>
          <button type="button" class="btn btn-default" name="button" data-toggle="modal" data-target="#addmembermodal">Add 2d assets</button>
            <div class="modal fade" id="addmembermodal" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"><h1>Add 2d assets</h1></div>
                    <div class="modal-body">
                      <form class="form-horizontal" <?php echo 'action="upload.php?tid=' . $_GET['tid'] . '"'; ?> method="post" enctype="multipart/form-data">
                        <label class="form-control btn btn-default">
                          <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" style="display: none;" onchange="$('#upload-file-info').html(this.files[0].name)">
                          Click here to select file.
                          <span class='label label-info' id="upload-file-info"></span>
                        </label>
                        <input class="form-control" type="submit" value="Upload" name="submit">
                      </form>
                  </div>
                  <div class="modal-footer">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <hr>
        <?php include 'getassets.php'; ?>
      </div>
    </div>
  </body>
</html>
