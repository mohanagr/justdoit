<?php
	$server = "localhost";
	$username = "root";
	$password = "MoragI91";
	$db = "todo";

	$conn = new mysqli($server, $username, $password, $db);

	if($conn->connect_error)
	{
		die("Connection failed");
		exit();
	}

?>