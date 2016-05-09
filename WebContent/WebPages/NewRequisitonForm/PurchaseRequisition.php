<!DOCTYPE html>
<html>
<head>
<meta charset="ISO-8859-1">
<title>Purchase Requisition</title>
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <style>
  .reqd{
	  color:red;
	  font-size:125%;
  }
  </style>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript"> $(function(){
$("#datepicker").datepicker({
    format: 'mm/dd/yyyy',
    minDate : 1
});
$("#datepicker").datepicker();

});

function vendorAddr(str){
	if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("vendorAddress").value = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","vendAdrr.php?q="+str,true);
        xmlhttp.send();
}
function validate(){
	var err=0;
	var form = document.forms["pDetails"];
	var jc= document.forms["pDetails"]["JobCode"].value;
	if(jc==""){
		err=1;
		$("#jobCodeDiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["suggvendor"].value;
	if(jc==""){
		err=1;
		$("#svendordiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["shipAddr"].value;
	if(jc==""){
		err=1;
		$("#saddrdiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["attn"].value;
	if(jc==""){
		err=1;
		$("#attndiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["vendAddr"].value;
	if(jc==""){
		err=1;
		$("#vaddrdiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["daten"].value;
	if(jc==""){
		err=1;
		$("#datediv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["email"].value;
	if(jc==""){
		err=1;
		$("#emaildiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["shipMethod"].value;
	if(jc==""){
		err=1;
		$("#smdiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["shipMethod"].value;
	if(jc==""){
		err=1;
		$("#smdiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["bcs"].value;
	if(document.getElementById("budgt").checked && jc==""){
		err=1;
		$("#budgdiv").addClass("has-error");
	}
	jc=document.forms["pDetails"]["explain"].value;
	if(document.getElementById("nbudgt").checked && jc==""){
		err=1;
		$("#nbudgtdiv").addClass("has-error");
	}
	if(err==1){
		alert("Fill out all the required fields");
		return false;
	}
	return true;
}

    
</script>
</head>
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
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
    <a class="navbar-brand" href="#">PARI Purchase Requisition</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">New Requisition</a></li>
      <li><a href="#">Submitted Requisitions</a></li>
      <li><a href="#">Approve Requests</a></li> 
	  <li><a href="BudgetAllocation.php">Budget Allocation</a></li> 
          </ul>
  </div>
</nav>

      <div class="container">
      <div class="container " >
  			<div class="progress " align="right" >
    		<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:33%">
      				Step 1 of 3: Purchase Details
   			 </div>
 		 </div>
	</div>
      
      <form name="pDetails" action="Items.php" method="post" role="form">
      <div class="container">
      <div class="container" id="initial" style="padding: 10px;">
      <div class="col-sm-4"><label for="requester">Requested By:</label><label id="requesterName">Aakriti Dubey</label></div>
      <div  class="col-sm-5 form-inline form-group pull-right">
        <label class="col-sm-3 control-label" for="ddown">Job Code:<span class="reqd">*</span></label>
        <div id="jobCodeDiv" class="form-inline selectContainer">
            <select class="form-control" name="JobCode" id="ddown">
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
    
		</div>
			     <table class="table table-bordered" style="padding:10px">
			     <tbody>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="svendor">Suggested Vendor:<span class="reqd">*</span></label> 
					<div id="svendordiv" class="form-inline selectContainer">
						<select class="form-control" name="suggvendor" id="svendor" onchange="vendorAddr(this.value)">
							<option value="">Suggested Vendor</option>
							<option value="new">New Vendor</option>
							<?php
								$query="SELECT * FROM vendor";
								$result = $conn->query($query);
								while ($row = $result->fetch_assoc()) {
									echo "<option value='" . $row['VendorName'] . "'>" . $row['VendorName'] . "</option>";
								}
							?>
						</select>
					</div>
					</td>
			        <td id="saddrdiv" class="col-sm-4"><label for="shipAddress">Shipping Address:<span class="reqd">*</span></label> 
			        <textarea class="form-control" rows="4" id="shipAddress" name="shipAddr"></textarea> </td>
			        <td class="col-sm-4"> <div class="checkbox"><label class="checkbox-inline"><input type="checkbox" value="" name="bugd" id="budgt" checked>Budgeted</label>
						</div> 
						<div id="budgdiv"><label for="bcs">BCS#:</label><input  type="text" class="form-control" id="bcs" name="bcs"/></div></td>
			      </tr>
			      <tr>
			        <td id="vaddrdiv" colspan="2" class="col-sm-4"><label for="vendorAddress">Address of Vendor:<span class="reqd">*</span></label> 
			        <textarea class="form-control" rows="4" id="vendorAddress" name="vendAddr"></textarea> </td>
			        <td id="attndiv" class="col-sm-4"><label for="attn">Attention:<span class="reqd">*</span></label> 
			        <input type="text" class="form-control" id="attn" name="attn"/></td>
			        <td  class="col-sm-4"> <div class="checkbox"><label class="checkbox-inline"><input type="checkbox" value="" name="nbug" id="nbudgt">Non-Budgeted</label>
						</div> 
						<div id="nbudgtdiv"><label for="explain">Explanation:</label><input type="text" class="form-control" id="explain" name="explain"/></div></td>
			      </tr>
			      <tr>
			         <td class="col-sm-2"><label for="phoneNum">Phone Number:</label> 
			        <input type="text" class="form-control" id="phoneNum" name="phoneNum"/></td>
			        <td class="col-sm-2"><label for="faxNum">Fax Number:</label> 
			        <input type="text" class="form-control" id="faxNum" name="faxNum"/></td>
			        <td id="datediv" class="col-sm-4 form-control" >
                <label for="datepicker">Date Needed:<span class="reqd">*</span></label>
                    <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control" id="datepicker" name="daten"></div></td>
			         <td rowspan ="2" class="col-sm-4"> 
					  <div class="row-sm-2 radio">
			         <label><input type="radio" name="scope" value="pind" checked>PARI India Scope</label>
						</div> 
						<div class="row-sm-2 radio"><label><input type="radio" name="scope" value="pinc">PARI Inc Scope</label>
						</div>
						<div class="row-sm-2 radio"><label><input type="radio" name="scope" value="other">Other</label><input type="text" class="form-control" name="otherval"/>
						</div>
					 </td>
				</tr>
			      <tr>
			        <td id="emaildiv" colspan="2" class="col-sm-4"><label for="email">Email:<span class="reqd">*</span></label> 
			        <input type="email" class="form-control" id="email" name="email"/></td>
			        <td class="col-sm-4"><label for="shipMethod" >Shipping Method:<span class="reqd">*</span></label> 
					<div id="smdiv" class="form-inline selectContainer">
						<select class="form-control" name="shipMethod" id="shipMethod">
							<option value="">Shipping Method</option>
							<option value="FedEx">FedEx</option>
							<option value="Freight">Freight</option>
							<option value="UPS">UPS</option>
							<option value="USPS">USPS</option>
							<option value="UTI">UTI</option>
							<option value="Your Truck">Your Truck</option>
						</select>
					</div>
			       			        
			      </tr>
			    </tbody>
			  </table>
			  </div>
			  <div>
			  <button class="btn btn-default pull-right" type="Submit" onclick="return validate();">Next</button>
			  </div>
			  </form>
			</div>
			<?php
				$conn->close();
			?>
  
     </body>
</html>