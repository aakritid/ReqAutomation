<?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
$val=$_GET['q'];
if($val!=""){
	$qry="SELECT VendorAddress FROM vendor WHERE VendorName='".$val."'";
	$result = $conn->query($qry);
	$addr=$result->fetch_assoc();
	echo $addr['VendorAddress'];
}
$conn->close();

?>
