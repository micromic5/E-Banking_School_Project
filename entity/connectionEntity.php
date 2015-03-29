<?php
class Connection{
	public function getConnection(){
		$dbPDO = new PDO("mysql:host=localhost;dbname=db_ebanking","root","");
		return $dbPDO;
	}
}