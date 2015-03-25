<?php

	$db = new mysqli("localhost", "root", "", "db_ebanking");
	$dbPDO = new PDO("mysql:host=localhost;dbname=db_ebanking","root","");

	define("SECURE", FALSE);    // FOR DEVELOPMENT ONLY!!!!
	
?>