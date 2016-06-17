<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Purchase Requisition</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.7/jquery.validate.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
  
<style>
  .error{
	  color:red;
  }
  </style>
  <script>
   var i=0, err=0, cnt=0;
   var rows=[];
  $(document).ready(function(){
	  
	  var id=0; var exist=document.getElementById("valid").value; i=exist; cnt=exist;
	  	for(id=0;id<exist;id++){
			rows[id]=1;
		}
	  for(id=exist;id<20;id++){
		  rows[id]=0;
	  }
     document.getElementById("valid").value=rows;
	 
	  if(parseFloat(document.getElementById("remBudget").innerHTML) < parseFloat(document.getElementById("totalCost").innerHTML)){
		  $("#totalCost").addClass("error");
		  err=1;
	  }
	
     $("#addItem").click(function(){
	$('#itemTable').append("<tr id='itemDesc"+(i)+"'></tr>");
      $('#itemDesc'+i).html( "<td><input type='text' name='itemNo"+i+"'  placeholder='Item #' class='form-control required'/> </td><td><textarea name='item"+i+"'  rows='2' placeholder='Item Description' class='form-control required'></textarea></td> <td><input type='text' name='quant"+i+"' id='quant"+i+"' placeholder='Quantity' class='form-control required digits' onchange='totalCalc()' /></td>" +
    		  "<td><input type='text' name='unit"+i+"'  placeholder='Unit Desc' class='form-control required'/></td> <td><input type='text' name='unitPrice"+i+"' id='unitPrice"+i+"' placeholder='Price' class='form-control required numb' onchange='totalCalc()' /></td>" +
    		  "<td><input type='text' id='total"+i+"' name='total"+i+"' class='form-control' readonly value='$0' /></td> <td><p id='del"+i+"' class='delete' onclick='deleteRow(this.id)'> <span class='glyphicon glyphicon-remove' title='Delete Row' style='cursor:pointer'></span></p></td>");

       document.getElementById("vals").value=i;
	  rows[i]=1;i++;
	  cnt++;
	  document.getElementById("valid").value=rows;
	   
	   
  });
   
    $('form.itemForm').on('submit', function(event) {

            $('input.required').each(function() {
                $(this).rules("add", 
                    {
                        required: true
                    })
            });  
			$('input.digits').each(function() {
                $(this).rules("add", 
                    {
                        digits: true
                    })
            });
			 $('input.numb').each(function() {
                $(this).rules("add", 
                    {
                        number: true
                    })
            });  	
        });
  });
  function deleteRow(str){
	  if(cnt>1){
		  var id=str.charAt(3);
			$('#itemDesc'+id).html('');
			cnt--;
			rows[id]=0;
			 document.getElementById("valid").value=rows;
			var tot=0;
			 for(var ct=0;ct<i;ct++){
				 if(rows[ct]==1){
				 var value=document.getElementById("total"+ct).value;
				 value= value.substring(1,value.length);
				 value=Number(value);
				 tot=tot+value;
				 }
			 }
			 tot=parseFloat(tot).toFixed(2);
			 document.getElementById('totalCost').innerHTML=tot;
			 document.getElementById('tc1').value=tot;
			 var budg= document.getElementById('remBudget').innerHTML;
			 budg= budg.substring(1,budg.length);
			 budg=Number(budg);
			 if(tot> budg){
				  err=1;
				 $("#totalCost").addClass("error");
			 }
			 else{
				 err=0;
				 $("#totalCost").removeClass("error");
			 }
			
	  }
  }
  function totalCalc(){
	  var rw=i-1;
	  var x = document.getElementById("quant"+rw).value;
	var y = document.getElementById("unitPrice"+rw).value;
	var calc=x*y;
	calc= parseFloat(calc);
    document.getElementById("total"+rw).value = "$" + calc.toFixed(2);
	
	if(x*y!=0){
	var tot=0;
	 for(var ct=0;ct<i;ct++){
		 if(rows[ct]==1){
		 var value=document.getElementById("total"+ct).value;
		 value= value.substring(1,value.length);
		 value=Number(value);
		 tot=tot+value;
		 }
	 }
	 tot=parseFloat(tot).toFixed(2);
	 document.getElementById('totalCost').innerHTML=tot;
	 document.getElementById('tc1').value=tot;
	 var budg= document.getElementById('remBudget').innerHTML;
	 budg= budg.substring(1,budg.length);
	 budg=Number(budg);
	 if(tot> budg){
		 err=1;
		 $("#totalCost").addClass("error");
	 }
	 else{
		 err=0;
		 $("#totalCost").removeClass("error");
	 }
	}
}
 
 function validate(){
	 if(err==1){
		 $("#errModal").modal();
		 return false;
	 }
	  $('form.itemForm').validate();
 }
 
  </script>
  </head>
 
