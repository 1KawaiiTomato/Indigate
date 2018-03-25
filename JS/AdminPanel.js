var IdeasToggled = false;
var CommentsToggled = false;
var AssetsToggled = false;
var TeamsToggled = false;
var UsersToggled = false;
var NotificationsToggled = false;
var SearchField = "";
var SearchColumn = "post";
var query = "SELECT * FROM idea";

/////////////////////////////////////////// Search Toggles /////////////////////////////////////
function toggleAssets() {
  if(!AssetsToggled){closeAll();}
  AssetsToggled = !AssetsToggled;
  //Display the options
  document.getElementById('AssetSearchOptions').hidden = !AssetsToggled;
  if(AssetsToggled){
    sendQuery(generateQuery("assets"));
    console.log(query);
  }else{
    clean();
  }
}

function toggleNotifications() {
  if(!NotificationsToggled){closeAll();}
  NotificationsToggled = !NotificationsToggled;
  //Display the options
  document.getElementById('NotificationSearchOptions').hidden = !NotificationsToggled;
  if(NotificationsToggled){
    sendQuery(generateQuery("notification"));
    console.log(query);
  }else{
    clean();
  }
}

function toggleUsers() {
  if(!UsersToggled){closeAll();}
  UsersToggled = !UsersToggled;
  //Display the options
  document.getElementById('UserSearchOptions').hidden = !UsersToggled;
  if(UsersToggled){
    sendQuery(generateQuery("users"));
    console.log(query);
  }else{
    clean();
  }
}

function toggleTeams() {
  if(!TeamsToggled){closeAll();}
  TeamsToggled = !TeamsToggled;
  //Display the options
  document.getElementById('TeamSearchOptions').hidden = !TeamsToggled;
  if(TeamsToggled){
    sendQuery(generateQuery("team"));
    console.log(query);
  }else{
    clean();
  }
}

function toggleComments(){
  if(!CommentsToggled){closeAll();}
  CommentsToggled = !CommentsToggled;
  //Display options
  document.getElementById('CommentSearchOptions').hidden = !CommentsToggled;
  if(CommentsToggled){
    sendQuery(generateQuery("comment"));
    console.log(query);
  }else{
    clean();
  }
}

function toggleIdeas(){
  if(!IdeasToggled){closeAll();}
  IdeasToggled = !IdeasToggled;
  //Display options
  document.getElementById('IdeaSearchOptions').hidden = !IdeasToggled;
  if(IdeasToggled){
    //Query for ideas and get input.
    sendQuery(generateQuery("idea"));
    console.log(query);
  }else{
    clean();
  }
}
/////////////////////////////////////////// Queries and manipulating resultDiv /////////////////////////////////////////////////////////

function sendQuery(query) {
  //Setup XMLHttpRequest
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('AdminCollection').innerHTML = this.responseText;
    }
  };
  //Send request
  xmlhttp.open("POST", "ManageIdeas.php", true);
  xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xmlhttp.send("sql=" + query);

}

function clean(){
  //Reset search id and SearchField
  document.getElementById('AdminSearch').value = "";
  SearchField = "";
  //Empty admin info div
  document.getElementById('AdminCollection').innerHTML = "";
}

function generateQuery(table) {
  return "SELECT * FROM "+ table +" WHERE " + SearchColumn + " LIKE '%25"+ SearchField +"%25' LIMIT 5;";
}

function closeAll() {
  switch (true) {
    case IdeasToggled:
      toggleIdeas();
      break;
    case CommentsToggled:
      toggleComments();
      break;
    case TeamsToggled:
      toggleTeams();
      break;
    case UsersToggled:
      toggleUsers();
      break;
    case NotificationsToggled:
      toggleNotifications();
      break;
    case AssetsToggled:
      toggleAssets();
      break;
  }
}

function refineSearch(){
  SearchField = document.getElementById("AdminSearch").value;
  switch (true) {
    case IdeasToggled:
      IdeasToggled = false;
      toggleIdeas();
      break;
    case CommentsToggled:
      CommentsToggled = false;
      toggleComments();
      break;
    case TeamsToggled:
      TeamsToggled = false;
      toggleTeams();
      break;
    case UsersToggled:
      UsersToggled = false;
      toggleUsers();
      break;
    case NotificationsToggled:
      NotificationsToggled = false;
      toggleNotifications();
      break;
    case AssetsToggled:
      AssetsToggled = false;
      toggleAssets();
      break;
    default:
      alert("Select something to look for.");
  }
}
////////////////////////////////// Set search options /////////////////////////////////////////////////
function searchOnPath() {
  SearchColumn = "path";
  refineSearch();
}
function searchOnTeam_id() {
  SearchColumn = "team_id";
  refineSearch();
}
function searchOnUsers_id() {
  SearchColumn = "users_id";
  refineSearch();
}
function searchOnNotification() {
  SearchColumn = "notification";
  refineSearch();
}
function searchOnUsername() {
  SearchColumn = "username";
  refineSearch();
}
function searchOnPassword() {
  SearchColumn = "password";
  refineSearch();
}
function searchOnForename() {
  SearchColumn = "forename";
  refineSearch();
}
function searchOnName() {
  SearchColumn = "name";
  refineSearch();
}
function searchOnMail() {
  SearchColumn = "mail";
  refineSearch();
}
function searchOnAdmin() {
  SearchColumn = "admin";
  refineSearch();
}
function searchOnDescription() {
  SearchColumn = "description";
  refineSearch();
}
function searchOnName() {
  SearchColumn = "name";
  refineSearch();
}
function searchOnPost(){
  SearchColumn = "post";
  refineSearch();
}
function searchOnTitle() {
  SearchColumn = "title";
  refineSearch();
}
function searchOnId() {
  SearchColumn = "id";
  refineSearch();
}
function searchOnComment(){
  SearchColumn = "comment";
  refineSearch();
}
