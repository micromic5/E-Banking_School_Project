<?php
include_once 'connectionEntity.php';
include_once 'accountPermissionEntity.php';
class User extends Connection{
	private $PK_customerNumber;
	private $lastname;
	private $firstname;
	private $age;
        private $accountsPermission;
	
	function User($PK_customerNumber){
		$user=parent::getConnection()->query("Select * From tbl_customer Where PK_customerNumber=".$PK_customerNumber)->fetchObject();
		$this->PK_customerNumber = $user->PK_customerNumber;
		$this->lastname = $user->lastname;
		$this->firstname = $user->firstname;
		$this->age = $user->age;

		$acp=parent::getConnection()->query("Select PK_accountPermission From tbl_accountpermission Where FK_customerNumber=".$user->PK_customerNumber);
		$acpArray = array();
		while($row = $acp->fetchObject()){
			$acpArray[]=new AccountPermission($row->PK_accountPermission);
		}
                $this->accountsPermission = $acpArray;
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
        
        public function getAccountsPermission() {
            return $this->accountsPermission;
        }

}