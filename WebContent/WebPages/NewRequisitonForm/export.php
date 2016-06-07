<?php

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');
date_default_timezone_set('America/New_York');
/** PHPExcel_IOFactory */
require_once dirname(__FILE__) . '\Classes\PHPExcel\IOFactory.php';
$objReader = PHPExcel_IOFactory::createReader('Excel5');
$objPHPExcel = $objReader->load("template.xls");

$reqid=$_SESSION['SReq'];



$qry="select * from requistion where Id=".$reqid;
$result = $conn->query($qry);
$reqs=$result->fetch_assoc();

$qry="select DATE_FORMAT(Date,'%d %b %Y') from requistion where Id=".$reqid;
$result = $conn->query($qry);
$date=$result->fetch_assoc();

$reqno=$reqs['ReqNo'];
$refqt=$reqs['RefQuote'];
$tc=$reqs['TotalCost'];


$qry="select * from purdets where id=".$reqid;
$result = $conn->query($qry);
$prdts=$result->fetch_assoc();

$qry="select JobCode,Budget from jobcode where JCId=".$prdts['JobCode'];
$result = $conn->query($qry);
$jcd=$result->fetch_assoc();
$jcd=$jcd['JobCode'];

$qry="select * from requester where id=".$prdts['ReqsId'];
$result = $conn->query($qry);
$requester=$result->fetch_assoc();

$qry="select * from vendor where VendorCode=".$prdts['VendorId'];
$result = $conn->query($qry);
$vendor=$result->fetch_assoc();

$qry="select * from shipdets where shipid=".$prdts['ShipId'];
$result = $conn->query($qry);
$ship=$result->fetch_assoc();

$qry="select * from shippingaddr where AddrId=".$ship['AddrId'];
$result = $conn->query($qry);
$addr=$result->fetch_assoc();

$qry="select ItemId from itemmap where ReqId=".$reqid;
$result = $conn->query($qry);


$bdg="";	
switch($prdts['Budgeted']){
	case 0: $budg="YES";
			$bcs=$prdts['BCS'];
			$expl='';
			break;
	case 1: $budg="NO";
			$expl=$prdts['Expl'];
			$bcs='';
			break;
	
}

$scope="";
switch($prdts['Scope']){
	case 0: $scope=" PARI INDIA SCOPE";
			break;
	case 1: $scope=" PARI INC SCOPE";
			break;
	case 2: $scope=" OTHER:  ".$prdts['Other'];
			break;
}

$dt=$date['DATE_FORMAT(Date,\'%d %b %Y\')'];
$name=$requester['Name'];
$vend=$vendor['VendorName'];
$vaddr=$vendor['VendorAddress'];
$saddr=sprintf("%s,\n%s,\n%s,\n%s-%s.\n%s.", $addr['Name'], $addr['Address'], $addr['City'], $addr['State'], $addr['ZipCode'], $addr['Country']);
$attn=$ship['Attn'];
$phno=$requester['Phno'];
$faxno=$requester['Fno'];
$email=$requester['Email'];
$date=$ship['Date'];
$smeth=$ship['Method'];

$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->setCellValue('A1',$dt)
							->setCellValue('B1','PURCHASE REQUISITION: '.$reqno)
							->setCellValue('B4',$name)
							->setCellValue('B6',$jcd)
							->setCellValue('B8',$vend)
							->setCellValue('B10',$vaddr)
							->setCellValue('B12',$saddr)
							->setCellValue('B14',$attn)
							->setCellValue('B16',$budg)
							->setCellValue('B18',$bcs)
							->setCellValue('B19',$expl)
							->setCellValue('B21',$phno)
							->setCellValue('B23',$faxno)
							->setCellValue('B25',$email)
							->setCellValue('B27',$date)
							->setCellValue('B29',$smeth)
							->setCellValue('B31',$scope);

$objPHPExcel->setActiveSheetIndex(1);
$objPHPExcel->getActiveSheet()->setCellValue('B2',$reqs['RefQuote'])
							->setCellValue('E2','$'.number_format($reqs['TotalCost'], 2, '.', ','));
							
$qry="select ItemId from itemmap where ReqId=".$reqid;
$result = $conn->query($qry);
$row=5;
	
	while($itemslist=$result->fetch_assoc()){
		$qry="select * from itemdescr where itemid=".$itemslist['ItemId'];
		$result1 = $conn->query($qry);
		$dets= $result1->fetch_assoc();
		
		$objPHPExcel->getActiveSheet()->setCellValue('A'.$row,$dets['ItemNo'])
									->setCellValue('B'.$row,$dets['Descr'])
									->setCellValue('C'.$row,$dets['Quantity'])
									->setCellValue('D'.$row,$dets['UnitDesc'])
									->setCellValue('E'.$row,$dets['UnitPrice'])
									->setCellValue('F'.$row,$dets['Total']);
		
		$row++;
		}

ob_start();
$objPHPExcel->setActiveSheetIndex(0);		
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
$excelFileContents = ob_get_clean();
$filename=$reqno.'.xls';

$content = chunk_split(base64_encode($excelFileContents));
$uid = md5(uniqid(time()));
$header = "From: ".'PARI Purchase Req'." <"."pari.purchasereq@gmail.com".">\r\n";
$header .= "Reply-To: "."no-reply@pariusa.com"."\r\n";
$header .= "MIME-Version: 1.0\r\n";
$header .= "Content-Type: multipart/mixed; boundary=\"".$uid."\"\r\n\r\n";

$nmessage = "Content-type:text/plain; charset=iso-8859-1\r\n";
$nmessage .= "Content-Transfer-Encoding: 7bit\r\n\r\n";
$nmessage .= "PFA Approved Purchase Req - ". $reqno."\r\n\r\n";
$nmessage .= "--".$uid."\r\n";
$nmessage .= "Content-Type: application/octet-stream; name=\"".$filename."\"\r\n";
$nmessage .= "Content-Transfer-Encoding: base64\r\n";
$nmessage .= "Content-Disposition: attachment; filename=\"".$filename."\"\r\n\r\n";
$nmessage .= $content."\r\n\r\n";
$nmessage .= "--".$uid."--";


mail("aakritid@pariusa.com", "Purchase Requisition - ".$reqno, $nmessage, $header);
