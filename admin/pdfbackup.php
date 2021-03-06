<?php
include "../assets/fpdf/fpdf.php";
include_once '../classes/users.php';
include_once '../config/database.php';

$sd= isset ($_GET ['sd']) ? $_GET['sd']: die('ERROR: missing ID.');
$ed= isset ($_GET ['ed']) ? $_GET['ed']: die('ERROR: missing ID.');

$database = new Database();
$db = $database->getConnection();

$pdf = new FPDF('L','mm','letter');

$pdf->AddPage();

$pdf->SetFont("Arial","B",18);
$pdf->Cell(59,5, "Sports Complex Event Reservation",0,1); //EOL



$pdf->SetFont("Arial","B",14);
$pdf->Cell(59,5, "List of Transactions",0,1); //EOL

$pdf->SetFont("Arial","B",11);
$pdf->Cell(59,5, "from",0,1); //EOL


$pdf->SetFont("Arial","B",11);
if(!empty($sd) AND empty($ed)){
	$pdf->Cell(100,5, "(".$sd." - "."Present)",0,1);
}elseif(empty($sd) AND !empty($ed)){
	$pdf->Cell(100,5, "(Before ".$ed.")",0,1);
}elseif(!empty($sd) AND !empty($ed)){
	$pdf->Cell(100,5, "(".$sd." - ".$ed.")",0,1);
}

$pdf->Cell(189,10,"",0,1); //EOL

if ($sd != '' AND empty($ed)){
$query = "SELECT * FROM transaction WHERE (transaction.checkIn >= '".$sd."+') ORDER BY status";
}elseif ($ed != '' AND empty($sd)){
$query = "SELECT * FROM transaction WHERE (transaction.checkIn <= '".$ed."+') ORDER BY status";
}elseif ($sd != '' AND $ed != ''){
$query = "SELECT * FROM transaction WHERE (transaction.checkIn >= '".$sd."+' AND transaction.checkIn <= '".$ed."+') ORDER BY status";
}else{
$query = "SELECT * FROM transaction ORDER BY status";
}

$query2 = "SELECT * FROM `transaction` NATURAL JOIN `users` NATURAL JOIN `court` WHERE `checkOut` = '0000-00-00'";
//$query3 = "SELECT * FROM transaction JOIN court where transaction.courtID = court.courtID";
$stmt = $database->conn->prepare($query);
$stmt = $database->conn->prepare($query2);
//$stmt = $database->conn->prepare($query3);
$stmt->execute();




//if ($sd != '' AND empty($ed)){
//$query2 = "SELECT * FROM users INNER JOIN transaction where users.IDnumber = transaction.IDnumber";
//}elseif ($ed != '' AND empty($sd)){
//$query2 = "SELECT * FROM users INNER JOIN transaction where users.IDnumber = transaction.IDnumber";
//}elseif ($sd != '' AND $ed != ''){
//$query2 = "SELECT * FROM users INNER JOIN transaction where users.IDnumber = transaction.IDnumber";
//}else{
//$query2 = "SELECT * FROM users INNER JOIN transaction where users.IDnumber = transaction.IDnumber";
//}


//$stmt2 = $database->conn->prepare($query2);
//$stmt2->execute();




while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
    extract($row);
    $pdf->SetFont("Arial","B",12);
    $pdf->setFillColor(230,230,230);
    $pdf->Cell(30,5,'Client Name:',1,0, '', TRUE);
    $pdf->SetFont("Arial", "",12);
	$pdf->Cell(60,5,"{$firstName} {$lastName}",1,0);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'Venue Name:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(60,5,"{$courtName}",1,0);

	//$pdf->Cell(20,5,'',1,0);
	$pdf->Cell(80,5,"",1,1);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'Days of Use:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(60,5,"{$daysUse}",1,0);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'CheckIn Date:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(60,5,"{$checkIn}",1,0);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'CheckIn Time:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(50,5,"{$checkInTime}",1,1);

	/*$pdf->SetFont("Arial","B",12);
	$pdf->Cell(40,5,'Check Out Date',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(50,5,"{$checkOut}",1,0);*/

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(40,5,'Check Out Time:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(50,5,"{$checkOutTime}",1,0);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'Status:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(60,5,"{$status}",1,0);

	$pdf->SetFont("Arial","B",12);
	$pdf->Cell(30,5,'Total Price:',1,0, '', TRUE);
	$pdf->SetFont("Arial", "",12);
	$pdf->Cell(50,5,"{$totalPrice}",1,0);

	$pdf->Cell(160,5,"",0,1);
	//$pdf->Cell(59,5,"",0,1); //EOL

	

	$pdf->Cell(189,10,"",0,1); //EOL
}


$pdf->Output();

?>