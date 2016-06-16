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
  
  <script>
  function submitData(){
	 
	  $.ajax({
		type: "POST",
		url: "submit.php",
		cache: false,
		success: function(html) {
			if(html==0){
				$('#resVal').addClass("alert-success");
			document.getElementById('resVal').innerHTML="<h4>Success!</h4>The Requisition submitted successfully!";
			}
			else{
				$('#resVal').addClass("alert-danger");
			document.getElementById('resVal').innerHTML="<h4>Failed!</h4>The Requisition failed to submit!";
			}
		}
		});
		 $('#resModal').modal('show'); 
		return false;

  }
  $(function () {
$('#resModal').on('hidden.bs.modal', function () {
	window.location="PurchaseRequisition.php";
});
});
  </script>
</head>

<body>

<div id="resModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Submit Requisition</h4>
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


 <?php
	  session_start();
	$_SESSION["rows"]=$_POST["vals"];
	$active=$_POST["vald"];
	$active = str_replace( ',', '', $active );
	$_SESSION["active"]=$active;
	$i=0;
	$rs=$_POST["vals"];
	for($rows=0; $rows<=$rs; $rows++){
		if($active[$rows]==1){
		$tabRow= array($_POST["itemNo".$rows],$_POST["item".$rows],$_POST["quant".$rows],$_POST["unit".$rows],$_POST["unitPrice".$rows],$_POST["total".$rows]);
		$_SESSION["row".$rows]=$tabRow;
		}
	}
	$_SESSION["refQuote"]=$_POST{"refQuote"};
	$_SESSION["totalCost"]= $_POST["totalCost1"];
	
	(include 'header.php');
