<?php

	$host = "localhost";
	$user = "root";
	$pwd = "";
	$database = "db_ebanking";

	$con = mysqli_connect($host, $user, $pwd, $database);

	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
?>