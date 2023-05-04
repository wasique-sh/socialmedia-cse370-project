<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$c = $_POST['comment'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($c)){
	
	$sql = "SELECT * FROM Comments";
	$cid = mysqli_query($conn, $sql);
	$cid = mysqli_num_rows($cid)+1;
	
	$sqlInsert = "INSERT INTO Comments (CID, From_UID, From_PID, Text) VALUES ('$cid', '" . $_SESSION['uid'] . "', '" . $_SESSION['postid'] . "','$c')";
	
	mysqli_query($conn, $sqlInsert);
	
	$sql = "SELECT PID, From_UID FROM Posts WHERE PID = '" . $_SESSION['postid'] . "'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($result);
	
	//Notify Comment
	$sql = "SELECT * FROM Notifications";
	$nid = mysqli_query($conn, $sql);
	$nid = mysqli_num_rows($nid)+1;
	$about=" commented on your PostID: ".$row[0];
	$datetime = date ('Y-m-d H:i:s');
	
	$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$row[1]', '$about','$datetime','New')";
	mysqli_query($conn, $sqlInsert);
}
header("Location: comments_page.php");

?>
