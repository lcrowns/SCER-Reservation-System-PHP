<?php
class Transactions{
	private $conn;
	private $tablename = "transactions";

	public $transactionID;
	public $IDnumber;
	public $courtID;
	public $additionalItems;
	public $status;
	public $daysUse;
	public $checkIn;
	public $checkInTime;
	public $checkOut;
	public $checkOutTime;
	public $totalPrice;
	public $cancelReason;
	public $chargeReason;
	public $feedback;
	public $notif;
	public $clientnotif;


	function __construct($db){
		$this->conn = $db;
	}

	function viewAllTransactions(){
		$query = "SELECT * FROM " . $this->tablename; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	
	function viewOneTransaction(){
		$query = "SELECT * FROM " . $this->tablename . " WHERE transactionID = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->transactionID);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->IDnumber = $row['IDnumber'];
		$this->courtID = $row['courtID'];
		$this->additionalItems = $row['additionalItems'];
		$this->status = $row['status'];
		$this->daysUse = $row['daysUse'];
		$this->checkIn = $row['checkIn'];
		$this->checkInTime = $row['checkInTime'];
		$this->checkOut = $row['checkOut'];
		$this->checkOutTime = $row['checkOutTime'];
		$this->totalPrice = $row['totalPrice'];
		$this->cancelReason = $row['cancelReason'];
		$this->chargeReason = $row['chargeReason'];
		$this->feedback = $row['feedback'];
		
	}
	
	
	

	function CancelAppointmentByUser(){
		$query = "UPDATE " . $this->tablename . " SET status = 'Cancelled' ,cancelReason=? WHERE transactionID=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->status);
		$stmt->bindparam(2,$this->cancelReason);
		$stmt->bindparam(3,$this->transactionID);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	

	
}
?>