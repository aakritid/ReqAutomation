<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

if (!isset($_SERVER['PHP_AUTH_USER'])) {
        header("WWW-Authenticate: Basic realm=\"Private Area\"");
        header("HTTP/1.0 401 Unauthorized");
        print "Sorry - you need valid credentials to be granted access!\n";
        exit;
} else {
		$qry="select * from users where LoginId= '".$_SERVER['PHP_AUTH_USER']."'";
		$result = $conn->query($qry);
		$user=$result->fetch_assoc();
        if ($result->num_rows==0 || ($_SERVER['PHP_AUTH_PW'] != $user['LoginPwd'])) {
           header("WWW-Authenticate: Basic realm=\"Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            print "You Are not authorized to view the page!";
            exit;						
        }
		else {
			$qry1="Select * from usertypes where id=".$user['Type'];
			$result = $conn->query($qry1);
			$auth=$result->fetch_assoc();
			 if ($auth['Setup']==0){
				 header("WWW-Authenticate: Basic realm=\"Private Area\"");
				header("HTTP/1.0 401 Unauthorized");
				print "You Are not authorized to view the page!";
				exit;
			 }
		}
}
 $conn->close();
 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Purchase Requisition</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
   <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
   <style>
  .error{
	  color:red;
  }
  </style>
  <script>

  $(function () {
	 $("#l1").removeClass("active");
	$("#l6").addClass("active");
	$('form.userForm').on('submit', function(event) {
		$('.required').each(function() {
        $(this).rules("add", 
        {
            required: true
        })
      });  
	  $('.number').each(function() {
        $(this).rules("add", 
        {
            number: true
        })
      });  
	});
	  
$('#resModal').on('hidden.bs.modal', function () {
	window.location="createTypes.php";
});
});

function saveDet(){
	 $('form.userForm').validate();
	
	if($('form.userForm').valid()){
	var typ=document.getElementById("tname").value;
	var jc=	document.getElementById("jcreate").value;
	var app=document.getElementById("appr").value;
	var mp=document.getElementById("mprj").value;
	var vr=document.getElementById("vrep").value;
	var or=document.getElementById("org").value;
	var req=document.getElementById("req").value;
	var cost=document.getElementById("costl").value;
	$.ajax({
		type: "POST",
		url: "users.php",
		cache: false,
		data:  {'type': "addTypes", 'utype': typ, 'jcreate': jc, 'approve':app, 'manage': mp, 'report': vr, 'organize': or, 'req':req, 'cost':cost},
		success: function(response) {
			if(response==1){
				$('#resVal').addClass("alert-success");
				document.getElementById('resVal').innerHTML="<h4>Success!</h4>User Type Added!";
				$("#resModal").modal();
			}
			else{
				$('#resVal').addClass("alert-danger");				
				document.getElementById('resVal').innerHTML="<h4>Error!</h4>Failed To Add.";
				$("#resModal").modal();
			}
		}
		
	}); 
	return false;	
	}
	
}

function apprights(){
	if(document.getElementById("appr").value==1)
		$("#costl").addClass("required number");
	else
		$("#costl").removeClass("required number");
}	
  
  </script>
 </head>
 <body>
  <?php
(include 'header.php');

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
<div class="container">
	<div>
  <h3>Organization Setup</h3>
  <ul class="nav nav-tabs">
    <li ><a href="addUser.php">Add New User</a></li>
    <li ><a href="updateUser.php">Update User Details</a></li>
	<li class="active"><a href="createTypes.php">Add User Type</a></li>
    <li ><a href="manageTypes.php">Manage User Types</a></li>
  </ul>
	</div>

	<form class="userForm">
	<div class="row"  style="padding-top:20px;">
		<div class="col-md-10 form-group"> <label class="" for="tname">Type Name:<span class="reqd">*</span> </label><input id="tname" name="tname" type="text" class="form-control required" placeholder="Type Name" /> </div>
	</div>
	<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="lname">Create New Job Code:<span class="reqd">*</span> </label>
			<div  class="form-inline selectContainer">
						<select id="jcreate" class="form-control required">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="appr">Approval Rights :<span class="reqd">*</span> </label>
		<div  class="form-inline selectContainer">
						<select id="appr" class="form-control required" onchange="apprights();">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
			</div>
	</div>
	</div>
	<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="mprj">Manage Projects :<span class="reqd">*</span> </label>
			<div  class="form-inline selectContainer">
							<select id="mprj" class="form-control required">
								<option value="0">No</option>
								<option value="1">Yes</option>
							</select>
			</div>
		</div>
	</div>
	<div id="cprow" class="row" style="display:none;">
		<div class="col-md-10 form-group"> <label class="" for="vrep">View Reports :<span class="reqd">*</span></label>
			<div  class="form-inline selectContainer">
						<select id="vrep" class="form-control required">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="org">Organization Setup :<span class="reqd">*</span> </label>
			<div  class="form-inline selectContainer">
						<select id="org" class="form-control required">
							<option value="0">No</option>
							<option value="1">Yes</option>
						</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="req">Create/View Requisitions:<span class="reqd">*</span> </label>
			<div  class="form-inline selectContainer">
				<select id="req" class="form-control required">
					<option value="0">No</option>
					<option value="1">Yes</option>		
				</select>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="costl">Approval Cost Limit($) :<span class="reqd">*</span> </label><input id="costl" name="costl" type="text" class="form-control " placeholder="Cost Level" /> </div>
	</div>
		<div class="row">
		<button type="Submit" class="btn btn-info  col-md-10" onclick="return saveDet();">Add Type</button>
		
	</div>
	
	
	</form>
</div>
<?php
$conn->close();
?>
</body>
</html>	