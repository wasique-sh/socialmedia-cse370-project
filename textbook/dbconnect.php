<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "textbook";

//creating connections
$conn = new mysqli($servername, $username, $password);

//Check connection
if($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}else{
	mysqli_select_db($conn, $dbname);
	//echo "Connection successful";
}

?>