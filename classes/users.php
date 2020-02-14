<?php
class Users{
	private $conn;
	private $tablename = "users";

	public $IDnumber;
	public $firstName;
	public $middleName;
	public $lastName;
	public $address;
	public $contactNumber;
	public $username;
	public $password;
	public $dateadded;
	public $fullname= '$firstName ." " . $middleName ." " . $lastName';
	public $accStatus;


	function __construct($db){
		$this->conn = $db;
	}

	function viewAllUser(){
		$query = "SELECT * FROM " . $this->tablename; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function viewAllUserActive(){
		$query = "SELECT * FROM " . $this->tablename. ' WHERE accStatus = "Active" '; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function viewAllUserInactive(){
		$query = "SELECT * FROM " . $this->tablename. ' WHERE accStatus = "Inactive" '; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	
	function viewOneUser(){
		$query = "SELECT * FROM " . $this->tablename . " WHERE IDnumber = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->IDnumber);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->firstName = $row['firstName'];
		$this->middleName = $row['middleName'];
		$this->lastName = $row['lastName'];
		$this->address = $row['address'];
		$this->contactNumber = $row['contactNumber'];
		$this->accStatus = $row['accStatus'];

		
	}
	
	
	function updateUser(){
		$query = "UPDATE " . $this->tablename . " SET firstName=?, middleName=?, lastName=?, address=?, contactNumber=? WHERE IDnumber=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->firstName);
		$stmt->bindparam(2,$this->middleName);
		$stmt->bindparam(3,$this->lastName);
		$stmt->bindparam(4,$this->address);
		$stmt->bindparam(5,$this->contactNumber);
		$stmt->bindparam(6,$this->IDnumber);

		if($stmt->execute())
			return true;
		else
			return false; 	
	}

	function updateUserByUser(){
		$query = "UPDATE " . $this->tablename . " SET firstName=?, middleName=?, lastName=?, address=?, contactNumber=? WHERE IDnumber=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->firstName);
		$stmt->bindparam(2,$this->middleName);
		$stmt->bindparam(3,$this->lastName);
		$stmt->bindparam(4,$this->address);
		$stmt->bindparam(5,$this->contactNumber);
		$stmt->bindparam(6,$this->IDnumber);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function addUsers(){
		$query = "INSERT INTO users SET IDnumber=?, username=?, firstName=?, middleName=?, lastName=?, address=?, contactNumber=?, password=?";
		
		$stmt = $this->conn->prepare($query);

		$stmt->bindparam(1,$this->IDnumber);
		$stmt->bindparam(2,$this->username);
		$stmt->bindparam(3,$this->firstName);
		$stmt->bindparam(4,$this->middleName);
		$stmt->bindparam(5,$this->lastName);
		$stmt->bindparam(6,$this->address);
		$stmt->bindparam(7,$this->contactNumber);
		$stmt->bindparam(8,$this->password);
		
		
		if($stmt->execute())
			return true;
		else
			return false;
	
	}

	function deleteUser(){
		$query = "DELETE FROM users WHERE IDnumber=?";

    	$stmt = $this->conn->prepare($query);
   		$stmt->bindParam(1, $this->IDnumber);
 
    	$stmt->execute();
	}

	function deleteTransaction(){
		$query = "DELETE FROM transaction WHERE IDnumber=?";

    	$stmt = $this->conn->prepare($query);
   		$stmt->bindParam(1, $this->transactionID);
 
    	$stmt->execute();
	}

	function viewSearchResult($from_record_num, $records_per_page){
		$searchLike="%".$this->searchValue. "%";
		$query="SELECT * FROM users WHERE IDnumber LIKE ? OR firstName LIKE ? OR middleName LIKE ? OR lastName LIKE ? OR address LIKE ? ORDER BY IDnumber LIMIT {$from_record_num}, {$records_per_page}";
		$stmt=$this->conn->prepare($query);
		$stmt->bindparam(1,$searchLike);
		$stmt->bindParam(2,$searchLike);
		$stmt->bindParam(3,$searchLike);
		$stmt->bindParam(4,$searchLike);
		$stmt->bindParam(5,$searchLike);
		$stmt->execute();

		return $stmt;
	}
	public function countSearchResult(){
		$searchLike="%".$this->searchValue. "%";
		$query="SELECT * FROM users WHERE IDnumber LIKE ? OR firstName LIKE ? OR middleName LIKE ? OR lastName LIKE ? OR address LIKE ? ORDER BY IDnumber";
		$stmt=$this->conn->prepare($query);
		$stmt->bindparam(1,$searchLike);
		$stmt->bindParam(2,$searchLike);
		$stmt->bindParam(3,$searchLike);
		$stmt->bindParam(4,$searchLike);
		$stmt->bindParam(5,$searchLike);
		$stmt->execute();

$num=$stmt->rowCount();
		return $num;
	}

	function updateUserPasswordByUser(){
		$query = "UPDATE " . $this->tablename . " SET password=? WHERE IDnumber=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->password);
		$stmt->bindparam(2,$this->IDnumber);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function readOneUserAccount(){
			
		$query = "SELECT * FROM users WHERE IDnumber=?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->IDnumber);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->firstName = $row['firstName'];
		$this->middleName = $row['middleName'];
		$this->lastName = $row['lastName'];
		$this->address = $row['address'];
		$this->contactNumber = $row['contactNumber'];
		$this->password = $row['password'];
		$this->userType = $row['userType'];
		$this->accStatus = $row['accStatus'];
	}

	
}
?>