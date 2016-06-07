<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('America/New_York');
/** PHPExcel_IOFactory */
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
$qry="select * from jobcode";
$result = $conn->query($qry);

$objPHPExcel->setActiveSheetIndex(0);
$row=4;
	
	while($itemslist=$result->fetch_assoc()){
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$itemslist['JobCode'])
									->setCellValue('B'.$row,$itemslist['Descr'])
									->setCellValue('C'.$row,$itemslist['TotalAlloc'])
									->setCellValue('D'.$row,$itemslist['Spent'])
									->setCellValue('E'.$row,$itemslist['LastSet'])
									->setCellValue('F'.$row,$itemslist['Budget']);
		
		$row++;
		}
				
header('Content-Disposition: attachment; filename="budget.xls"');

ob_start();
$objPHPExcel->setActiveSheetIndex(0);		
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

$conn->close();