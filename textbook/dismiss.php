<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"]){
	
	$seen="Old";
	$sqlUpdate = "UPDATE notifications SET Seen='$seen' WHERE To_UID='" . $_SESSION['uid'] . "'";
	
	mysqli_query($conn, $sqlUpdate);

}

header("Location: notifications_page.php");

?>
