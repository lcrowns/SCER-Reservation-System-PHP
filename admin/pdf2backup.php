<?php
include "../assets/fpdf/fpdf.php";
include_once '../classes/users.php';
include_once '../config/database.php';

$sd= isset ($_GET ['sd']) ? $_GET['sd']: die('ERROR: missing ID.');
$ed= isset ($_GET ['ed']) ? $_GET['ed']: die('ERROR: missing ID.');

$database = new Database();
$db = $database->getConnection();
/*$query = "SELECT * FROM users INNER JOIN admin ON users.IDnumber = admin.IDnumber";
$stmt = $database->conn->prepare($query);
$stmt->execute();*/

/*$row = $stmt->fetch(PDO::FETCH_ASSOC);
		$IDnumber = $row['IDnumber'];
		$firstName = $row['firstName'];
		$middleName = $row['middleName'];
		$lastName = $row['lastName'];
		$address = $row['address'];
		$contactNumber = $row['contactNumber'];*/
		


$pdf = new FPDF('P','mm','letter');

$pdf->AddPage();



$pdf->SetFont("Arial","B",14);



$pdf->SetFont("Arial","B",18);
$pdf->Cell(59,5, "Sasa Court Reservation",0,1); //EOL

$pdf->SetFont("Arial","B",12);
$pdf->Cell(100,5, "Clients List",0,0);

$pdf->Cell(59,5, "",0,1); //EOL

$pdf->Cell(189,10,"",0,1); //EOL


if ($sd != '' AND empty($ed)){
$query = "SELECT * FROM users WHERE (users.dateadded >= '".$sd."+') ORDER BY IDnumber";
}elseif ($ed != '' AND empty($sd)){
$query = "SELECT * FROM users WHERE (users.dateadded <= '".$ed."+') ORDER BY IDnumber";
}elseif ($sd != '' AND $ed != ''){
$query = "SELECT * FROM users WHERE (users.dateadded >= '".$sd."+' AND users.dateadded <= '".$ed."+') ORDER BY IDnumber";
}else{
$query = "SELECT * FROM users ORDER BY IDnumber";
}

$query2 = "SELECT * FROM `users`  WHERE `dateadded` = '0000-00-00'";
//$query3 = "SELECT * FROM transaction JOIN court where transaction.courtID = court.courtID";
$stmt = $database->conn->prepare($query);
$stmt = $database->conn->prepare($query2);
//$stmt = $database->conn->prepare($query3);
$stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $pdf->SetFont("Arial","B",12);
    $pdf->setFillColor(230,230,230);
    $pdf->Cell(30,5,'Client Name:',1,0, '', TRUE);
    $pdf->SetFont("Arial", "",12);
	$pdf->Cell(140,5,"{$firstName} {$middleName} {$lastName}",1,0);

	$pdf->Cell(59,5, "",0,1); //EOL


	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'Address:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(140,5,"{$address}",1,1);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(40,5,'Contact Number:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(130,5,"{$contactNumber}",1,0);

	$pdf->Cell(59,5, "",0,1); //EOL

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'User Name:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(55,5,"{$username}",1,0);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'Password:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(55,5,"{$password}",1,0);


$pdf->Cell(189,10,"",0,1); //EOL
	
}


$pdf->Output();
/*if ($sd != '' AND empty($ed)){
$query = "SELECT * FROM users WHERE (transaction.checkIn >= '".$sd."+') ORDER BY IDnumber";
}elseif ($ed != '' AND empty($sd)){
$query = "SELECT * FROM transaction WHERE (transaction.checkIn <= '".$ed."+') ORDER BY IDnumber";
}elseif ($sd != '' AND $ed != ''){
$query = "SELECT * FROM transaction WHERE (transaction.checkIn >= '".$sd."+' AND transaction.checkIn <= '".$ed."+') ORDER BY IDnumber";
}else{
$query = "SELECT * FROM transaction ORDER BY IDnumber";
}

$query2 = "SELECT * FROM `users` NATURAL JOIN `transaction` NATURAL JOIN `court` WHERE `IDnumber` = '0000-00-00'";
//$query3 = "SELECT * FROM transaction JOIN court where transaction.courtID = court.courtID";
$stmt = $database->conn->prepare($query);
$stmt = $database->conn->prepare($query2);
//$stmt = $database->conn->prepare($query3);
$stmt->execute();*/
?>