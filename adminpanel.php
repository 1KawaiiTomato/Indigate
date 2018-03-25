<?php session_start() ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <?php include 'includes.php'; ?>
  </head>
  <body onload="changeBackground();">
    <?php include 'menu.php'; ?>
    <div class="container-fluid">
      <h1>Administrator tools</h1><hr>
      <input type="text" onkeyup="refineSearch()" id="AdminSearch" placeholder="Search" class="form-control">
      <br>
      <div id="IdeaSearchOptions" hidden>
        <button type="button" class="btn btn-default" onclick="searchOnPost()">Search on post</button>
        <button type="button" class="btn btn-default" onclick="searchOnTitle()">Search on title</button>
        <button type="button" class="btn btn-default" onclick="searchOnId()">Search on id</button>
        <!--<button type="button" class="btn btn-default" onclick="this.firstElementChild.checked = !this.firstElementChild.checked;">
          <input type="checkbox" value="">
        </button>-->
      </div>
      <div id="CommentSearchOptions" hidden>
        <button type="button" class="btn btn-default" onclick="searchOnComment()">Search on comment</button>
        <button type="button" class="btn btn-default" onclick="searchOnId()">Search on id</button>
      </div>
      <div id="AssetSearchOptions" hidden>
        <button type="button" class="btn btn-default" onclick="searchOnId()">Search on id</button>
        <button type="button" class="btn btn-default" onclick="searchOnPath()">Search on path</button>
        <button type="button" class="btn btn-default" onclick="searchOnTeam_id()">Search on team_id</button>
      </div>
      <div id="UserSearchOptions" hidden>
        <button type="button" class="btn btn-default" onclick="searchOnId()">Search on id</button>
        <button type="button" class="btn btn-default" onclick="searchOnUsername()">Search on username</button>
        <button type="button" class="btn btn-default" onclick="searchOnPassword()">Search on password</button>
        <button type="button" class="btn btn-default" onclick="searchOnName()">Search on name</button>
        <button type="button" class="btn btn-default" onclick="searchOnForename()">Search on forename</button>
        <button type="button" class="btn btn-default" onclick="searchOnMail()">Search on mail</button>
        <button type="button" class="btn btn-default" onclick="searchOnAdmin()">Search on adminrights</button>
      </div>
      <div id="TeamSearchOptions" hidden>
        <button type="button" class="btn btn-default" onclick="searchOnId()">Search on id</button>
        <button type="button" class="btn btn-default" onclick="searchOnName()">Search on name</button>
        <button type="button" class="btn btn-default" onclick="searchOnDescription()">Search on description</button>
      </div>
      <div id="NotificationSearchOptions" hidden>
        <button type="button" class="btn btn-default" onclick="searchOnId()">Search on id</button>
        <button type="button" class="btn btn-default" onclick="searchOnNotification()">Search on notification</button>
        <button type="button" class="btn btn-default" onclick="searchOnUsers_id()">Search on user_id</button>
      </div>
      <hr>
      <button type="button" class="btn btn-default" onclick="SearchColumn='post';toggleIdeas();">Ideas</button>
      <button type="button" class="btn btn-default" onclick="SearchColumn='comment';toggleComments();">Comments</button>
      <button type="button" class="btn btn-default" onclick="SearchColumn='path';toggleAssets();">Assets</button>
      <button type="button" class="btn btn-default" onclick="SearchColumn='name';toggleTeams();">Teams</button>
      <button type="button" class="btn btn-default" onclick="SearchColumn='notification';toggleNotifications();">Notifications</button>
      <button type="button" class="btn btn-default" onclick="SearchColumn='username';toggleUsers();">Users</button>
      <script type="text/javascript" src="JS/AdminPanel.js"></script>
      <hr>
      <div class="col-xs-12" id="AdminCollection">
      </div>
    </div>
  </body>
</html>
