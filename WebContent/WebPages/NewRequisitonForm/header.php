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

$qry="select count(*) from requistion where requistion.Id not in (select ReqId from approval)";
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
      <li id='l3'><a href="Approval.php">Approve Requests  <span class="badge"><?php echo $unapproved; ?></span></a></li> 
	  <li id='l4'><a href="BudgetAllocation.php">Budget Allocation</a></li> 
	  <li id='l5'><a href="View.php">View All Requisitions</a></li> 
          </ul>
  </div>
</nav>