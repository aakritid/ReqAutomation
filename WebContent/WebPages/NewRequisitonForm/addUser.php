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
 $_SESSION['ReqsName']=$user['First Name']." ".$user['Last Name'];
 $_SESSION['ReqstId']=$user['id'];
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
  jQuery.validator.addMethod( 'passwordMatch', function(value, element) {
    
    var password = $("#pwd").val();
    var confirmPassword = $("#cpwd").val();

    if (password != confirmPassword ) {
        return false;
    } else {
        return true;
    }

}, "Your Passwords Must Match");
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
	  $('#eid').rules("add",
		{
			email: true
		});	
		$('.cpwd').rules("add",
		{
			passwordMatch: true
		});	
		$("#cpwd").rules("messages",
				 {
                      passwordMatch: "Your Passwords Must Match"
				 });

		if($('form.userForm').valid()){
			var pwd=document.getElementById("pwd").value;
			var fnm=document.getElementById("fname").value;
			var lnm=document.getElementById("lname").value;
			var lid=document.getElementById("lid").value;
			var email=document.getElementById("eid").value;
			var auth=document.getElementById("etype").value;
				$.ajax({
				type: "POST",
				url: "users.php",
				cache: false,
				data:  {'type': "add", 'fnm': fnm, 'lnm': lnm, 'lid':lid, 'pwd': pwd, 'email': email, 'auth': auth},
				success: function(html) {
					if(html==1){
						$('#resVal').addClass("alert-success");
						document.getElementById('resVal').innerHTML="<h4>Success!</h4>New User Added Successfully!";
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
	});
	  
$('#resModal').on('hidden.bs.modal', function () {
	window.location="addUser.php";
});
});
  function addUser(){
	  $('form.userForm').validate();
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
    <li class="active"><a href="addUser.php">Add New User</a></li>
    <li><a href="updateUser.php">Update User Details</a></li>
	<li ><a href="createTypes.php">Add User Type</a></li>
    <li ><a href="manageTypes.php">Manage User Types</a></li>
  </ul>
	</div>

<form class="userForm" method="post" >
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="fname">First Name:<span class="reqd">*</span> </label><input id="fname" name="fname" type="text" class="form-control required" placeholder="First Name" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="lname">Last Name:<span class="reqd">*</span> </label><input id="lname" name="lname" class="form-control required" placeholder="Last Name" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="lid">LoginId :<span class="reqd">*</span> </label><input id="lid" name="lid" type="text" class="form-control required" placeholder="Login Id" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="pwd">Password :<span class="reqd">*</span> </label><input id="pwd" name="pwd" type="password" class="form-control required" placeholder="Password"/> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="cpwd">Confirm Password :<span class="reqd">*</span> </label><input id="cpwd" name="cpwd" type="password" class="cpwd form-control required" placeholder="Confirm Password" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="eid">Email Id :<span class="reqd">*</span> </label><input id="eid" type="email" name="email" class="form-control required" placeholder="Email Id" /> </div>
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
		<button type="Submit" class="btn btn-info  col-md-10" onclick="return addUser();">Add User</button>
		</div>
</form>
</div>
</body>
</html>