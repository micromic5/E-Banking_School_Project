<?php
include_once 'connectionEntity.php';
include_once 'accountEntity.php';
include_once 'permissionEntity.php';

class AccountPermission extends Connection{
	private $PK_accountPermission;
	private $account;
	private $permission;
	
	//second Constructor
	public function AccountPermission($PK_accountPermission){
		$acp=parent::getConnection()->query("Select * From tbl_accountpermission Where PK_accountPermission=".$PK_accountPermission)->fetchObject();
                $this->permission = new Permission($acp->FK_permission);
                $this->PK_accountPermission = $acp->PK_accountPermission;
                $this->account = new Account($acp->FK_accountNumber);
        }
	
        public function getPK_accountPermission() {
            return $this->PK_accountPermission;
        }

        public function getAccount() {
            return $this->account;
        }

        public function getPermission() {
            return $this->permission;
        }
}