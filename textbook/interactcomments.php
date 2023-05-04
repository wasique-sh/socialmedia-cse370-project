<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$c = $_POST['cid'];
$ac = $_POST['action'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($c) && isset($ac)){
	
	$sql = "SELECT Likes, From_UID FROM Comments WHERE cid = '$c'";
	$result = mysqli_query($conn, $sql);

	//check if it returns an empty set
	if(mysqli_num_rows($result) == 1 ){
		$row = mysqli_fetch_array($result);
		$likes = ((int)$row[0])+$ac;
		
		$sqlUpdate = "UPDATE Comments SET Likes = '$likes' WHERE CID = '$c'";
		mysqli_query($conn, $sqlUpdate);
		
		if($ac==1){ //Notify Like
			$about=" liked your CommentID: ".$c;
		}
		else{ //Notify Dislike
			$about=" disliked your CommentID: ".$c;
		}
		
		$sql = "SELECT * FROM Notifications";
		$nid = mysqli_query($conn, $sql);
		$nid = mysqli_num_rows($nid)+1;
		
		$datetime = date ('Y-m-d H:i:s');
		
		$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$row[1]', '$about','$datetime','New')";
		mysqli_query($conn, $sqlInsert);
	}
}
header("Location: comments_page.php");

?>
