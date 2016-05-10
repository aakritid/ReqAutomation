<?php

session_start();

$reqno= $_POST['reqno'];
$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$qry="select * from requistion where ReqNo='".$reqno."'";
$result = $conn->query($qry);
$reqs=$result->fetch_assoc();

$qry="select DATE_FORMAT(Date,'%d %b %Y') from requistion where ReqNo='".$reqno."'";
$result = $conn->query($qry);
$date=$result->fetch_assoc();

$reqid=$reqs['Id'];
$refqt=$reqs['RefQuote'];
$tc=$reqs['TotalCost'];

$_SESSION['SReq']=$reqid;

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

$qry="select ItemId from itemmap where ReqId=".$reqid;
$result = $conn->query($qry);

$opt3="<table class='table table-bordered' style='padding:10px' ><tbody><thead> <tr><th class='col-sm-2 text-center'> Item # </th><th class='col-sm-4 text-center'> Item Description (include note & quote number)</th>";
$opt3=$opt3."<th class='col-sm-1 text-center'> Quantity</th><th class='col-sm-2 text-center'> Unit Description</th><th class='col-sm-1 text-center'>Unit Price</th><th class='col-sm-2 text-center'>Total</th></tr>	</thead><tbody id='itemTable'>";
	
	while($itemslist=$result->fetch_assoc()){
		$qry="select * from itemdescr where itemid=".$itemslist['ItemId'];
		$result1 = $conn->query($qry);
		$dets= $result1->fetch_assoc();
		
		$opt3=$opt3."<tr class ='text-center'><td><p>".$dets['ItemNo']."</p></td><td><p>".$dets['Descr']."</p></td><td><p>".$dets['Quantity']."</p></td><td><p>".$dets['UnitDesc']."</p></td>";
		$opt3=$opt3."<td><p>".$dets['UnitPrice']."</p></td><td><p>".$dets['Total']."</p></td></tr>";
	}
$opt3=$opt3."</tbody></table>";	
$bdg="";	
switch($prdts['Budgeted']){
	case 0: $bdg="YES<br> <b>BCS No: ".$prdts['BCS']."</b>";
			break;
	case 1: $bdg="NO<br> Explanation: ".$prdts['Expl'];
			break;
	
}

$scope="";
switch($prdts['Scope']){
	case 0: $scope=" PARI INDIA SCOPE";
			break;
	case 1: $scope=" PARI INC SCOPE";
			break;
	case 2: $scope=" OTHER<br> ".$prdts['Other'];
			break;
}
	$op="";
	$opt1="<div class='container '><label class='pull-right col-sm-4'>Requsition Date:    ".$date['DATE_FORMAT(Date,\'%d %b %Y\')']."</label></div>";
	$opt1=$opt1."<div class='container' style='padding: 10px;'>";
	$opt1= $opt1."<div class='col-sm-4'><label>Requisition No: ".$reqno." </label></div>";
	$opt1= $opt1."<div class='col-sm-4'><label for='requester'>Requested By: ".$requester['Name']." </label></div>";
	$opt1= $opt1." <div class='col-sm-4 pull-right'><label>Job Code:</label><label>".$jcd."</label></div></div>";
		
	$opt2=" <table class='table table-bordered' style='padding:10px'>";
	$opt2=$opt2."<tbody><tr><td colspan='2' class='col-sm-4'><label>Suggested Vendor:  </label><p>".$vendor['VendorName']. "</p></td>";
	$opt2=$opt2."<td class='col-sm-4'><label>Shipping Address:</label><p>".$ship['ShipAddr']."</p></td><td rowspan='2' class='col-sm-4'><label>Budgeted: </label><p>".$bdg."</p></td></tr>";
	$opt2=$opt2."<tr><td colspan='2' class='col-sm-4'><label>Address of Vendor:</label><p>".$vendor['VendorAddress']."</p></td><td class='col-sm-4'><label>Attention:</label><p>".$ship['Attn']."</p></td></tr>";
	$opt2=$opt2."<tr><td class='col-sm-2'><label>Phone Number:</label><p>".$requester['Phno']."</p></td><td class='col-sm-2'><label>Fax Number:</label><p>".$requester['Fno']."</p></td>";
	$opt2=$opt2."<td class='col-sm-4 form-control'><label>Date Needed:</label><p>".$ship['Date']."</p></td>";
	$opt2=$opt2."<td rowspan='2' class='col-sm-4'><label>Scope: </label><p>".$scope."</p></td></tr>";
	$opt2=$opt2."<tr><td colspan='2' class='col-sm-4'><label>Email:</label><p>".$requester['Email']."</p></td><td class='col-sm-4'><label>Shipping Method:</label><p>".$ship['Method']."</p></td></tr>";
	$opt4="<div class='container'><div class='form-inline col-sm-8 pull-left'><label>Reference Quote # :   ".$reqs['RefQuote']."</label></div>";
	$opt4=$opt4."<div class='col-sm-2 pull-right'><label id='totalCost'>Total Cost:   $".number_format($reqs['TotalCost'], 2, '.', ',')."</label></div></div>";
$opt2=$opt2."</tbody></table>";
$op=$opt1.$opt2.$opt3.$opt4;
	echo $op;
$conn->close();
?>