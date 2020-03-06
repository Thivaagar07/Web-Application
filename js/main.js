//Admin Page functions
function admin(){
   window.location = "adminHome.php";
}
function review(){
   window.location = "review.php";
}
function userDelete(){
   window.location = "usersList.php";
}
//User Page functions
function logout(){
	window.location = "logout.php";
}
function liked(){
	window.location = "likedEvents.php?userID=" + document.getElementById("userID").value;
}
function goBack() {
  window.history.back("likedEvents.php?userID=");
}
function eventList(){
   window.location = "event.php?userID=" + document.getElementById("userID").value;
}
function eventCreate(){
   window.location = "EventCreation.php?userID=" + document.getElementById("userID").value;
}
function yourEvent(){
	window.location = "userEvents.php?userID=" + document.getElementById("userID").value;
}
function liked(){
	window.location = "likedEvents.php?userID=" + document.getElementById("userID").value;
}
function changePass(){
	window.location = "changePass.php?userID=" + document.getElementById("userID").value;
}
function profile(){
	window.location = "profileView.php?userID=" + document.getElementById("userID").value;
}
function successful(s){
  alert("You have successfully registered! Your user ID is: "+s);
  window.location="./event.php?userID="+s;
}
