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
		$status = "Received";
		$sql = "SELECT FID, From_UID, To_UID, Status FROM Friends WHERE From_UID = '" . $_SESSION['uid'] . "' AND To_UID = '$f' AND Status = '$status' ";
		$result = mysqli_query($conn, $sql);
			
		if($ac == 2){ //Reject
			if(mysqli_num_rows($result) == 1){
				$status1="Rejected";
				$sqlUpdate = "UPDATE Friends SET Status = '$status1' WHERE (From_UID = '$f' AND To_UID = '" . $_SESSION['uid'] . "') OR (To_UID = '$f' AND From_UID = '" . $_SESSION['uid'] . "') ";
				mysqli_query($conn, $sqlUpdate);
			
				//Notify Reject
				$sql = "SELECT * FROM Notifications";
				$nid = mysqli_query($conn, $sql);
				$nid = mysqli_num_rows($nid)+1;
				$about=" rejected your Friend Request";
				$datetime = date ('Y-m-d H:i:s');
				
				$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$f', '$about','$datetime','New')";
				mysqli_query($conn, $sqlInsert);
			}
		}
		else{//Accept or Send
			if(mysqli_num_rows($result) == 1){ //Accept or send if already received
				$status1="Accepted";
				$sqlUpdate = "UPDATE Friends SET Status = '$status1' WHERE (From_UID = '$f' AND To_UID = '" . $_SESSION['uid'] . "') OR (To_UID = '$f' AND From_UID = '" . $_SESSION['uid'] . "') ";
				mysqli_query($conn, $sqlUpdate);
			
				//Notify Accept
				$sql = "SELECT * FROM Notifications";
				$nid = mysqli_query($conn, $sql);
				$nid = mysqli_num_rows($nid)+1;
				$about=" accepted your Friend Request";
				$datetime = date ('Y-m-d H:i:s');
				
				$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$f', '$about','$datetime','New')";
				mysqli_query($conn, $sqlInsert);
			}
			else if(mysqli_num_rows($result) == 0){ //Send
				$status = "Sent";
				$sql = "SELECT FID, From_UID, To_UID, Status FROM Friends WHERE From_UID = '" . $_SESSION['uid'] . "' AND To_UID = '$f' AND Status = '$status' ";
				$result = mysqli_query($conn, $sql);
				
				if(mysqli_num_rows($result) == 0){
					$status2 = "Rejected";
					$sql = "SELECT FID, From_UID, To_UID, Status FROM Friends WHERE From_UID = '$f' AND To_UID = '" . $_SESSION['uid'] . "' AND Status = '$status2' ";
					$result1 = mysqli_query($conn, $sql);
					
					if(mysqli_num_rows($result1) == 0){ //If not rejected then send fr
						//Me sent Friend
						$sql = "SELECT * FROM Friends";
						$fid = mysqli_query($conn, $sql);
						$fid = mysqli_num_rows($fid)+1;
						$status1="Sent";
						$sqlInsert = "INSERT INTO Friends(FID, From_UID, To_UID, Status) VALUES ('$fid','" . $_SESSION['uid'] . "', '$f', '$status1')";
						mysqli_query($conn, $sqlInsert);
						
						//Friend received Me
						$sql = "SELECT * FROM Friends";
						$fid = mysqli_query($conn, $sql);
						$fid = mysqli_num_rows($fid)+1;
						$status1="Received";
						$sqlInsert = "INSERT INTO Friends(FID, From_UID, To_UID, Status) VALUES ('$fid', '$f', '" . $_SESSION['uid'] . "', '$status1')";
						mysqli_query($conn, $sqlInsert);
						
						//Notify send
						$sql = "SELECT * FROM Notifications";
						$nid = mysqli_query($conn, $sql);
						$nid = mysqli_num_rows($nid)+1;
						$about=" sent you a Friend Request";
						$datetime = date ('Y-m-d H:i:s');
						
						$sqlInsert = "INSERT INTO Notifications(NID, From_UID, To_UID, About, Transpired, Seen) VALUES ('$nid','" . $_SESSION['uid'] . "', '$f', '$about','$datetime','New')";
						mysqli_query($conn, $sqlInsert);
					}
				}
			}
		}
	}

}

header("Location: friends_page.php");

?>
