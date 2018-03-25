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
  <body onload="changeBackground();">
    <?php include 'getcurrentteam.php'; ?>
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          <h1><?php echo $team['name']; ?></h1>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
            <a class="btn btn-default" <?php echo 'href="' . 'myteampage.php?tid=' . $_GET['tid'] . '"'; ?>>back</a>

            <!--POPUP -->
            <button type="button" class="btn btn-default" name="button" data-toggle="modal" data-target="#addmembermodal">Add idea</button>
              <div class="modal fade" id="addmembermodal" role="dialog">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header"><h1>Add idea</h1></div>
                      <div class="modal-body">
                        <form class="form-horizontal" action="#" method="post">
                          <input class="form-control" name="title" placeholder="Title">
                          <textarea class="form-control" name="idea" placeholder="Idea"></textarea>
                          <button type="submit" class="form-control btn btn-default" name="submittedidea">Add</button>
                        </form>
                        <?php include 'addidea.php'; ?>
                      </div>
                    <div class="modal-footer">
                  </div>
                </div>
              </div>
            </div>
            <!-- END POPUP -->
            <hr>
            <div id='debug'>

            </div>
            <?php include 'getideas.php'; ?>
            <script>
            function editidea(id){
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  //alert(this.responseText);
                }
              };
              var title = $("#title" + id).val();
              var post = $("#post" + id).val();
              xmlhttp.open("POST", "editidea.php", true);
              xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
              xmlhttp.send("id=" + id + "&title=" + title + "&post=" + post);
            }
            function deleteidea(id){
              console.log("deleting");
              var xmlhttp = new XMLHttpRequest();
              xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                  $("#idea" + id).hide();
                  console.log(this.responseText);
                  alert(this.responseText);
                  //console.log("done");
                }
              };
            xmlhttp.open("POST", "deleteidea.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("id=" + id);
          }
            </script>
            <script>
              $(document).ready(function(){
                  $("[data-toggle=popover]").popover({html:true});
              });
            </script>
        </div>
      </div>
    </div>
  </body>
</html>
