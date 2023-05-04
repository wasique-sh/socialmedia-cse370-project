<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
$u = $_POST['fname'];
$p = $_POST['pass'];

// we need to check if the input in the form textfields are not empty
if(!empty($u) && !empty($p)){
	//to lowercase
	$u = strtolower($u);
	
	// check if username is free
	$sql = "SELECT * FROM User WHERE uid = '$u'";
		
	//Execute the query 
	$result = mysqli_query($conn, $sql);

	//check if it returns an empty set
	if(mysqli_num_rows($result) == 0 ){
		//echo "Insert Username & password";
		
		// Initialize the session
		session_start();
		
		// Store data in session variables
		$_SESSION["signedin"] = true;
		$_SESSION["uid"] = $u;
		$_SESSION["password"] = $p; 
		
		$sqlInsert = "INSERT INTO user (UID, Password) VALUES ('$u','$p')";
		mysqli_query($conn, $sqlInsert);
		
		//Add Friend to oneself to see own posts in home_page.php
		$sql = "SELECT * FROM Friends";
		$fid = mysqli_query($conn, $sql);
		$fid = mysqli_num_rows($fid)+1;
		$status="Accepted";
		$sqlInsert = "INSERT INTO Friends(FID, From_UID, To_UID, Status) VALUES ('$fid', '$u', '$u', '$status')";
		mysqli_query($conn, $sqlInsert);
		
		header("Location: me_page.php");
	}else{
		//echo "Username is Already Taken";
		header("Location: signup_page.php");
	}
}else{
		//echo "Username is Already Taken";
		header("Location: signup_page.php");
	}
?>
