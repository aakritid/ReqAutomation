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
  function isJson(string) {
 json_decode(string);
 return (json_last_error() == JSON_ERROR_NONE);
}
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
	});
	  
$('#resModal').on('hidden.bs.modal', function () {
	window.location="updateUser.php";
});
});
  function getUser(id){
	$.ajax({
		type: "POST",
		url: "users.php",
		cache: false,
		data:  {'type': "get", 'id': id},
		datatype: "json",
		success: function(response, textStatus, jqXHR) {
			document.getElementById("fname").value=response.FName;
			document.getElementById("lname").value=response.LName;
			document.getElementById("lid").value=response.LoginId;
			document.getElementById("pwd").value=response.Password;
			document.getElementById("eid").value=response.Email;
			$('#cprow').css("display","none");
			$('#etype').val(response.Type);
			$('#disp').css("display","block");
		}
		
	}); 
	return false;	
	
	
	}
function chpwd(){
	  $('#cprow').css("display","block");
  }
function saveDet(){
	var id=document.getElementById("ddown").value;
	var fn=document.getElementById("fname").value;
	var ln=	document.getElementById("lname").value;
	var lid=document.getElementById("lid").value;
	var pwd=document.getElementById("pwd").value;
	var eid=document.getElementById("eid").value;
	var typ=document.getElementById("etype").value;
	$.ajax({
		type: "POST",
		url: "users.php",
		cache: false,
		data:  {'type': "set", 'fnm': fn, 'lnm': ln, 'lid':lid, 'pwd': pwd, 'email': eid, 'auth': typ, 'id': id},
		success: function(response) {
			if(response==1){
				$('#resVal').addClass("alert-success");
				document.getElementById('resVal').innerHTML="<h4>Success!</h4>Changes Saved!";
				$("#resModal").modal();
			}
			else{
				$('#resVal').addClass("alert-danger");				
				document.getElementById('resVal').innerHTML="<h4>Error!</h4>Failed To Save Changes.";
				$("#resModal").modal();
			}
		}
		
	}); 
	return false;	
	
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
    <li class="active"><a href="updateUser.php">Update User Details</a></li>
    <li ><a href="#">Manage User Types</a></li>
  </ul>
	</div>
	
	<div class='row container' style="padding-top:20px;">
					<label class="control-label col-sm-1" for="ddown">User:<span class="reqd">*</span></label>
					<div id="jobCodeDiv" class="pull-left form-inline selectContainer">
						<select class="form-control" name="JobCode" id="ddown" onchange="getUser(this.value)">
							<option value="">Select User</option>
							<?php
								$query="SELECT * FROM users order by `First Name` ASC";
								$result = $conn->query($query);
								while ($row = $result->fetch_assoc()) {
									echo "<option value='" . $row['id'] . "'>" . $row['First Name']." ".$row['Last Name'] . "</option>";
								}
							?>						
						</select>
	</div>
	</div>
	<form>
	<div id="disp" class="container" style="padding-top:20px; display:none;">
	<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="fname">First Name:<span class="reqd">*</span> </label><input id="fname" type="text" class="form-control required" placeholder="First Name" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="lname">Last Name:<span class="reqd">*</span> </label><input id="lname" class="form-control required" placeholder="Last Name" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="lid">LoginId :<span class="reqd">*</span> </label><input id="lid" type="text" class="form-control required" placeholder="Login Id" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="pwd">Password :<span class="reqd">*</span> </label><input id="pwd" type="password" class="form-control required" placeholder="Password" onchange="chpwd()"/> </div>
		</div>
		<div id="cprow" class="row" style="display:none;">
		<div class="col-md-10 form-group"> <label class="" for="cpwd">Confirm Password :<span class="reqd">*</span> </label><input id="cpwd" type="password" class="cpwd form-control required" placeholder="Confirm Password" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="eid">Email Id :<span class="reqd">*</span> </label><input id="eid" type="email" class="form-control required" placeholder="Email Id" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="etyp">Authority Level:<span class="reqd">*</span> </label>
		<div  class="form-inline selectContainer">
						<select id="etype" class="form-control required">
							
							<?php
							$query="SELECT * from usertypes";
							$result = $conn->query($query);
							while ($row = $result->fetch_assoc()) {
								
								echo "<option value='" . $row['id'] . "'>" . $row['Type'] . "</option>";
					}
					?>
						</select>
					</div></div>
		</div>
		<div class="row">
		<button type="Submit" class="btn btn-info  col-md-10" onclick="return saveDet();">Save Changes</button>
		<button type="Submit" class="btn  col-md-10" onclick="">Delete User</button>
	</div>
	</div>
	
	</form>
</div>
<?php
$conn->close();
?>
</body>
</html>