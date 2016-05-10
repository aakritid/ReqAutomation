<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Approve Requests</title>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <style>
  .modal-dialog{
	  width: 1200px;
	  height: 800px;
	  overflow-y: initial !important;
	  
  }
  .modal-body{
    height: auto;
    overflow-y: auto;
	overflow-x: auto;
	}
	
	.table-hover>tbody>tr:hover>td, .table-hover>tbody>tr:hover>th {
  background-color: #EEE5DE;
 cursor:pointer;
}
  </style>
  </head>
  <script type="text/javascript">
function showData(str){
	var id=str.substring(3,str.length);
	id=parseInt(id);
	var reqno=document.getElementById('reqno'+id).innerHTML;
	 $.ajax({
		type: "POST",
		url: "getReq.php",
		cache: false,
		data:  {'reqno': reqno},
		success: function(html) {
			document.getElementById('datamodal').innerHTML=html;
			$("#myModal").modal();
		}
		});
		return false;
	
 	
}
  </script>
<body>
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
$records=$reqs['count(*)'];
		 
?>


<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">PARI Purchase Requisition</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="PurchaseRequisition.php">New Requisition</a></li>
      <li><a href="#">Submitted Requisitions</a></li>
      <li class="active"><a href="Approval.php">Approve Requests</a></li> 
	  <li ><a href="BudgetAllocation.php">Budget Allocation</a></li> 
          </ul>
  </div>
</nav>
<div id="myModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Requisition Details</h4>
      </div>
      <div class="modal-body" id='datamodal'>
        <p ></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<div class="container">

		<table class="table table-hover table-striped" style="padding:10px" >
		 <tbody>
		 <thead>
		 <tr>
		 	<th class="col-sm-2 text-center"> Requisition Number</th>
		 	<th class="col-sm-2 text-center"> Requester Name</th>
		 	<th class="col-sm-4 text-center"> Job Code</th>
		 	<th class="col-sm-2 text-center"> Total Cost</th>
		 	<th class="col-sm-2 text-center">Date Of Submission</th>
		 	 </tr>
		</thead>
			 
		<tbody id="reqTable">
		  <?php
		  $qry="select requistion.ReqNo,requester.Name, jobcode.JobCode, requistion.TotalCost, DATE_FORMAT(requistion.Date,'%d %b %Y %h:%i %p') from purdets INNER join requistion on requistion.Id=purdets.id INNER JOIN jobcode on purdets.JobCode=jobcode.JCId INNER join requester on purdets.ReqsId=requester.id where purdets.id not in (select ReqId from approval)";
			$result = $conn->query($qry);
			
		   for($reqs=1; $reqs<=$records; $reqs++){
			   $reqsi=$result->fetch_assoc();
		   ?>
			<tr class ="text-center" id="<?php echo 'req'.$reqs?>" data-toggle="modal" onclick="showData(this.id)" >
			<td>
				<p id="<?php echo 'reqno'.$reqs ?>"><?php echo $reqsi['ReqNo'] ?> </p>
			</td>
			<td>
				<p id="<?php echo 'reqnm'.$reqs ?>"><?php echo $reqsi['Name'] ?> </p>
			</td>
			<td>
				<p id="<?php echo 'jc'.$reqs ?>"><?php echo $reqsi['JobCode'] ?> </p>
			</td>
			<td>
				<p id="<?php echo 'tc'.$reqs ?>"><?php echo '$'.$reqsi['TotalCost'] ?> </p>
			</td>
			<td>
				<p id="<?php echo 'dt'.$reqs ?>"><?php echo $reqsi["DATE_FORMAT(requistion.Date,'%d %b %Y %h:%i %p')"] ?> </p>
			</td>
			</tr>
			<?php 
		   }
		   ?>
		 </tbody>
		 </table>
		
</div>

<?php
$conn->close();
?>
</body>
</head>
</html>