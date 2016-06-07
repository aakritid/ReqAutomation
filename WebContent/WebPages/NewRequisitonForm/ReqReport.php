<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('America/New_York');
/** PHPExcel_IOFactory */
require_once dirname(__FILE__) . '\Classes\PHPExcel\IOFactory.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("..\..\Templates\ReqReport-Template.xls");

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}
$qry="select requistion.ReqNo,requester.Name, jobcode.JobCode, requistion.TotalCost, DATE_FORMAT(requistion.Date,'%d %b %Y %h:%i %p') from purdets INNER join requistion on requistion.Id=purdets.id INNER JOIN jobcode on purdets.JobCode=jobcode.JCId INNER join requester on purdets.ReqsId=requester.id";
$result = $conn->query($qry);

$objPHPExcel->setActiveSheetIndex(0);
$row=4;
	
	while($itemslist=$result->fetch_assoc()){
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$itemslist['ReqNo'])
									->setCellValue('B'.$row,$itemslist['Name'])
									->setCellValue('C'.$row,$itemslist['JobCode'])
									->setCellValue('D'.$row,$itemslist['TotalCost'])
									->setCellValue('E'.$row,$itemslist["DATE_FORMAT(requistion.Date,'%d %b %Y %h:%i %p')"]);
									
		$qry1="SELECT * FROM requistion left join approval on requistion.id=approval.ReqId where requistion.ReqNo='".$itemslist['ReqNo']."'";
		$result1=$conn->query($qry1);
		$status=$result1->fetch_assoc();
		if($status['AppDen']==NULL){
				$objPHPExcel->getActiveSheet()->setCellValue('F'.$row,"Pending");
		}
		else if($status['AppDen']==0){
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$row,"Approved");
		}
		else{
			$objPHPExcel->getActiveSheet()->setCellValue('F'.$row,"Denied");
		}
		
		$row++;
	}
				
header('Content-Disposition: attachment; filename="req-report.xls"');

ob_start();
$objPHPExcel->setActiveSheetIndex(0);		
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');

$conn->close();