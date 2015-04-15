<?php
include_once 'connectionEntity.php';

class Permission extends Connection{
	private $PK_permission;
	private $name;
	
	function Permission($PK_permission){
		$permission=parent::getConnection()->query("Select * From tbl_permission Where PK_permission=".$PK_permission)->fetchObject();
		$this->PK_permission = $permission->PK_permission;
		$this->name = $permission->name;		
	}        
        public function getPK_permission() {
            return $this->PK_permission;
        }

        public function getName() {
            return $this->name;
        }
}