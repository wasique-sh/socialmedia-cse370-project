<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$m = $_POST['mid'];
$ac = $_POST['action'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($m) && isset($ac)){
	
	$sql = "SELECT Likes FROM Message WHERE mid = '$m' AND From_UID = '" . $_SESSION['fuid'] . "' AND To_UID = '" . $_SESSION['uid'] . "'";
	$result = mysqli_query($conn, $sql);

	//check if it returns an empty set
	if(mysqli_num_rows($result) == 1 ){
		$row = mysqli_fetch_array($result);
		$likes = ((int)$row[0])+$ac;
		
		$sqlUpdate = "UPDATE Message SET Likes = '$likes' WHERE MID = '$m'";
		mysqli_query($conn, $sqlUpdate);
		
		if($ac==1){ //Notify Like
			$about=" liked your MessageID: ".$m;
		}
		else{ //Notify Dislike
			$about=" disliked your MessageID: ".$m;
		}
		
		$sql = "SELECT * FROM Notifications";
		$nid = mysqli_query($conn, $sql);
		$nid = mysqli_num_rows($nid)+1;
		
		$datetime = date ('Y-m-d H:i:s');
		
		$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '" . $_SESSION['fuid'] . "', '$about','$datetime','New')";
		mysqli_query($conn, $sqlInsert);
	}
}
header("Location: message_page.php");

?>
