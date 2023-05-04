<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$s = $_POST['subject'];
$m = $_POST['message'];
$ac = $_POST['action'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($s) && !empty($m) && isset($ac)){
	
	$sql = "SELECT * FROM posts";
	$pid = mysqli_query($conn, $sql);
	$pid = mysqli_num_rows($pid)+1;
	
	$sqlInsert = "INSERT INTO posts(PID, From_UID, Privacy_Level, Subject, Text) VALUES ('$pid', '" . $_SESSION['uid'] . "', '$ac','$s','$m')";
	
	mysqli_query($conn, $sqlInsert);

}

header("Location: me_page.php");

?>
