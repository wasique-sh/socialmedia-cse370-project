<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$f = $_POST['fname'];
$ac = $_POST['action'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($f) && isset($ac) && ($_SESSION['uid'] != $f)){
	
	$sql = "SELECT * FROM User WHERE uid = '$f'";
		
	//Execute the query 
	$result = mysqli_query($conn, $sql);

	//check if it returns an empty set
	if(mysqli_num_rows($result) == 1 ){
		$_SESSION["fuid"] = $f;
		
		if($ac==0){ //See User Profile
			header("Location: user_page.php");
		}
		else{ //Message User
			header("Location: message_page.php");
		}
	}
	else {
		header("Location: friends_page.php");
	}
}
else {
	header("Location: friends_page.php");
}

?>
