<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$f = $_POST['fname'];
$l = $_POST['lname'];
$g = $_POST['gender'];
$d = $_POST['bdate'];
$e = $_POST['ema'];
$p = $_POST['phon'];
$a = $_POST['addr'];
$b = $_POST['about'];
$ac = $_POST['action'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($f) && !empty($l) && !empty($g) && !empty($d) && !empty($e) && !empty($p) && !empty($a) && !empty($b) && isset($ac)){
	
	$sqlUpdate = "UPDATE User SET First_Name='$f', Last_Name='$l', About_Me='$b', Address='$a', Birth_Date='$d', Email='$e', Gender='$g', Phone='$p' WHERE UID = '" . $_SESSION['uid'] . "'";

	//Execute the query 
	mysqli_query($conn, $sqlUpdate);
	
	if( strcmp($ac,"updatepost") == 0)
	{
		$sql = "SELECT * FROM posts";
		$pid = mysqli_query($conn, $sql);
		$pid = mysqli_num_rows($pid)+1;
		$text = "First Name: ".$f."; Last Name: ".$l."; Birth Date: ".$d."; Email: ".$e."; Gender: ".$g."; Phone: ".$p;
		
		$sqlInsert = "INSERT INTO posts(PID, From_UID, Privacy_Level, Subject, Text) VALUES ('$pid', '" . $_SESSION['uid'] . "', '1','My Status Update','$text')";
		
		mysqli_query($conn, $sqlInsert);
	}

}

header("Location: me_page.php");

?>
