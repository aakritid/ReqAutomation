<?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
session_start();


	$qry ="insert into shipdets (ShipAddr, Attn, Date, Method) values ('". $_SESSION["shipAddr"]."' , '" . $_SESSION["attn"]."', '".$_SESSION["daten"]."', '".$_SESSION["shipMethod"]."')";
	if ($conn->query($qry) === TRUE) 
		echo 'Success';
	else
		echo 'Fail';
	
	$qry= "insert into requester (ReqsId, Name, Phno, Fno, Email) values ('aakritid','Aakriti Dubey','".$_SESSION["phoneNum"]."', '".$_SESSION["faxNum"]."','".$_SESSION["email"]."')";
	if ($conn->query($qry) === TRUE) 
		echo 'Success';
	else
		echo 'Fail';
	
	$qry= "select JCId from jobcode where JobCode='".$_SESSION["JobCode"]."'";
	$result = $conn->query($qry);
	$jcid=$result->fetch_assoc();
	
	$qry= "select VendorCode from vendor where VendorName='".$_SESSION["suggvendor"]."'";
	$result = $conn->query($qry);
	$vid=$result->fetch_assoc();
	
	$qry="select max(shipid) from shipdets";
	$result = $conn->query($qry);
	$shipid=$result->fetch_assoc();
	
	$qry="select max(id) from requester";
	$result = $conn->query($qry);
	$reqsid=$result->fetch_assoc();
	
	$qry="insert into purdets (ReqsId,JobCode,VendorId,ShipId,Budgeted,BCS,Expl,Scope,Other) values (".$reqsid['max(id)'].", ".$jcid['JCId'].", ".$vid['VendorCode'].", ".$shipid['max(shipid)'].", ".$_SESSION['budgeted']. ", ".$_SESSION['bcs']. ", '". $_SESSION['explain']."', ". $_SESSION['scope']. ", '" . $_SESSION['otherval']."')";
	if ($conn->query($qry) === TRUE) 
		echo 'Success';
	else
		echo 'Fail';
	
	$qry="select max(id) from purdets";
	$result = $conn->query($qry);
	$reqid=$result->fetch_assoc();
	
	$reqno=sprintf("P%07d",$reqid);
	//echo $preq;
	$qry="insert into requistion (Id, ReqNo, RefQuote, TotalCost) values (".$reqid['max(id)'].", '".$reqno."', '".$_SESSION["refQuote"]."', ".$_SESSION["totalCost"].")";
	if ($conn->query($qry) === TRUE) 
		echo 'Success';
	else
		printf("Errormessage: %s\n", $conn->error);
	
	$itemcnt=$_SESSION["rows"];

	$qry="select max(itemid) from itemdescr";
	$result = $conn->query($qry);
	$maxitm=$result->fetch_assoc();
	if($maxitm['max(itemid)'] == NULL)
		$maxid=1;
	else
		$maxid=$maxitm['max(itemid)'];
	
	for($rows=0; $rows<=$itemcnt; $rows++){
		$itno=$_SESSION["row".$rows][0];
		$desc=$_SESSION["row".$rows][1];
		$qnt=$_SESSION["row".$rows][2];
		$un=$_SESSION["row".$rows][3];
		$unpr=$_SESSION["row".$rows][4];
		$tot=$_SESSION["row".$rows][5];
		
		$qry="select max(itemid) from itemdescr";
		$result = $conn->query($qry);
		$maxval=$result->fetch_assoc();
		
		$qry="insert into itemdescr (ItemNo, Descr, Quantity, UnitDesc,UnitPrice, Total) values (".$itno.", '".$desc."' , ".$qnt.", '".$un."' , ". $unpr.", '".$tot."')";
		
		if ($conn->query($qry) === TRUE) 
			echo 'Success';
		else
			echo 'Fail';
		
		$qry="insert into itemmap values (".$reqid['max(id)'].",".$maxid.")";
		if ($conn->query($qry) === TRUE) 
			echo 'Success';
		else
			echo 'Fail';
		
		$maxid++;
	}

$conn->close();

?>