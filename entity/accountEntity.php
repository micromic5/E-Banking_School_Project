<?php
include_once 'connectionEntity.php';
include_once 'accountTypeEntity.php';
include_once 'bookingEntity.php';

class Account extends Connection{
	private $PK_accountNumber;
	private $value;
	private $accountType;
        private $allBookings;
        private $receivedBookings;
        private $transmittedBookings;
	
	function Account($PK_accountNumber){
		$acc=parent::getConnection()->query("Select * From tbl_account Where PK_accountNumber=".$PK_accountNumber)->fetchObject();
                $this->value = $acc->value;
                $this->accountType = new AccountType($acc->FK_accountType);
                $this->PK_accountNumber = $acc->PK_accountNumber;
                //receivedBookings
                $received=parent::getConnection()->query("Select PK_booking From tbl_booking Where receiver=".$acc->PK_accountNumber);
		$recievedArray = array();
		while($row = $received->fetchObject()){
			$recievedArray[]=new Booking($row->PK_booking);
		}
                $this->receivedBookings = $recievedArray;
                //transmittedBookings
                $transmitted=parent::getConnection()->query("Select PK_booking From tbl_booking Where transmitter=".$acc->PK_accountNumber);
		$transmittedArray = array();
		while($row = $transmitted->fetchObject()){
			$transmittedArray[]=new Booking($row->PK_booking);
		}
                $this->transmittedBookings = $transmittedArray;
                //allBookings
                $all=parent::getConnection()->query("Select PK_booking From tbl_booking Where transmitter=".$acc->PK_accountNumber. " OR receiver=".$acc->PK_accountNumber);
		$allArray = array();
		while($row = $all->fetchObject()){
			$allArray[]=new Booking($row->PK_booking);
		}
                $this->allBookings = $allArray;
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
        
        public function getReceivedBookings() {
            return $this->receivedBookings;
        }

        public function getTransmittedBookings() {
            return $this->transmittedBookings;
        }
        
        public function getAllBookings() {
            return $this->allBookings;
        }
}