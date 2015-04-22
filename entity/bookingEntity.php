<?php
include_once 'connectionEntity.php';

class Booking extends Connection{
	private $PK_booking;
	private $value;
        private $bookingTime;
        private $dueTime;
        private $PK_receiver;
        private $PK_transmitter;
	
	function Booking($PK_booking){
		$booking=parent::getConnection()->query("Select * From tbl_booking Where PK_booking=".$PK_booking)->fetchObject();
		$this->PK_booking = $booking->PK_booking;
		$this->value = $booking->value;	
                $this->bookingTime = $booking->bookingTime;
                $this->dueTime = $booking->dueTime;
                $this->PK_receiver = $booking->receiver;
                $this->PK_transmitter = $booking->transmitter;
	}
        
        public function getPK_booking() {
            return $this->PK_booking;
        }

        public function getValue() {
            return $this->value;
        }

        public function getBookingTime() {
            return $this->bookingTime;
        }

        public function getDueTime() {
            return $this->dueTime;
        }
        
       public function getReceiver() {
            return new Account($this->PK_receiver);
        }

        public function getTransmitter() {
            return new Account($this->PK_transmitter);
        }
}