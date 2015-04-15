<?php
include_once 'connectionEntity.php';
include_once 'accountPermissionEntity.php';
class Customer extends Connection{
	private $PK_customerNumber;
	private $lastname;
	private $firstname;
	private $age;
        private $accountsPermissions;
	
	function Customer($PK_customerNumber){
		$customer=parent::getConnection()->query("Select * From tbl_customer Where PK_customerNumber=".$PK_customerNumber)->fetchObject();
		$this->PK_customerNumber = $customer->PK_customerNumber;
		$this->lastname = $customer->lastname;
		$this->firstname = $customer->firstname;
		$this->age = $customer->age;

		$acp=parent::getConnection()->query("Select PK_accountPermission From tbl_accountpermission Where FK_customerNumber=".$customer->PK_customerNumber);
		$acpArray = array();
		while($row = $acp->fetchObject()){
			$acpArray[]=new AccountPermission($row->PK_accountPermission);
		}
                $this->accountsPermissions = $acpArray;
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
        
        public function getAccountsPermissions() {
            return $this->accountsPermissions;
        }

}