?>
      <div class="container">
      <div class="container " >
  			<div class="progress " align="right" >
    		<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      				Step 3 of 3: Review & Submit
   			 </div>
 		 </div>
	</div>
	
	
	
	<div class="container">
	<!--
	Modal -->
		<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Submit</h4>
        </div>
        <div class="modal-body">
          <p id="subRes"></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
	<div class="container" id="initial" style="padding: 10px;">
	<div class="col-sm-4"><label for="requester">Requested By: <?php echo $_SESSION['ReqsName']?> </label></div>
	 <div class="col-sm-4 pull-right"><label for="jobCode1">Job Code:</label><label id="jobCode1"><?php echo $_SESSION["JobCode"]?></label></div>
		</div>
	 <table class="table table-bordered" style="padding:10px">
			     <tbody>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="svendor1">Suggested Vendor:</label> 
			        <input type="text" class="form-control" id="svendor1" value ="<?php echo $_SESSION["suggvendor"]?>" readonly />
					</td>
			        <td class="col-sm-4"><label for="shipAddress1">Shipping Address:</label> 
			        <textarea class="form-control" rows="5" id="shipAddress1" readonly> <?php echo $_SESSION["shipAddr"]?> </textarea></td>
			        <td class="col-sm-4"> <div class="checkbox">
					<?php
					 if($_SESSION["bugd"]==true){ 
					 ?>
					    <label class="checkbox-inline"><input type="checkbox" checked onclick="return false;" onkeydown="return false;"/>Budgeted</label>
					 <?php
					 }
					  else {
					?>
						<label class="checkbox-inline"><input type="checkbox" onclick="return false;" onkeydown="return false;"/>Budgeted</label>
					<?php
					  }
					  ?>
						</div> 
						
						<label for="bcs1">BCS#:</label><label id="bcs1"><?php echo $_SESSION["bcs"]?></label></td>
			      </tr>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="vendorAddress1">Address of Vendor:</label> 
			        <textarea class="form-control" rows="4" id="vendorAddress1" readonly ><?php echo $_SESSION["vendAddr"]?> </textarea></td>
			        <td class="col-sm-4"><label for="attn1">Attention:</label> 
			       <input type="text" class="form-control"  id="attn1" value ="<?php echo $_SESSION["attn"]?>" readonly /></td>
			        <td class="col-sm-4"> <div class="checkbox">
					<?php
					 if($_SESSION["nbug"]==true){ 
					 ?>
					    <label class="checkbox-inline"><input type="checkbox" checked onclick="return false;" onkeydown="return false;"/>Non-Budgeted</label>
					 <?php
					 }
					  else {
					?>
						<label class="checkbox-inline"><input type="checkbox" onclick="return false;" onkeydown="return false;"/>Non-Budgeted</label>
					<?php
					  }
					  ?>
						</div> 
						<label for="explain1">Explanation:</label> <input type="text" class="form-control" id="explain1" value="<?php echo $_SESSION["explain"]?>" readonly /></td>
			      </tr>
			      <tr>
			         <td class="col-sm-2"><label for="phoneNum1">Phone Number:</label> 
			        <input type="text" class="form-control" id="phoneNum1" value ="<?php echo $_SESSION["phoneNum"]?>" readonly /></td>
			        <td class="col-sm-2"><label for="faxNum1">Fax Number:</label> 
			        <input type="text" class="form-control" id="faxNum1" value ="<?php echo $_SESSION["faxNum"]?>" readonly /></td>
			        <td class="col-sm-4 form-control" >
                <label for="datepicker1">Date Needed:</label>
                    <input type="text" class="form-control" id="datepicker1" value ="<?php echo $_SESSION["daten"]?>" readonly /></td>
					 <td rowspan ="2" class="col-sm-4"> 
					  <div class="row-sm-2 radio">
					  <?php
					 if (isset($_SESSION["pind"]) && $_SESSION["pind"]){ 
					 ?>
					    <label><input type="radio" checked onclick="return false;" onkeydown="return false;"/>PARI India Scope</label>
						<label><input type="radio" onclick="return false;" onkeydown="return false;"/>PARI Inc Scope</label>
						<label><input type="radio" onclick="return false;" onkeydown="return false;"/>Other</label>
						  
						
					 <?php
					 }
					  else if (isset($_SESSION["pinc"]) && $_SESSION["pinc"]) {
					?>
					<label><input type="radio"  onclick="return false;" onkeydown="return false;"/>PARI India Scope</label>
			         <label><input type="radio" checked onclick="return false;" onkeydown="return false;"/>PARI Inc Scope</label>
					 <label><input type="radio"  onclick="return false;" onkeydown="return false;"/>Other</label>
						  
						
					 <?php
					 }
					  else {
						  ?>
						  <label><input type="radio"  onclick="return false;" onkeydown="return false;"/>PARI India Scope</label>
						  <label><input type="radio"  onclick="return false;" onkeydown="return false;"/>PARI Inc Scope</label>
						  <label><input type="radio" checked onclick="return false;" onkeydown="return false;"/>Other</label>
						  <input type="text" class="form-control" id="otherval1" value="<?php echo $_SESSION["otherval"]?>" readonly />
					<?php
					  }
					?>
						</div> 
						</td>
				</tr>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="email1">Email:</label> 
			        <input type="text" class="form-control" id="email1" value="<?php echo $_SESSION["email"]?>" readonly /></td>
			        <td class="col-sm-4"><label for="shipMethod1" >Shipping Method:</label> 
			       <input type="text" class="form-control" id="shipMethod1" value="<?php echo $_SESSION["shipMethod"]?>" readonly /></td>
			        
			      </tr>
			    </tbody>
			  </table>
			  <input type="text" id="vals" name="vals" hidden value="<?php echo $_POST["vals"] ?>" />
		<table class="table table-bordered" style="padding:10px" >
		 
		 <thead>
		 <tr>
		 	<th class="col-sm-2 text-center"> Item # </th>
		 	<th class="col-sm-4 text-center"> Item Description (include note & quote number)</th>
		 	<th class="col-sm-1 text-center"> Quantity</th>
		 	<th class="col-sm-2 text-center"> Unit Description</th>
		 	<th class="col-sm-1 text-center">Unit Price</th>
		 	<th class="col-sm-2 text-center">Total</th>
		 	</tr>
		</thead>
		<tbody id="itemTable">
		  <?php
		   $rs=$_POST["vals"];
			for($rows=0; $rows<=$rs; $rows++){
				if($active[$rows]==1){
		  ?>
			<tr id="<?php echo 'itemDesc'.$rows ?>">
						
			<td>
				<input type="text" placeholder='Item #' class="form-control" readonly value="<?php echo $_SESSION["row".$rows][0]?>"/>
			</td>
			<td>
				<textarea  rows="2" placeholder='Item Description' class="form-control" readonly><?php echo $_SESSION["row".$rows][1]?></textarea>
			</td>
			<td>
				<input type="text" name='quant0'  placeholder='Quantity' class="form-control" readonly value="<?php echo $_SESSION["row".$rows][2]?>" />
			</td>
			<td>
				<input type="text" name='unit0'  placeholder='Unit' class="form-control" readonly value="<?php echo $_SESSION["row".$rows][3]?>" />
			</td>
			<td>
				<input type="text" name='unitPrice0'  placeholder='Price' class="form-control" readonly value="<?php echo $_SESSION["row".$rows][4]?>" />
			</td>
			<td>
				<input type="text" id="total0" name='total0' class="form-control"  readonly value="<?php echo $_SESSION["row".$rows][5]?>" />
			</td>
					
			</tr>
			
			<?php
			}
			}				
			?>
			</tbody>
			</table>
			<div class="container">
			<div class="form-inline col-sm-8 pull-left"><label for="refQuote">Reference Quote:</label><input class="form-control" name="refQuote" type="text" id="refQuote" readonly value="<?php echo $_SESSION["refQuote"]?>" /></div>
			 <div class="col-sm-3 pull-right"><label id="totalCost">Total Cost:   $<?php echo $_SESSION["totalCost"]?></label></div>
			</div>
		
			  <button class="btn btn-default pull-right" onclick="submitData()">Submit</button> 
			
</div>
<?php
$conn->close();
?>
</div>
	 
</body>
</html>