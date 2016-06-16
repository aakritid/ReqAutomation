<style>
  .reqd{
	  color:red;
	  font-size:125%;
  }
  </style>
<?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$qry="select * from users where LoginId= '".$_SERVER['PHP_AUTH_USER']."'";
$result = $conn->query($qry);
$user=$result->fetch_assoc();

$qry1="Select * from usertypes where id=".$user['Type'];
$result = $conn->query($qry1);
$auth=$result->fetch_assoc();
$qry='';
$unapproved=0;

if($auth['id']==5 || $auth['id']==6)		
	$qry="select count(*) from requistion join purdets on requistion.Id=purdets.id join requester on purdets.ReqsId=requester.id where requistion.Id not in (select ReqId from approval) AND requistion.TotalCost<=".$auth['CostLevel']." AND requester.UserId<>".$user['id'];
else if($auth['id']==2 || $auth['id']==3)
	$qry="select count(*) from purdets INNER join requistion on requistion.Id=purdets.id INNER JOIN jobcode on purdets.JobCode=jobcode.JCId INNER join requester on purdets.ReqsId=requester.id where purdets.id not in (select ReqId from approval) AND jobcode.JobCode IN (select JobCode from jobcode where PM=".$user['id'].") AND requistion.TotalCost<=".$auth['CostLevel']." AND requester.UserId<>".$user['id'];	

if($auth['Approval']!=0){
$result = $conn->query($qry);
$reqs=$result->fetch_assoc();
$unapproved=$reqs['count(*)'];
}
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">PARI Purchase Requisition</a>
    </div>
    <ul class="nav navbar-nav">
      <li id='l1' class="active"><a href="PurchaseRequisition.php">New Requisition</a></li>
      <li id='l2'><a href="ViewSubmissions.php">Submitted Requisitions</a></li>
      <li id='l3'><a href="Approval.php" <?php if($auth['Approval']==0){ ?> style="display:none" <?php } ?>>Approve Requests  <?php if($unapproved>0){ ?><span class="badge"><?php echo $unapproved; ?></span> <?php } ?></a></li> 
	  <li id='l4'><a href="BudgetAllocation.php" <?php if($auth['BudgAlloc']==0){ ?> style="display:none" <?php } ?> >Project Management</a></li> 
	  <li id='l5' class="dropdown">
		<a href="#" <?php if($auth['Report']==0){ ?> style="display:none" <?php } ?> <?php if($auth['Report']==1){ ?> class="dropdown-toggle" <?php } ?>  data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
		<ul class="dropdown-menu">
            <li><a class="btn" href="budgetexport.php"><span class="glyphicon glyphicon-download-alt"></span>Budget Report</a></li>
            <li><a class="btn" href="ReqReport.php"><span class="glyphicon glyphicon-download-alt"></span>Requisition Report</a></li>
		 </ul>
		</li> 
      </ul>
	  <ul class="nav navbar-nav navbar-right">
	  <li id='l6'><a href="addUser.php" <?php if($auth['Setup']==0){ ?> style="display:none" <?php } ?> >Organization</a></li>
	  </ul>
	  
  </div>
</nav>