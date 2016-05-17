 <?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = 'pari123#';

$conn = new mysqli($servername, $username, $password,'purchasereq');
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

if($_POST['request']=='status'){
		$qry1="SELECT * FROM requistion left join approval on requistion.id=approval.ReqId where requistion.ReqNo='".$_POST['reqno']."'";
		$result1=$conn->query($qry1);
		$status=$result1->fetch_assoc();
		$op='';
		if($status['AppDen']==NULL){
			$op="<span class='label label-warning'><span class='glyphicon  glyphicon-exclamation-sign'></span>Pending</span>";
		}
		else if($status['AppDen']==0){
			$op="<span class='label label-success'><span class='glyphicon glyphicon-ok'></span>		Approved: ". date_format(date_create($status['Date']),'F j, Y, g:i a')."</span>";
		}
		else{
			$op="<span class='label label-danger' title='". $status['Reason']."' style='cursor:pointer'><span class='glyphicon glyphicon-remove'></span>		Denied:: ". date_format(date_create($status['Date']),'F j, Y, g:i a')."</span>";
		}
		echo $op;
}
$conn->close();

?>