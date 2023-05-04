<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$s = $_POST['subject'];
$m = $_POST['message'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($s) && !empty($m)){
	
	$sql = "SELECT * FROM message";
	$mid = mysqli_query($conn, $sql);
	$mid = mysqli_num_rows($mid)+1;
	
	$sqlInsert = "INSERT INTO Message (MID, From_UID, To_UID, Subject, Text) VALUES ('$mid', '" . $_SESSION['uid'] . "', '" . $_SESSION['fuid'] . "','$s','$m')";
	
	mysqli_query($conn, $sqlInsert);
	
	//Notify Message
	$sql = "SELECT * FROM Notifications";
	$nid = mysqli_query($conn, $sql);
	$nid = mysqli_num_rows($nid)+1;
	$about=" messaged you";
	$datetime = date ('Y-m-d H:i:s');
	
	$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '" . $_SESSION['fuid'] . "', '$about','$datetime','New')";
	mysqli_query($conn, $sqlInsert);
}
header("Location: message_page.php");

?>
