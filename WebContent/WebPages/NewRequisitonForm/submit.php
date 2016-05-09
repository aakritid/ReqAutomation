<?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
session_start();

$itemcnt=$_SESSION["rows"];

$qry="select max(itemid) from itemdescr";
	$result = $conn->query($qry);
	$maxitm=$result->fetch_assoc();
	
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
	
	$qry ="insert into shipdets (ShipAddr, Attn, Date, Method) values ('". $_SESSION["shipAddr"]."' , '" . $_SESSION["attn"]."', '".$_SESSION["daten"]."', '".$_SESSION["shipMethod"]."')";
	if ($conn->query($qry) === TRUE) 
		echo 'Success';
	else
		echo 'Fail';
}
$conn->close();

?>