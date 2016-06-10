 <?php
session_start();
$servername = 'localhost';
$username = 'root';
$password = 'pari123#';

$conn = new mysqli($servername, $username, $password,'purchasereq');
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

if($_POST['request']=='process'){
	$reqid= $_SESSION['SReq'];
	$request=$_POST['reqtype'];
	
	if($request=='approveConfirm'){
		$qry="select TotalCost,JobCode from requistion join purdets on requistion.Id=purdets.id where requistion.Id=".$reqid;
		$res=$conn->query($qry);
		$tc=$res->fetch_assoc();
		$qry="select Budget from jobcode where JCId=".$tc['JobCode'];
		$res=$conn->query($qry);
		$bg=$res->fetch_assoc();
		if($tc['TotalCost'] <= $bg['Budget']){
			
			$qry="update jobcode set budget=budget-".$tc['TotalCost']." where JCId=".$tc['JobCode'];
			if($conn->query($qry)==FALSE)
				echo $conn->err;
			$qry="update jobcode set spent=spent+".$tc['TotalCost']." where JCId=".$tc['JobCode'];
			if($conn->query($qry)==FALSE)
				echo $conn->err;
			$qry="insert into approval (ReqId, AppDen, Approver) values (".$reqid.",0,".$_SESSION['ReqstId'].")";
			if($conn->query($qry)==FALSE)
				echo $qry;
			(include 'export.php');
			echo (0);
		}
		else{
			echo (-1);
			$conn->close();
			return;
		}		
	}	
	else if($request=='denyConfirm'){
		$reason=$_POST['reason'];
		$qry="insert into approval (ReqId, AppDen, Reason) values (".$reqid.",1,'".$reason."')";
		$conn->query($qry);
		echo (1);
	}
	
}

if($_POST['request']=='status'){
		$qry1="SELECT * FROM requistion left join approval on requistion.id=approval.ReqId join users on approval.Approver=users.id where requistion.ReqNo='".$_POST['reqno']."'";
		$result1=$conn->query($qry1);
		$status=$result1->fetch_assoc();
		
		//$qry1="SELECT First Name, Last Name from approval join  where "
		//$op='';
		if($status['AppDen']==NULL){
			$op="<span class='label label-warning'><span class='glyphicon  glyphicon-exclamation-sign'></span>Pending</span>";
		}
		else if($status['AppDen']==0){
			$op="<span class='label label-success'><span class='glyphicon glyphicon-ok-circle'></span>		Approved By: ".$status['First Name']."  ".$status['Last Name'].", On:". date_format(date_create($status['Date']),'F j, Y, g:i a')."</span>";
		}
		else{
			$op="<form action='EditPurchaseReq.php' method='post'><span class='label label-danger' title='". $status['Reason']."' style='cursor:pointer'><span class='glyphicon glyphicon-remove-circle'></span>		Denied: ".$status['Reason'].", By: ".$status['First Name']." ".$status['Last Name'].", On: ". date_format(date_create($status['Date']),'F j, Y, g:i a')."</span>";
			$op=$op."<div style='padding-top:10px;'><button type='submit' class='btn btn-default btn-info' id='edit' >Edit Requisition</button></div> <input type='text' hidden value='".$status['Id']."' name='reqd'></form>";
		}
		echo $op;
}
$conn->close();

?>