<?php
// first of all, we need to connect to the database
require_once('dbconnect.php');
	
// Initialize the session
session_start();
 
$pid = $_POST['postid'];
$ac = $_POST['action'];

// we need to check if the input in the form textfields are not empty	
if($_SESSION["signedin"] && !empty($pid) && isset($ac)){
	$sql = "SELECT From_UID, Subject, Text, Likes, Shares FROM posts WHERE PID = '$pid'";
	
	$result = mysqli_query($conn, $sql);

	//check if it returns an empty set
	if(mysqli_num_rows($result) == 1 ){
	
		if($ac == 3){ //Forward to comment
			$_SESSION["postid"] = $pid;
			header("Location: comments_page.php");
		}
		else if($ac == 2){ //share post
			$sql = "SELECT * FROM posts";
			$pid2 = mysqli_query($conn, $sql);
			$pid2 = mysqli_num_rows($pid2)+1;
			
			if($row = mysqli_fetch_array($result)){
				//Share Post
				$sqlInsert = "INSERT INTO Posts(PID, Shared_UID, From_UID, Privacy_Level, Subject, Text) VALUES ('$pid2','$row[0]', '" . $_SESSION['uid'] . "', '1','$row[1]','$row[2]')";
				mysqli_query($conn, $sqlInsert);
				
				//Increment Shares
				$shares = ((int)$row[4]) + 1;
				$sqlUpdate = "UPDATE Posts SET Shares = '$shares' WHERE PID = '$pid'";
				mysqli_query($conn, $sqlUpdate);
				
				//Notify Shared
				$sql = "SELECT * FROM Notifications";
				$nid = mysqli_query($conn, $sql);
				$nid = mysqli_num_rows($nid)+1;
				$about=" shared your PostID: ".$pid;
				$datetime = date ('Y-m-d H:i:s');
				
				$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$row[0]', '$about','$datetime','New')";
				mysqli_query($conn, $sqlInsert);
				
			}
			header("Location: home_page.php");
		}
		else if($ac == 1){ //like
			
			if($row = mysqli_fetch_array($result)){
				//Increment Likes
				$likes = ((int)$row[3]) + 1;
				$sqlUpdate = "UPDATE Posts SET Likes = '$likes' WHERE PID = '$pid'";
				mysqli_query($conn, $sqlUpdate);
				
				//Notify likes
				$sql = "SELECT * FROM Notifications";
				$nid = mysqli_query($conn, $sql);
				$nid = mysqli_num_rows($nid)+1;
				$about=" liked your PostID: ".$pid;
				$datetime = date ('Y-m-d H:i:s');
				
				$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$row[0]', '$about','$datetime','New')";
				mysqli_query($conn, $sqlInsert);
				
			}
			header("Location: home_page.php");
		}
		else{ //dislike
			
			if($row = mysqli_fetch_array($result)){
				//decrement Likes
				$likes = ((int)$row[3]) - 1;
				$sqlUpdate = "UPDATE Posts SET Likes = '$likes' WHERE PID = '$pid'";
				mysqli_query($conn, $sqlUpdate);
				
				//Notify dislikes
				$sql = "SELECT * FROM Notifications";
				$nid = mysqli_query($conn, $sql);
				$nid = mysqli_num_rows($nid)+1;
				$about=" disliked your PostID: ".$pid;
				$datetime = date ('Y-m-d H:i:s');
				
				$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$row[0]', '$about','$datetime','New')";
				mysqli_query($conn, $sqlInsert);
				
			}
			header("Location: home_page.php");
		}

	} else {
		header("Location: home_page.php");
	}
}else {
		header("Location: home_page.php");
}



?>
