<?php
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
			 if ($auth['BudgAlloc']==0){
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
 </head>
  <script>
  function numVal(){
	 if(!((event.charCode >= 48 && event.charCode <= 57) || (event.charCode==46)))
	 {
		 alert("Please enter numeric value");
		 return false;
	 }
	 return true;
 }
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
		var pm=document.getElementById('npm').value;
		$.ajax({
		type: "POST",
		url: "Budget.php",
		cache: false,
		data:  {'type': type, 'jc': str, 'newBudg': nb, 'newPm':pm},
		success: function(html) {
			if(html==11 || html==1){
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
	 $("#l1").removeClass("active");
	$("#l4").addClass("active");
	
$('#resModal').on('hidden.bs.modal', function () {
	window.location="BudgetAllocation.php";
});
});
  </script>
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
								$query="SELECT jobcode FROM jobcode order by jobcode ASC";
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
		
