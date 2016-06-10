<?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
$type=$_GET['type'];
if($type=="get"){
	$val=$_GET['q'];
	if($val=="new"){
		echo "new";
	}
	else if($val!=""){
		$qry="SELECT VendorAddress FROM vendor WHERE VendorName='".$val."'";
		$result = $conn->query($qry);
		$addr=$result->fetch_assoc();
		echo $addr['VendorAddress'];
	}
}
else if($type=="set"){
	$name=$_GET['name'];
	$addr=$_GET['addr'];
	$qry="INSERT INTO vendor (VendorName, VendorAddress) VALUES ('".$name."' , '".$addr."')";
	if ($conn->query($qry) !== TRUE) {
		echo 0;
	}
	else
		echo 1;
}
else if($type=="getBudg"){
	$jc=$_GET['q'];
	if($jc=="new"){
		echo "new";
	}
	else if($jc!=""){
		$query="SELECT Budget FROM `jobcode` WHERE JobCode='".$jc."'";
			$result = $conn->query($query);
			$budg=$result->fetch_assoc();
			echo $budg['Budget'];
	}
}

else if($type=="setJc"){
	$jc=$_GET['jc'];
	$desc=$_GET['desc'];
	$budget=$_GET['budget'];
	$pm=$_GET['pm'];
	
	$query1="";
	if($budget=="" && $pm!=""){
		$query="INSERT INTO jobcode (JobCode, Descr, PM) values ('".$jc."','".$desc."',".$pm.")";
		$query1="UPDATE users set Type=3 where id=".$pm;
	}
	else if ($budget!="" && $pm==""){
		$query="INSERT INTO jobcode (JobCode, Descr, Budget) values ('".$jc."','".$desc."',".$budget.")";
	}
	else if ($budget=="" && $pm==""){
		$query="INSERT INTO jobcode (JobCode, Descr) values ('".$jc."','".$desc."')";
	}
	else{
		$query="INSERT INTO jobcode (JobCode, Descr, Budget, PM) values ('".$jc."','".$desc."',".$budget.",".$pm.")";
		$query1="UPDATE users set Type=3 where id=".$pm;
	}
	if ($conn->query($query) !== TRUE) {
		//echo $query;
		echo $conn->error;
	}
	else
		echo 1;
	if($query1!=""){
		if ($conn->query($query1) !== TRUE) {
			//echo $query;
			echo $conn->error;
		}
		else
			echo 1;
	}
	
}

else if($type=="getShip"){
	$val=$_GET['q'];
	if($val=="new"){
		echo "new";
	}
	else if($val!=""){
		$qry="SELECT * FROM shippingaddr WHERE AddrId=".$val;
		$result = $conn->query($qry);
		$addr=$result->fetch_assoc();
		echo sprintf("%s,\n%s,\n%s,\n%s-%s.\n%s.", $addr['Name'], $addr['Address'], $addr['City'], $addr['State'], $addr['ZipCode'], $addr['Country']) ;
	}
}

else if($type=="setSAd"){
	$nm=$_GET['ln'];
	$addr=$_GET['add'];
	$ct=$_GET['ct'];
	$cn=$_GET['cn'];
	$zp=$_GET['zp'];
	$st=$_GET['st'];
	$qry="INSERT INTO shippingaddr (`Name`, `Address`, `City`, `State`, `Country`, `ZipCode`) VALUES ('".$nm."', '".$addr."','".$ct."','".$st."','".$cn."','".$zp."')";
	if ($conn->query($qry) !== TRUE) {
		echo -1;
	}
	else{
		$qry="select max(AddrId) from shippingaddr";
		$result = $conn->query($qry);
		$cnt=$result->fetch_assoc();
		echo $cnt['max(AddrId)'];
	}
		
	
}

$conn->close();

?>
