
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
  <style>
  .reqd{
	  color:red;
	  font-size:125%;
  }
  .error{
	  color:red;
  }
  </style>
  <script>
   var i=0, err=0;
  $(document).ready(function(){
     
     $("#addItem").click(function(){
		 i++; 
      $('#itemDesc'+i).html( "<td><input type='text' name='itemNo"+i+"'  placeholder='Item #' class='form-control'/> </td><td><textarea name='item"+i+"'  rows='2' placeholder='Item Description' class='form-control'></textarea></td> <td><input type='text' name='quant"+i+"' id='quant"+i+"' placeholder='Quantity' class='form-control' onchange='totalCalc()' onkeypress='return numVal() '/></td>" +
    		  "<td><input type='text' name='unit"+i+"'  placeholder='Unit Desc' class='form-control'/></td> <td><input type='text' name='unitPrice"+i+"' id='unitPrice"+i+"' placeholder='Price' class='form-control' onchange='totalCalc()' onkeypress='return numVal()'/></td>" +
    		  "<td><input type='text' id='total"+i+"' name='total"+i+"' class='form-control' readonly value='$0' /></td> <td><p id='del"+i+"' class='delete' > <span class='glyphicon glyphicon-remove' title='Delete Row' style='cursor:pointer'></span></p></td>");

      $('#itemTable').append("<tr id='itemDesc"+(i+1)+"'></tr>");
      document.getElementById("vals").value=i;
	  
  });
     
     $(".delete").click(function(){
    	var id=$(this).attr('id').charAt(3);
    	$('#itemDesc'+id).html('');
	 });
	 	 
  });
  function totalCalc(){
	  var x = document.getElementById("quant"+i).value;
	var y = document.getElementById("unitPrice"+i).value;
	var calc=x*y;
	calc= parseFloat(calc);
    document.getElementById("total"+i).value = "$" + calc.toFixed(2);
	
	if(x*y!=0){
	var tot=0;
	 for(var ct=0;ct<=i;ct++){
		 var value=document.getElementById("total"+ct).value;
		 value= value.substring(1,value.length);
		 value=Number(value);
		 tot=tot+value;
	 }
	 tot=parseFloat(tot).toFixed(2);
	 document.getElementById('totalCost').innerHTML=tot;
	 document.getElementById('tc1').value=tot;
	 var budg= document.getElementById('remBudget').innerHTML;
	 budg= budg.substring(1,budg.length);
	 budg=Number(budg);
	 if(tot> budg){
		 //alert('error');
		 err=1;
		 $("#totalCost").addClass("error");
	 }
	 else{
		 err=0;
		 $("#totalCost").removeClass("error");
	 }
	}
}
 function numVal(){
	 if(!((event.charCode >= 48 && event.charCode <= 57) || (event.charCode==46)))
	 {
		 alert("Please enter numeric value");
		 return false;
	 }
	 return true;
 }
 function validate(){
	 if(err==1){
		 alert("The total cost for the requisition is exceeding the allocated budget for the Job Code.");
		 return false;
	 }
 }
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
	$_SESSION["budgeted"]=0;
}
else
	$_SESSION["bugd"]=false;

if(isset($_POST["nbug"])){
	$_SESSION["nbug"]=true;
	$_SESSION["budgeted"]=1;
}
else
	$_SESSION["nbug"]=false;

if(isset($_POST["scope"])){
	 $selection= $_POST["scope"];
	if($selection=="pind"){	 
		$_SESSION["pind"]=true;
		$_SESSION["pinc"]=false;
		$_SESSION["other"]=false;
		$_SESSION["otherval"]=$_POST["otherval"];
		$_SESSION["scope"]=0;
	}
	else if($selection=="pinc"){
		$_SESSION["pinc"]=true;
		$_SESSION["pind"]=false;
		$_SESSION["other"]=false;
		$_SESSION["otherval"]=$_POST["otherval"];
		$_SESSION["scope"]=1;
		}	
	else {
		$_SESSION["other"]=true;
		$_SESSION["otherval"]=$_POST["otherval"];
		$_SESSION["pind"]=false;
		$_SESSION["pinc"]=false;
		$_SESSION["scope"]=2;
	}
}


$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

?>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
     <!-- <a clss="navbar-brand" href="index.html"><img src="../Images/parilogo.PNG" alt="PARI"/></a> -->
     <a class="navbar-brand" href="#">PARI Purchase Requisition</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="PurchaseRequisition.php">New Requisition</a></li>
      <li><a href="ViewSubmissions.php">Submitted Requisitions</a></li>
      <li><a href="Approval.php">Approve Requests</a></li> 
	  <li><a href="BudgetAllocation.php">Budget Allocation</a></li> 
	  <li><a href="View.php">View All Requisitions</a></li> 
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
      <div class="col-sm-4"><label for="jobCode1">Job Code:</label><label id="jobCode1"><?php echo $_POST["JobCode"]?></label></div>
      <div class=" pull-right"><label for="remBudget">Remaining Budget: $</label><label id="remBudget">
	  <?php $query="SELECT Budget FROM `jobcode` WHERE JobCode='".$_POST["JobCode"]."'";
			$result = $conn->query($query);
			$budg=$result->fetch_assoc();
			$_SESSION['budget']=$budg['Budget'];
			echo $budg['Budget'];
	?>
	</label></div>
	  <form action="ReviewSubmit.php" method="post" role="form">
      <table class="table table-bordered" style="padding:10px" >
		 <tbody>
		 <thead>
		 <tr>
		 	<th class="col-sm-2 text-center"> Item # <span class="reqd">*</span></th>
		 	<th class="col-sm-4 text-center"> Item Description (include note & quote number)<span class="reqd">*</span></th>
		 	<th class="col-sm-1 text-center"> Quantity<span class="reqd">*</span></th>
		 	<th class="col-sm-2 text-center"> Unit Description<span class="reqd">*</span></th>
		 	<th class="col-sm-1 text-center">Unit Price ($)<span class="reqd">*</span></th>
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
				<input type="text" name='quant0'  placeholder='Quantity' id="quant0" class="form-control" onchange="totalCalc()" onkeypress='return numVal()'/>
			</td>
			<td>
				<input type="text" name='unit0'  placeholder='Unit Desc' class="form-control"/>
			</td>
			<td>
				<input type="text" name='unitPrice0'  placeholder='Price' id="unitPrice0" class="form-control" onchange="totalCalc()" onkeypress='return numVal()'/>
			</td>
			<td>
				<input type="text" id="total0" name='total0' class="form-control" value="$0" readonly onchange="sumTot()" />
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
		<div class="form-inline col-sm-8 pull-left"><label for="refQuote">Reference Quote:<span class="reqd">*</span></label><input class="form-control" name="refQuote" type="text" placeholder="Reference Quote" id="refQuote"/></div>
			 <div class="col-sm-3 pull-right"><label for="totalCost" id='tcval'>Total Cost: $</label><label id="totalCost">0</label></div>
			 <input type="text" name="totalCost1" id="tc1" hidden />
			 </div>
		<div><input type="text" id="vals" name="vals" hidden value="0" />
		<button class="btn btn-default pull-right" type="Submit" onclick="return validate();">Next</button>
			  </div>
			</form>
			  </div>
			  </div>
			<?php
				$conn->close();
			?>
			  
		
		
</body>
</html>