<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "student_management";
	global $conn;
	$conn = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}
	// $conn = mysqli_connect($servername, $username, $password, $dbname);
	// if (!$conn) 
	// {
	//     die("Connection failed: " . mysqli_connect_error());
	// }
	// mysqli_set_charset($conn,'utf8');
?>