<body>
<?php

$_SESSION["suggvendor"]=$_POST["suggvendor"];
$_SESSION["JobCode"]=$_POST["JobCode"];
$_SESSION["ShipCode"]=$_POST["shipVals"];
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
(include 'header.php');

$reqid=$_SESSION['reqd'];
$qry="select * from requistion where Id=".$reqid;
$result = $conn->query($qry);
$reqs=$result->fetch_assoc();

?>
 <div id="errModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Error</h4>
      </div>
      <div class="modal-body" id='datamodal'>
        <p class="alert-danger" id="resVal">The total cost for the requisition is exceeding the available budget for the Job Code. Please Review.</p>
      </div>
      <div class="modal-footer">
	      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>

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
	  <form class="itemForm" action="ReviewSubmit.php" method="post" role="form">
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
		<?php 
		$qry="select ItemId from itemmap where ReqId=".$reqid;
		$result = $conn->query($qry);$rowcount=0;
		while($itemslist=$result->fetch_assoc()){
			$qry="select * from itemdescr where itemid=".$itemslist['ItemId'];
			$result1 = $conn->query($qry);
			$dets= $result1->fetch_assoc();
		?>
			<tr id="<?php echo 'itemDesc'.$rowcount ?>">
			
			<td>
				<input type="text" name="<?php echo 'itemNo'.$rowcount ?>"  placeholder='Item #' class="form-control required" value='<?php echo $dets['ItemNo']; ?>'/>
			</td>
			<td>
				<textarea name="<?php echo 'item'.$rowcount ?>"  rows="2" placeholder='Item Description' class="form-control required"><?php echo $dets['Descr']; ?></textarea>
			</td>
			<td>
				<input type="text" name="<?php echo 'quant'.$rowcount ?>"  placeholder='Quantity' id="<?php echo 'quant'.$rowcount ?>" class="form-control required digits" onchange="totalCalc()" value='<?php echo $dets['Quantity']; ?>'/>
			</td>
			<td>
				<input type="text" name="<?php echo 'unit'.$rowcount ?>"  placeholder='Unit Desc' class="form-control required" value='<?php echo $dets['UnitDesc']; ?>'/>
			</td>
			<td>
				<input type="text" name="<?php echo 'unitPrice'.$rowcount ?>"  placeholder='Price' id="<?php echo 'unitPrice'.$rowcount ?>" class="form-control required numb" onchange="totalCalc()" value='<?php echo $dets['UnitPrice']; ?>'/>
			</td>
			<td>
				<input type="text" id="<?php echo 'total'.$rowcount ?>" name="<?php echo 'total'.$rowcount ?>" class="form-control" readonly onchange="sumTot()" value='<?php echo $dets['Total']; ?>'/>
			</td>
			<td>
			<p id="<?php echo 'del'.$rowcount ?>"  class="delete" onclick="deleteRow(this.id)"><span class="glyphicon glyphicon-remove" title="Delete Row" style='cursor:pointer'  ></span></p>
			</td>			
			</tr>
		<?php
		$rowcount++;
		}
		?>	 
			
		</tbody>
		</table>
		<div class="form-inline container"><a id="addItem" class="btn btn-default pull-left">Add Item</a>
		</div>
		<div class="form-inline col-sm-8 pull-left"><label for="refQuote">Reference Quote:<span class="reqd">*</span></label><input class="form-control required digits" name="refQuote" type="text" placeholder="Reference Quote" id="refQuote" value='<?php echo $reqs['RefQuote']; ?>'/></div>
			 <div class="col-sm-3 pull-right"><label for="totalCost" id='tcval'>Total Cost: $</label><label id="totalCost"><?php echo $reqs['TotalCost']; ?></label></div>
			 <input type="text" name="totalCost1" id="tc1" hidden value='<?php echo $reqs['TotalCost']; ?>'/>
			 <input type="text" name="vald" id="valid" hidden value='<?php echo $rowcount; ?>'/>
			 </div>
		<div><input type="text" id="vals" name="vals" hidden value='<?php echo $rowcount; ?>' />
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