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
	
	if($budget=="" && $pm!=""){
		$query="INSERT INTO jobcode (JobCode, Descr, PM) values ('".$jc."','".$desc."',".$pm.")";
	}
	else if ($budget!="" && $pm==""){
		$query="INSERT INTO jobcode (JobCode, Descr, Budget) values ('".$jc."','".$desc."',".$budget.")";
	}
	else if ($budget=="" && $pm==""){
		$query="INSERT INTO jobcode (JobCode, Descr) values ('".$jc."','".$desc."')";
	}
	else{
		$query="INSERT INTO jobcode (JobCode, Descr, Budget, PM) values ('".$jc."','".$desc."',".$budget.",".$pm.")";
	}
	if ($conn->query($query) !== TRUE) {
		echo $query;
		echo $conn->error;
	}
	else
		echo 1;
	
}
$conn->close();

?>
