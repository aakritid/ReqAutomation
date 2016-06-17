<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('America/New_York');
require_once dirname(__FILE__) . '\Classes\PHPExcel\IOFactory.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("..\..\Templates\Budget-Template.xls");

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$query="SELECT * FROM users join usertypes on usertypes.id=users.Type where users.LoginId='".$_SERVER['PHP_AUTH_USER']."'";
$result = $conn->query($query);
$rights=$result->fetch_array(MYSQLI_BOTH);
$level=$rights[6];
$qry='';

if($level==5 || $level==6)
	$qry="select * from jobcode";
else if($level==3){
	$qry="select * from jobcode where PM=".$rights[0];
}
$result = $conn->query($qry);

$objPHPExcel->setActiveSheetIndex(0);
$row=4;
	
	while($itemslist=$result->fetch_assoc()){
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$itemslist['JobCode'])
									->setCellValue('B'.$row,$itemslist['Descr'])
									->setCellValue('C'.$row,$itemslist['Original'])
									->setCellValue('D'.$row,$itemslist['Rev1'])
									->setCellValue('E'.$row,$itemslist['Rev2'])
									->setCellValue('F'.$row,$itemslist['Rev3'])
									->setCellValue('G'.$row,$itemslist['TotalAlloc'])
									->setCellValue('H'.$row,$itemslist['Spent'])
									->setCellValue('I'.$row,$itemslist['Budget']);
		
		$row++;
		}
				
header('Content-Disposition: attachment; filename="budget.xls"');

ob_start();
$objPHPExcel->setActiveSheetIndex(0);		
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

$conn->close();