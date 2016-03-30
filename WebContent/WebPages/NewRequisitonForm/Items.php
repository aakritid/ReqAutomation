
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
  $(document).ready(function(){
      var i=1;
     $("#addItem").click(function(){
      $('#itemDesc'+i).html( "<td><input type='text' name='itemNo"+i+"'  placeholder='Item #' class='form-control'/> </td><td><textarea name='item"+i+"'  rows='2' placeholder='Item Description' class='form-control'></textarea></td> <td><input type='text' name='quant"+i+"'  placeholder='Quantity' class='form-control'/></td>" +
    		  "<td><input type='text' name='unit"+i+"'  placeholder='Unit' class='form-control'/></td> <td><input type='text' name='unitPrice"+i+"'  placeholder='Unit Price' class='form-control'/></td>" +
    		  "<td><label id='total"+i+"' class='form-control'>$</label></td> <td><p id='del"+i+"' class='delete' > <span class='glyphicon glyphicon-remove' title='Delete Row' style='cursor:pointer'></span></p></td>");

      $('#itemTable').append("<tr id='itemDesc"+(i+1)+"'></tr>");
      i++; 
  });
     
     $(".delete").click(function(){
    	var id=$(this).attr('id').charAt(3);
    	$('#itemDesc'+id).html('');
	 });
  });
  </script>
  </head>
 
<body>
<?php
session_start();

$_SESSION["suggvendor"]=$_POST["suggvendor"];
$_SESSION["JobCode"]=$_POST["JobCode"];
$_SESSION["shipAddr"]=$_POST["shipAddr"];
$_SESSION["bcs"]=$_POST["bcs"];
$_SESSION["vendAddr"]=$_POST["vendAddr"];
$_SESSION["attn"]=$_POST["attn"];
$_SESSION["explain"]=$_POST["explain"];
$_SESSION["phoneNum"]=$_POST["phoneNum"];
$_SESSION["faxNum"]=$_POST["faxNum"];
$_SESSION["daten"]=$_POST["daten"];
$_SESSION["email"]=$_POST["email"];
$_SESSION["shipMethod"]=$_POST["shipMethod"];

if(isset($_POST["bugd"])){
	$_SESSION["bugd"]=true;
}
else
	$_SESSION["bugd"]=false;

if(isset($_POST["nbug"])){
	$_SESSION["nbug"]=true;
}
else
	$_SESSION["nbug"]=false;

if(isset($_POST["pind"])){
	$_SESSION["pind"]=true;
	$_SESSION["pinc"]=false;
	$_SESSION["other"]=false;
}
else if(isset($_POST["pinc"])){
	$_SESSION["pinc"]=true;
	$_SESSION["pind"]=false;
	$_SESSION["other"]=false;
}	
else if(isset($_POST["other"])){
	$_SESSION["other"]=true;
	$_SESSION["otherval"]=$_POST["otherval"];
	$_SESSION["pind"]=false;
	$_SESSION["pinc"]=false;

}


?>
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

      <div class="container">
      <div class="container " >
  			<div class="progress " align="right" >
    		<div class="progress-bar" role="progressbar" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100" style="width:66%">
      				Step 2 of 3: Item Details
   			 </div>
 		 </div>
	</div>
	<div class="container">
      <div class="container" id="initial" style="padding-below: 3px;">
      <div class="col-sm-4"><label for="jobCode1">Job Code:</label><label id="jobCode1"">US13004 - Tigershark MECR's</label></div>
      <div class=" pull-right"><label for="remBudget">Remaining Budget:</label><label id="remBudget">$3,000</label></div>
	  <form action="ReviewSubmit.php" method="post" role="form">
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
		 	<th class=" text-center"></th>
		 </tr>
		</thead>
		<tbody id="itemTable">
		
			<tr id="itemDesc0">
			
			<td>
				<input type="text" name='itemNo0'  placeholder='Item #' class="form-control"/>
			</td>
			<td>
				<textarea name='item0'  rows="2" placeholder='Item Description' class="form-control"></textarea>
			</td>
			<td>
				<input type="text" name='quant0'  placeholder='Quantity' class="form-control"/>
			</td>
			<td>
				<input type="text" name='unit0'  placeholder='Unit' class="form-control"/>
			</td>
			<td>
				<input type="text" name='unitPrice0'  placeholder='Price' class="form-control"/>
			</td>
			<td>
				<label id="total0" class="form-control">$</label>
			</td>
			<td>
			<p id='del0'  class="delete"><span class="glyphicon glyphicon-remove" title="Delete Row" style='cursor:pointer' ></span></p>
			</td>			
			</tr>
			 
			<tr id="itemDesc1"></tr>
		</tbody>
		</table>
		<div class="form-inline container"><a id="addItem" class="btn btn-default pull-left">Add Item</a>
		</div>
		<div class="form-inline col-sm-8 pull-left"><label for="refQuote">Reference Quote:</label><input class="form-control" type="text" placeholder="Reference Quote" id="refQuote"/></div>
			 <div class="col-sm-3 pull-right"><label for="totalCost">Total Cost: $</label><label id="totalCost"></label></div>
			 </div>
		<div>
		<button class="btn btn-default pull-right" type="Submit">Next</button>
			  </div>
			</form>
			  </div>
			  </div>
			  
		
		
</body>
</html>