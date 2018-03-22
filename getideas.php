<?php
$sql = "SELECT * FROM idea WHERE team_id='$team[id]' ORDER BY id DESC";
$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
  if($row['active']){
  echo
  '<div class="col-xs-12 col-sm-4" id="idea'. $row['id'] .'">
    <div class="panel panel-default">
      <div class="panel-heading"><span>' . $row["title"] . '</span>
      <span><a href="#" title="Actions" data-toggle="popover" data-placement="right" data-content=\'
      <a href="fullidea.php?iid='.$row['id'].'&tid='. $team['id'] .'">Open</a><br>
      <a href="" onclick="deleteidea('. $row['id'] .');">Delete</a><br>
      <!--POPUP -->
      <a data-toggle="modal" data-target="#addcommentmodal">Edit</a>
        <div class="modal fade" id="addcommentmodal">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header"><h1>Edit idea</h1></div>
                <div class="modal-body">
                  <form class="form-horizontal" action="" method="post">
                    <input class="form-control" name="title" placeholder="Title" id="title'. $row['id'] .'"></input>
                    <textarea class="form-control" name="comment" placeholder="Comment" id="post'. $row['id'] .'"></textarea>
                    <button onclick="editidea('. $row['id'] .');" class="form-control btn btn-default">Edit</button>
                  </form>
                </div>
              <div class="modal-footer">
            </div>
          </div>
        </div>
      </div>
      <!-- END POPUP -->

      \'><span class="glyphicon glyphicon-option-vertical" style="float: right;"></span></a></span>
      </div>
      <div class="panel-body" style="overflow-y: hidden; max-height: 10vw;">' . $row["post"] . '</div>
    </div>
  </div>';
}
}
