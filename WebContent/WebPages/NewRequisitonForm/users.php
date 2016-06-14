<?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = 'pari123#';

$conn = new mysqli($servername, $username, $password,'purchasereq');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

if($_POST['type']=='add'){
	$fnm=$_POST['fnm'];
	$lnm=$_POST['lnm'];
	$lid=$_POST['lid'];
	$pwd=$_POST['pwd'];
	$email=$_POST['email'];
	$auth=$_POST['auth'];
	
	$qry="Insert into users (`First Name`, `Last Name`, `LoginId`, `LoginPwd`, `Email`, `Type`) VALUES ('".$fnm."', '".$lnm."', '".$lid."', '".$pwd."', '".$email."', ".$auth.")";
	//echo $qry;
	if($conn->query($qry)!= TRUE)
		echo 0;
	else
		echo 1;
	
}
if($_POST['type']=='get'){
	header('Content-Type: application/json');
	
	$id=$_POST['id'];
	$qry="select * from users where id=".$id;
	$res=$conn->query($qry);
	$val=$res->fetch_array(MYSQLI_BOTH);
	
	$op='{ "FName":"'.$val['First Name'].'", "LName":"'.$val['Last Name'].'", "LoginId": "'.$val['LoginId'].'", "Password" :"'.$val['LoginPwd'].'", "Type": "'.$val['Type'].'", "Email":"'.$val['Email'].'"}';
	
	echo $op;
	
}
if($_POST['type']=='set'){
	$id=$_POST['id'];
	$fnm=$_POST['fnm'];
	$lnm=$_POST['lnm'];
	$lid=$_POST['lid'];
	$pwd=$_POST['pwd'];
	$email=$_POST['email'];
	$auth=$_POST['auth'];
	
	$qry="UPDATE `users` SET `First Name` = '".$fnm."', `Last Name` = '".$lnm."', `LoginId` = '".$lid."', `LoginPwd` = '".$pwd."', `Email` = '".$email."', `Type` = ".$auth." WHERE id =".$id;
	if($conn->query($qry)!== TRUE)
		echo 0;
	else echo 1;
	
}

$conn->close();