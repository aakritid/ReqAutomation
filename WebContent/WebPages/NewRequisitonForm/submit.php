<?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
session_start();
$err=0;
$errmsg="";
$active=$_SESSION["active"];
	if ($conn->query("START TRANSACTION") !== TRUE) {
		$err=1; $errmsg=$conn->error; echo '\n Error in start';
	}
	
	$qry ="insert into shipdets (Attn, Date, Method, AddrId) values ('" . $_SESSION["attn"]."', '".$_SESSION["daten"]."', '".$_SESSION["shipMethod"]."', ".$_SESSION['ShipCode'].")";
	if ($conn->query($qry) !== TRUE) {
		$err=1; $errmsg=$conn->error; echo '\nError in insert in shipdets: '.$qry;
	}
	$qry= "insert into requester (ReqsId, Name, Phno, Fno, Email) values ('aakritid','Aakriti Dubey','".$_SESSION["phoneNum"]."', '".$_SESSION["faxNum"]."','".$_SESSION["email"]."')";
	if ($conn->query($qry) !== TRUE) {
		$err=1; $errmsg=$conn->error;echo '\n Error in insert in requester: '.$qry;
	}
	
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
	if($_SESSION['bcs']=='')
		$_SESSION['bcs']=0;
	
	$qry="insert into purdets (ReqsId,JobCode,VendorId,ShipId,Budgeted,BCS,Expl,Scope,Other) values (".$reqsid['max(id)'].", ".$jcid['JCId'].", ".$vid['VendorCode'].", ".$shipid['max(shipid)'].", ".$_SESSION['budgeted']. ", ".$_SESSION['bcs']. ", '". $_SESSION['explain']."', ". $_SESSION['scope']. ", '" . $_SESSION['otherval']."')";
	if ($conn->query($qry) !== TRUE){
		$err=1; $errmsg=$conn->error;echo '\n Error in insert in purdets: '.$qry;
		$qry="select max(id) from purdets";
		$result = $conn->query($qry);
		$reqsid=$result->fetch_assoc();
		echo '\n max id:'.$reqsid['max(id)'];
	}
	
	$qry="select max(id) from purdets";
	$result = $conn->query($qry);
	$reqid=$result->fetch_assoc();
	
	$reqno=sprintf("P%07d",$reqid['max(id)']);
	$qry="insert into requistion (Id, ReqNo, RefQuote, TotalCost) values (".$reqid['max(id)'].", '".$reqno."', '".$_SESSION["refQuote"]."', ".$_SESSION["totalCost"].")";
	if ($conn->query($qry) !== TRUE){
		$err=1; $errmsg=$conn->error;echo '\n Error in insert in requistion: '.$qry;
	}
	
	$itemcnt=$_SESSION["rows"];

	for($rows=0; $rows<=$itemcnt; $rows++){
		
		if($active[$rows]==1){
				$itno=$_SESSION["row".$rows][0];
				$desc=$_SESSION["row".$rows][1];
				$qnt=$_SESSION["row".$rows][2];
				$un=$_SESSION["row".$rows][3];
				$unpr=$_SESSION["row".$rows][4];
				$tot=$_SESSION["row".$rows][5];
				
				$qry="insert into itemdescr (ItemNo, Descr, Quantity, UnitDesc,UnitPrice, Total) values ('".$itno."', '".$desc."' , ".$qnt.", '".$un."' , ". $unpr.", '".$tot."')";
				
				if ($conn->query($qry) !== TRUE) {
				$err=1; $errmsg=$conn->error;echo '\n Error in insert in itemdescr: '.$qry;
				}
			
				$qry="select max(itemid) from itemdescr";
				$result = $conn->query($qry);
				$maxval=$result->fetch_assoc();
				
				
				$qry="insert into itemmap values (".$reqid['max(id)'].",".$maxval['max(itemid)'].")";
				if ($conn->query($qry) !== TRUE) {
				$err=1; $errmsg=$conn->error;echo '\n Error in insert in itemmap: '.$qry;
				}
		}
	}
	if($err == 1){
		if ($conn->rollback()!== TRUE)
			echo 'Error in rollback';
		echo 'Failed to Submit because '.$errmsg;
	}
	else{
		if ($conn->commit()!== TRUE)
			echo 'Error in commit';
		echo $err;
	}
$conn->close();

?>