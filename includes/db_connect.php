<?php

	@$db = new mysqli("localhost", "root", "", "db_ebanking");

	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}

	try {
		$dbPDO = new PDO("mysql:host=localhost;dbname=db_ebanking","root","");
	} catch (PDOException $Exception) {

		throw new MyDatabaseException($Exception->getMessage(), $Exception->getCode());
		exit();
	}

	define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
	
?>