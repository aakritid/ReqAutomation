<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Purchase Requisition</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script>
  
  /*$(document).ready(function(){
	  var trows= document.getElementById("vals");
	  <?php 
	    $cnt=1; ?>
	  for(var i=1;i<=trows; i++){
		   $('#itemDesc'+i).html( "<td><input type='text' name='itemNo"+i+"' class='form-control' readonly value='<?php echo json_encode($_SESSION['row'.$cnt][0])?>' /> </td><td><textarea name='item"+i+"'  rows='2' placeholder='Item Description' class='form-control'></textarea></td> <td><input type='text' name='quant"+i+"'  placeholder='Quantity' class='form-control'/></td>" +
    		  "<td><input type='text' name='unit"+i+"'  placeholder='Unit' class='form-control'/></td> <td><input type='text' name='unitPrice"+i+"'  placeholder='Unit Price' class='form-control'/></td>" +
    		  "<td><input type='text' id='total"+i+"' name='total"+i+"' class='form-control' readonly value='$' /></td> <td><p id='del"+i+"' class='delete' > <span class='glyphicon glyphicon-remove' title='Delete Row' style='cursor:pointer'></span></p></td>");

      $('#itemTable').append("<tr id='itemDesc"+(i+1)+"'></tr>");
	  }
  }*/
  </script>
  
</head>

<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     <!-- <a clss="navbar-brand" href="index.html"><img src="../Images/parilogo.PNG" alt="PARI"/></a> -->
     <a class="navbar-brand" href="#">PARI Purchase Requisition</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">New Requisition</a></li>
      <li><a href="#">Submitted Requisitions</a></li>
      <li><a href="#">Approve Requests</a></li> 
          </ul>
  </div>
</nav>
 <?php
	  session_start();
	$_SESSION["rows"]=$_POST["vals"];
	$i=0;
	$rs=$_POST["vals"];
	for($rows=0; $rows<=$rs; $rows++){
		$tabRow= array($_POST["itemNo".$rows],$_POST["item".$rows],$_POST["quant".$rows],$_POST["unit".$rows],$_POST["unitPrice".$rows],$_POST["total".$rows]);
		$_SESSION["row".$rows]=$tabRow;
	}
	$_SESSION["refQuote"]=$_POST{"refQuote"};
	//echo $_SESSION["row1"][1];
?>
      <div class="container">
      <div class="container " >
  			<div class="progress " align="right" >
    		<div class="progress-bar" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width:100%">
      				Step 3 of 3: Review & Submit
   			 </div>
 		 </div>
	</div>
	</div>
	<form action="submit.php" method="POST">
	<div class="container">
	<div class="container" id="initial" style="padding: 10px;">
	<div class="col-sm-4"><label for="requester">Requested By: AAKRITI DUBEY </label></div>
	 <div class="col-sm-4 pull-right"><label for="jobCode1">Job Code:</label><label id="jobCode1"><?php echo $_SESSION["JobCode"]?></label></div>
		</div>
	 <table class="table table-bordered" style="padding:10px">
			     <tbody>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="svendor1">Suggested Vendor:</label> 
			        <input type="text" class="form-control" id="svendor1" value ="<?php echo $_SESSION["suggvendor"]?>" readonly />
					</td>
			        <td class="col-sm-4"><label for="shipAddress1">Shipping Address:</label> 
			        <textarea class="form-control" rows="4" id="shipAddress1" readonly> <?php echo $_SESSION["shipAddr"]?> </textarea></td>
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
		 <tbody>
		 <thead>
		 <tr>
		 	<th class="col-sm-2 text-center"> Item # </th>
		 	<th class="col-sm-5 text-center"> Item Description (include note & quote number)</th>
		 	<th class="col-sm-1 text-center"> Quantity</th>
		 	<th class="col-sm-1 text-center"> Unit</th>
		 	<th class="col-sm-1 text-center">Unit Price</th>
		 	<th class="col-sm-2 text-center">Total</th>
		 	</tr>
		</thead>
		<tbody id="itemTable">
		
			<tr id="itemDesc0">
			
			
			<td>
				<input type="text" name='itemNo0'  placeholder='Item #' class="form-control" readonly value="<?php echo $_SESSION["row0"][0]?>"/>
			</td>
			<td>
				<textarea name='item0'  rows="2" placeholder='Item Description' class="form-control" readonly><?php echo $_SESSION["row0"][1]?></textarea>
			</td>
			<td>
				<input type="text" name='quant0'  placeholder='Quantity' class="form-control" readonly value="<?php echo $_SESSION["row0"][2]?>" />
			</td>
			<td>
				<input type="text" name='unit0'  placeholder='Unit' class="form-control" readonly value="<?php echo $_SESSION["row0"][3]?>" />
			</td>
			<td>
				<input type="text" name='unitPrice0'  placeholder='Price' class="form-control" readonly value="<?php echo $_SESSION["row0"][4]?>" />
			</td>
			<td>
				<input type="text" id="total0" name='total0' class="form-control" value="$" readonly value="<?php echo $_SESSION["row0"][5]?>" />
			</td>
					
			</tr>
			 
			<tr id="itemDesc1"></tr>
			<?php
				for($rows=1; $rows<=$rs; $rows++){
					
				}
				
			?>
			
		</tbody>
		</table>
			  <button class="btn btn-default pull-right" type="Submit">Submit</button> 
		</div>
		</form> 
		</div>
	 
</body>
</html>