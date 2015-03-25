<?php
include_once 'connectionEntity.php';

class User extends Connection{
	private $PK_customerNumber;
	private $password;
	private $salt;
	private $lastname;
	private $firstname;
	private $age;
	
	function User($PK_customerNumber){
		$user=parent::getConnection()->query("Select * From tbl_customer Where PK_customerNumber=".$PK_customerNumber)->fetchObject();
		$this->PK_customerNumber = $user->PK_customerNumber;
		$this->lastname = $user->lastname;
		$this->firstname = $user->firstname;
	}
	
	function getPK_CustomerNumber(){
		return $this->PK_customerNumber;
	}
	
	function getLastname(){
		return $this->lastname;
	}
	
	function getFirstname(){
		return $this->firstname;
	}
}