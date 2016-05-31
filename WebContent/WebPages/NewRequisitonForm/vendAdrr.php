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
$conn->close();

?>
