<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Purchase Requisition</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
 </head>
  <script>
function budget(type,str){
	if(type=="get"){
	 $.ajax({
		type: "POST",
		url: "Budget.php",
		cache: false,
		data:  {'type': type, 'jc': str},
		success: function(html) {
			document.getElementById('contents').innerHTML=html;			
		}
		});
		return false;	
	}
	if(type=="set"){
		str=document.getElementById('ddown').value;
		var nb=document.getElementById('nbudg').value;
		$.ajax({
		type: "POST",
		url: "Budget.php",
		cache: false,
		data:  {'type': type, 'jc': str, 'newBudg': nb},
		success: function(html) {
			if(html==1){
				$('#resVal').addClass("alert-success");
			document.getElementById('resVal').innerHTML="<h4>Success!</h4>Budget Set Successfully!";
			}
			else{
				$('#resVal').addClass("alert-danger");
			document.getElementById('resVal').innerHTML="<h4>Error!</h4>Budget Set Failed.";
			}
		}
		});
		$('#resModal').modal();
		return false;	
	}
	
}
 $(function () {
$('#resModal').on('hidden.bs.modal', function () {
	window.location="BudgetAllocation.php";
});
});
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

?>

<div id="resModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Result</h4>
      </div>
      <div class="modal-body" id='datamodal'>
        <p class="" id="resVal"></p>
      </div>
      <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">PARI Purchase Requisition</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="PurchaseRequisition.php">New Requisition</a></li>
      <li><a href="#">Submitted Requisitions</a></li>
      <li><a href="Approval.php">Approve Requests</a></li> 
	  <li class="active"><a href="BudgetAllocation.php">Budget Allocation</a></li> 
          </ul>
  </div>
</nav>

<div class="container">
		<table class="col-lg-8 table table-sm table-bordered" style="padding:10px" >
		
		 <thead>
		 <tr>
		 	<th class="text-center"> SET BUDGET </th>
		 </tr>
		 </thead>
		 <tbody >
			<tr><td>
					<div class='container text-center'>
					<label class="control-label " for="ddown">Job Code:<span class="reqd">*</span></label>
					<div id="jobCodeDiv" class=" form-inline selectContainer">
						<select class="form-control" name="JobCode" id="ddown" onchange="budget('get',this.value)">
							<option value="">Job Code</option>
							<?php
								$query="SELECT jobcode FROM jobcode";
								$result = $conn->query($query);
								while ($row = $result->fetch_assoc()) {
									echo "<option value='" . $row['jobcode'] . "'>" . $row['jobcode'] . "</option>";
								}
							?>						
						</select>
					</div>
					</div>
			</td></tr>
			<tr><td>
				<div class="container" id="contents">
		
				</div>
			</td></tr>
			<tr><td>
				<button class="btn btn-default pull-right" onclick="budget('set','')">Set</button>
			</td></tr>
		</tbody>
	</table>
		
		
</div>
<?php
$conn->close();
?>
</body>
</head>
</html>
		
