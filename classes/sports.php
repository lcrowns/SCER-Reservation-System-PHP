<?php
class Sports{
	private $conn;
	private $tablename = "sport";

	
	public $sportID;
	
	public $sportsName;
	

	function __construct($db){
		$this->conn = $db;
	}

	function viewAllSport(){
		$query = "SELECT * FROM " . $this->tablename; 
		$stmt = $this->conn->prepare($query);
		$stmt->execute();
		return $stmt;
	}

	function viewOneSport(){
		$query = "SELECT * FROM " . $this->tablename . " WHERE sportID = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindparam(1,$this->sportID);
		$stmt->execute();
		
		$row = $stmt->fetch(PDO::FETCH_ASSOC);

		$this->sportsName = $row['sportsName'];
		

		
	}

	function addSport(){
		$query = "INSERT INTO sport SET sportID=?, sportsName=?";
		
		$stmt = $this->conn->prepare($query);

		$stmt->bindparam(1,$this->sportID);
		$stmt->bindparam(2,$this->sportsName);
		
		
		if($stmt->execute())
			return true;
		else
			return false;
	
	}

	function updateSport(){
		$query = "UPDATE " . $this->tablename . " SET sportsName=? WHERE sportID=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->sportsName);
		$stmt->bindparam(2,$this->sportID);

		if($stmt->execute())
			return true;
		else
			return false; 	
	}

	function updateSportByadmin(){
		$query = "UPDATE " . $this->tablename . " SET sportsName=? WHERE sportID=?"; 
		$stmt = $this->conn->prepare($query);
		
		$stmt->bindparam(1,$this->sportsName);
		$stmt->bindparam(2,$this->sportID);


		if($stmt->execute())
			return true;
		else
			return false;
	}



	function viewSearchResult($from_record_num, $records_per_page){
		$searchLike="%".$this->searchValue. "%";
		$query="SELECT * FROM sport WHERE sportID LIKE ? OR sportsName LIKE ?  ORDER BY sportID LIMIT {$from_record_num}, {$records_per_page}";
		$stmt=$this->conn->prepare($query);
		$stmt->bindparam(1,$searchLike);
		$stmt->bindParam(2,$searchLike);
		$stmt->execute();

		return $stmt;
	}
	public function countSearchResult(){
		$searchLike="%".$this->searchValue. "%";
		$query="SELECT * FROM sport WHERE sportID LIKE ? OR sportsName LIKE ?  ORDER BY sportID";
		$stmt=$this->conn->prepare($query);
		$stmt->bindparam(1,$searchLike);
		$stmt->bindParam(2,$searchLike);
		$stmt->execute();

$num=$stmt->rowCount();
		return $num;
	}

	function deleteSport(){
		$query = "DELETE FROM sport WHERE sportID=?";

    	$stmt = $this->conn->prepare($query);
   		$stmt->bindParam(1, $this->sportID);
 
    	$stmt->execute();
	}
}