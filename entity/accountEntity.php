<?php
include_once 'connectionEntity.php';

class Account extends Connection{
	private $PK_accountNumber;
	private $value;
	private $accountType;
	
	function Account($PK_accountNumber){
		$acc=parent::getConnection()->query("Select * From tbl_account Where PK_accountNumber=".$PK_accountNumber)->fetchObject();
                $this->value = $acc->value;
                $this->accountType = $acc->accountType;
                $this->PK_accountNumber = $acc->PK_accountNumber;
	}
        
        public function getPK_accountNumber() {
            return $this->PK_accountNumber;
        }

        public function getValue() {
            return $this->value;
        }

        public function getAccountType() {
            return $this->accountType;
        }
}