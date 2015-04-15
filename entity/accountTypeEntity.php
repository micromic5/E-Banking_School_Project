<?php
include_once 'connectionEntity.php';

class AccountType extends Connection{
	private $PK_accountType;
	private $name;
	
	function AccountType($PK_accountType){
		$accountType=parent::getConnection()->query("Select * From tbl_accounttype Where PK_accountType=".$PK_accountType)->fetchObject();
		$this->PK_accountType = $accountType->PK_accountType;
		$this->name = $accountType->name;		
	}        
        
        public function getPK_accountType() {
            return $this->PK_accountType;
        }

        public function getName() {
            return $this->name;
        }        
}