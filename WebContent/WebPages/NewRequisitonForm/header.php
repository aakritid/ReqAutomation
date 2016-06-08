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

$qry="select Type from users where LoginId= '".$_SERVER['PHP_AUTH_USER']."'";
$result = $conn->query($qry);
$user=$result->fetch_assoc();

$qry1="Select * from usertypes where id=".$user['Type'];
$result = $conn->query($qry1);
$auth=$result->fetch_assoc();
		
$qry="select count(*) from requistion where requistion.Id not in (select ReqId from approval) AND requistion.TotalCost<=".$auth['CostLevel'];
$result = $conn->query($qry);
$reqs=$result->fetch_assoc();
$unapproved=$reqs['count(*)'];

?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">PARI Purchase Requisition</a>
    </div>
    <ul class="nav navbar-nav">
      <li id='l1' class="active"><a href="PurchaseRequisition.php">New Requisition</a></li>
      <li id='l2'><a href="ViewSubmissions.php">Submitted Requisitions</a></li>
      <li id='l3'><a href="Approval.php" <?php if($auth['Approval']==0){ ?> class='btn disabled' <?php } ?>>Approve Requests  <?php if($unapproved>0){ ?><span class="badge"><?php echo $unapproved; ?></span> <?php } ?></a></li> 
	  <li id='l4'><a href="BudgetAllocation.php" <?php if($auth['BudgAlloc']==0){ ?> class='btn disabled' <?php } ?> >Budget Allocation</a></li> 
	  <li id='l5' class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Reports <span class="caret"></span></a>
		<ul class="dropdown-menu">
            <li><a class="btn" href="budgetexport.php"><span class="glyphicon glyphicon-download-alt"></span>Budget Report</a></li>
            <li><a class="btn" href="ReqReport.php"><span class="glyphicon glyphicon-download-alt"></span>Requisition Report</a></li>
		 </ul>
		</li> 
      </ul>
  </div>
</nav>