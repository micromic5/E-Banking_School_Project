<?php
include_once 'connectionEntity.php';

class AccountPermission extends Connection{
	private $PK_accountPermission;
	private $customers;
	private $accounts;
	private $permission;
	
	function AccountPermission($PK_customerNumber){
		$acp=parent::getConnection()->query("Select PK_accountPermission From tbl_accountpermission Where FK_customerNumber=".$PK_customerNumber);
		$acpArray = array();
		while($row = $acp->fetchObject()){
			$acpArray[]=$this->withACP($row->PK_accountPermission);
		}
	}
	//second Constructor
	public function withACP($PK_accountPermission){
		$acp=parent::getConnection()->query("Select * From tbl_accountpermission Where PK_accountPermission=".$PK_accountPermission)->fetchObject();
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
	
	function getAge(){
		return $this->age;
	}
}