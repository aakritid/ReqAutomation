 <?php
session_start();
$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
//'request': 'process','reqtype': str

if($_POST['request']=='process'){
	$reqid= $_SESSION['SReq'];
	$request=$_POST['reqtype'];
	
	if($request=='Approve'){
		$qry="insert into approval (ReqId, AppDen) values (".$reqid.",0)";
		echo (0);
	}
	
	else if($request=='Confirm'){
		$reason=$_POST['reason'];
		$qry="insert into approval (ReqId, AppDen, Reason) values (".$reqid.",1,'".$reason."')";
		echo (1);
	}
	$conn->query($qry);
}


$conn->close();

?>