<?php include 'logincheck.php'; ?>
<!DOCTYPE html>
<html>
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'menu.php'; ?>
    <?php include 'connectdb.php'; ?>
    <?php include 'getcurrentteam.php'; ?>
    <?php $query = $conn->prepare("SELECT * FROM idea WHERE id=?;");
          $query->bind_param('i', $_GET['iid']);
          $query->execute();
          $result = $query->get_result();
          $idea = $result->fetch_assoc();
     ?>
     <div class="container-fluid">
       <div class="row">
         <div class="col-xs-6">
           <div class="jumbotron">
             <h1><?php echo $idea['title']; ?></h1>
             <p>
               <?php echo $idea['post']; ?></div>
             </p>
         </div>
         <div class="col-xs-6">
           <div class="jumbotron">
             <h1>Comments</h1>
             <!--POPUP -->
             <button type="button" class="btn btn-default btn-block" name="button" data-toggle="modal" data-target="#addcommentmodal">Add comment</button>
               <div class="modal fade" id="addcommentmodal">
                 <div class="modal-dialog">
                   <div class="modal-content">
                     <div class="modal-header"><h1>Add comment</h1></div>
                       <div class="modal-body">
                         <form class="form-horizontal" action="" method="post">
                           <textarea class="form-control" name="comment" placeholder="Comment"></textarea>
                           <button type="submit" class="form-control btn btn-default" name="submittedcomment">Add</button>
                         </form>
                         <?php include 'addcomment.php'; ?>
                       </div>
                     <div class="modal-footer">
                   </div>
                 </div>
               </div>
             </div>
             <!-- END POPUP -->
           </div>
           <?php include 'getcomments.php'; ?>
         </div>
       </div>
     </div>
  </body>
</html>
