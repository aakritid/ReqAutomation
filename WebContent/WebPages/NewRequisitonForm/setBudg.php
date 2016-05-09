<?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
$val=$_POST["newBudg"];
$jc= $_POST["JobCode"];

$query="update jobcode set Budget=".$val." where JobCode='".$jc."'";
if ($conn->query($query)== TRUE)
	header("Location: /ReqAutomation/WebContent/WebPages/NewRequisitonForm/BudgetAllocation.php");

$conn->close();

?>
