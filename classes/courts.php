<?php
class Courts{
	private $conn;
	private $tablename = "courts";
	
	public $courtID;
	public $courtName;
	public $price;
	public $photo;
	public $sportID;
	


	function __construct($db){
		$this->conn = $db;
	}

	function viewAllCourt(){
		$query = "SELECT * FROM " . $this->tablename; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}
	
	function viewOneCourt(){
		$query = "SELECT * FROM " . $this->tablename . " WHERE courtID = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->courtID);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->courtName = $row['courtName'];
		$this->price = $row['price'];
		$this->photo = $row['photo'];
		$this->sportID = $row['sportID'];
		
		

		
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
		$query = "INSERT INTO users SET IDnumber=?, firstName=?, middleName=?, lastName=?, address=?, contactNumber=?, username=?, password=?";
		
		$stmt = $this->conn->prepare($query);

		$stmt->bindparam(1,$this->IDnumber);
		$stmt->bindparam(2,$this->firstName);
		$stmt->bindparam(3,$this->middleName);
		$stmt->bindparam(4,$this->lastName);
		$stmt->bindparam(5,$this->address);
		$stmt->bindparam(6,$this->contactNumber);
		$stmt->bindparam(7,$this->username);
		$stmt->bindparam(8,$this->password);
		
		
		if($stmt->execute())
			return true;
		else
			return false;
	
	}

	function deleteCourt(){
		$query = "DELETE FROM court WHERE courtID=?";

    	$stmt = $this->conn->prepare($query);
   		$stmt->bindParam(1, $this->courtID);
 
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

	
}
?>