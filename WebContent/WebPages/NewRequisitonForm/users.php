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
	
	$op='{ "FName":"'.$val['First Name'].'", "LName":"'.$val['Last Name'].'", "LoginId": "'.$val['LoginId'].'", "Password" :"'.$val['LoginPwd'].'", "Type": "'.$val['Type'].'", "Active": "'.$val['Active'].'", "Email":"'.$val['Email'].'"}';
	
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

if($_POST['type']=='deact'){
	$id=$_POST['id'];
	$qry="UPDATE `users` SET Active=0 where id=".$id;
	if($conn->query($qry)!== TRUE)
		echo 0;
	else echo 1;
}

if($_POST['type']=='react'){
	$id=$_POST['id'];
	$qry="UPDATE `users` SET Active=1 where id=".$id;
	if($conn->query($qry)!== TRUE)
		echo 0;
	else echo 1;
}

if($_POST['type']=='getType'){
	header('Content-Type: application/json');
	
	$id=$_POST['id'];
	$qry="select * from usertypes where id=".$id;
	$res=$conn->query($qry);
	$val=$res->fetch_array(MYSQLI_BOTH);
	
	$op='{ "Type":"'.$val[1].'", "Jcreate":"'.$val[2].'", "Approval": "'.$val[3].'", "Projm" :"'.$val[4].'", "Report": "'.$val[5].'", "Setup":"'.$val[6].'", "Reqs": "'.$val[7].'", "Cost": "'.$val[8].'"}';
	
	echo $op;
	
}
if($_POST['type']=='setTypes'){
	
	$typ=$_POST['utype'];
	$jc=$_POST['jcreate'];
	$app=$_POST['approve'];
	$mp=$_POST['manage'];
	$vr=$_POST['report'];
	$or=$_POST['organize'];
	$req=$_POST['req'];
	$cost=$_POST['cost'];
	$id=$_POST['id'];
	
	$qry="UPDATE `usertypes` SET  `Type` = '".$typ."', `JCCreate` = ".$jc.", `Approval` = ".$app.", `BudgAlloc` = ".$mp.", `Report` = ".$vr.", `Setup` = ".$or.", `CVReqs` = ".$req.", `CostLevel` = ".$cost." WHERE `id` =".$id;
	if($conn->query($qry)!== TRUE)
		echo 0;
	else echo 1;
	
}

if($_POST['type']=='addTypes'){
	
	$typ=$_POST['utype'];
	$jc=$_POST['jcreate'];
	$app=$_POST['approve'];
	$mp=$_POST['manage'];
	$vr=$_POST['report'];
	$or=$_POST['organize'];
	$req=$_POST['req'];
	$cost=$_POST['cost'];
	
	$qry="INSERT INTO `usertypes` ( `Type`, `JCCreate`, `Approval`, `BudgAlloc`, `Report`, `Setup`, `CVReqs`, `CostLevel`) VALUES ('".$typ."', ".$jc.", ".$app.", ".$mp.", ".$vr.", ".$or.", ".$req.", ".$cost.")";
	if($conn->query($qry)!== TRUE)
		echo 0;
	else echo 1;
	
}


$conn->close();