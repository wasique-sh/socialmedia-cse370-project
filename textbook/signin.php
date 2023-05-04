<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');

$u = $_POST['fname'];
$p = $_POST['pass'];

// we need to check if the input in the form textfields are not empty
if(!empty($u) && !empty($p)){
	// write the query to check if this username and password exists in our database
	$sql = "SELECT * FROM User WHERE uid = '$u' AND password = '$p'";

	//Execute the query 
	$result = mysqli_query($conn, $sql);

	//check if it returns an empty set
	if(mysqli_num_rows($result) !=0 ){
		//echo "Username and Password is found";
		
		// Initialize the session
		session_start();
		
		// Store data in session variables
		$_SESSION["signedin"] = true;
		$_SESSION["uid"] = $u;
		$_SESSION["password"] = $p; 
		
		header("Location: home_page.php");
	}else{
		//echo "Username or Password is wrong";
		header("Location: start_page.php");
	}
}else{
		//echo "Username or Password is wrong";
		header("Location: start_page.php");
	}
?>
