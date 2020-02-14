<?php
class Admin{
	private $conn;
	private $tablename = "admin";

	
	public $adminID;
	public $firstName;
	public $middleName;
	public $lastName;
	public $username;
	public $password;
	public $address;
	public $contactNumber;
	public $accStatus;

	function __construct($db){
		$this->conn = $db;
	}

	function viewAllAdmin(){
		$query = "SELECT * FROM " . $this->tablename; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function viewOneAdmin(){
		$query = "SELECT * FROM " . $this->tablename . " WHERE adminID = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->adminID);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->username = $row['username'];
		$this->firstName = $row['firstName'];
		$this->middleName = $row['middleName'];
		$this->lastName = $row['lastName'];
		$this->username = $row['username'];
		$this->address = $row['address'];
		$this->contactNumber = $row['contactNumber'];
		$this->accStatus = $row['accStatus'];
		

		
	}

	function addAdmin(){
		$query = "INSERT INTO admin SET adminID=?, username=?, firstName=?, middleName=?, lastName=?, address=?, contactNumber=?, password=?";
		
		$stmt = $this->conn->prepare($query);

		$stmt->bindparam(1,$this->adminID);
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

	function updateAdmin(){
		$query = "UPDATE " . $this->tablename . " SET username=?, firstName=?,  middleName=?,  lastName=?, username=? WHERE adminID=?"; 
		$stmt = $this->conn->prepare($query);

		$stmt->bindparam(1,$this->username);
		$stmt->bindparam(2,$this->firstName);
		$stmt->bindparam(3,$this->middleName);
		$stmt->bindparam(4,$this->lastName);
		$stmt->bindparam(5,$this->username);
		$stmt->bindparam(6,$this->adminID);

		if($stmt->execute())
			return true;
		else
			return false; 	
	}

	function updateAdminByadmin(){
		$query = "UPDATE " . $this->tablename . " SET firstName=?,  middleName=?,  lastName=?, username=? WHERE adminID=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->firstName);
		$stmt->bindparam(2,$this->middleName);
		$stmt->bindparam(3,$this->lastName);
		$stmt->bindparam(4,$this->username);
		$stmt->bindparam(5,$this->adminID);


		if($stmt->execute())
			return true;
		else
			return false;
	}

	function updateAdminPasswordByAdmin(){
		$query = "UPDATE " . $this->tablename . " SET password=? WHERE adminID=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->password);
		$stmt->bindparam(2,$this->adminID);

		if($stmt->execute())
			return true;
		else
			return false;
	}

	function readOneAdminAccount(){
			
		$query = "SELECT * FROM admin WHERE adminID=?";
		
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->adminID);
		$stmt->execute();

		$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$this->name = $row['firstName'];
		$this->name = $row['middleName'];
		$this->name = $row['lastName'];
		$this->username = $row['username'];
		$this->password = $row['password'];
		$this->userType = $row['userType'];		
	}

	function viewSearchResult($from_record_num, $records_per_page){
		$searchLike="%".$this->searchValue. "%";
		$query="SELECT * FROM admin WHERE adminID LIKE ? OR name LIKE ?  ORDER BY adminID LIMIT {$from_record_num}, {$records_per_page}";
		$stmt=$this->conn->prepare($query);
		$stmt->bindparam(1,$searchLike);
		$stmt->bindParam(2,$searchLike);
		$stmt->execute();

		return $stmt;
	}
	public function countSearchResult(){
		$searchLike="%".$this->searchValue. "%";
		$query="SELECT * FROM admin WHERE adminID LIKE ? OR name LIKE ?  ORDER BY adminID";
		$stmt=$this->conn->prepare($query);
		$stmt->bindparam(1,$searchLike);
		$stmt->bindParam(2,$searchLike);
		$stmt->execute();

$num=$stmt->rowCount();
		return $num;
	}

	function deleteAdmin(){
		$query = "DELETE FROM admin WHERE adminID=?";

    	$stmt = $this->conn->prepare($query);
   		$stmt->bindParam(1, $this->adminID);
 
    	$stmt->execute();
	}
}