<?php
$qry1="select * from users where users.id in (select u.id from users u join usertypes ut on u.Type=ut.id join requistion rt join purdets pd on rt.Id=pd.id join jobcode jc on pd.JobCode=jc.JCId where rt.TotalCost<=ut.CostLevel AND (ut.id=5 OR ut.id=6 OR jc.PM=u.id) AND jc.JCId=".$jcid['JCId']." group by u.id)";
$result = $conn->query($qry1);

while($users=$result->fetch_assoc()){
	$msg="";
	$qry1="Select * from usertypes where id=".$users['Type'];
	$result1 = $conn->query($qry1);
	$auth=$result1->fetch_assoc();
	
	
	if($auth['id']==5 || $auth['id']==6)		
		$qry2="select count(*) from requistion join purdets on requistion.Id=purdets.id join requester on purdets.ReqsId=requester.id where requistion.Id not in (select ReqId from approval) AND requistion.TotalCost<=".$auth['CostLevel']." AND ((requester.UserId<>".$users['id'].") OR (requester.UserId=".$users['id']." AND requistion.SelfApp=1))";
	else if($auth['id']==2 || $auth['id']==3)
		$qry2="select count(*) from purdets INNER join requistion on requistion.Id=purdets.id INNER JOIN jobcode on purdets.JobCode=jobcode.JCId INNER join requester on purdets.ReqsId=requester.id where purdets.id not in (select ReqId from approval) AND jobcode.JobCode IN (select JobCode from jobcode where PM=".$users['id'].") AND requistion.TotalCost<=".$auth['CostLevel']." AND ((requester.UserId<>".$users['id'].") OR (requester.UserId=".$users['id']." AND requistion.SelfApp=1))";

	if($auth['Approval']!=0){
		$result1 = $conn->query($qry2);
		$reqs=$result1->fetch_assoc();
		$unapproved=$reqs['count(*)'];
	}
	$msg = sprintf("You have %d requisitions pending for approval. Please approve at the earliest.\n\n\n\n THIS IS A SYSTEM GENERATED E-MAIL. PLEASE DO NOT REPLY.",$unapproved);

	$msg = wordwrap($msg,100);
	mail($users['Email'],"Requisition Update",$msg);
	
	}
?>

