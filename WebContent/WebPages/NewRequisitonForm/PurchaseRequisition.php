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
  <script type="text/javascript"> $(function(){
$("#datepicker").datepicker({
    format: 'mm/dd/yyyy',
    minDate : 1
});
$("#datepicker").datepicker();

$('form.detForm').on('submit', function(event) {
	
	var form = document.forms["pDetails"];
	
	var jc=document.forms["pDetails"]["bcs"].value;

	if(document.getElementById("budgt").checked && jc==""){
		$("#bcs").addClass("required");
	}
	jc=document.forms["pDetails"]["explain"].value;
	if(document.getElementById("nbudgt").checked && jc==""){
		$("#explain").addClass("required");
	}
	
	
           $('.required').each(function() {
                $(this).rules("add", 
                    {
                        required: true
                    })
            });            
        });
		
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
				if(xmlhttp.responseText!="new"){
                document.getElementById("vendorAddress").value = xmlhttp.responseText;
				}
				else{
					$('#vendModal').modal();
				}
			}
			
        };
        xmlhttp.open("GET","vendAdrr.php?type=get&q="+str,true);
        xmlhttp.send();
}
function validate(){
		
	$('form.detForm').validate();
}
function jobCodeChange(str){
	if (window.XMLHttpRequest) {
           xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if(xmlhttp.responseText!="new"){
                document.getElementById("jcBudg").innerHTML = "<label>Remaining Budget: $"+xmlhttp.responseText+"</label>";
				}
				else{
					$('#jcModal').modal();
				}
			}
			
        };
        xmlhttp.open("GET","vendAdrr.php?type=getBudg&q="+str,true);
        xmlhttp.send();
}
function addVendor(){
		var nm=document.getElementById("vName").value;
		var addr=document.getElementById("vAddr").value;
		if(nm!="" && addr !=""){
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					if(xmlhttp.responseText==1){
						nm=document.getElementById("vName").value;
						addr=document.getElementById("vAddr").value;
						var	venS = document.getElementById('svendor');
						var option = document.createElement('option');
						option.text=nm;
						option.selected="selected";
						venS.appendChild(option);
						 document.getElementById("vendorAddress").value = addr;
						 $('#vendModal').modal("hide");
					}
				}
				
			};
			
			xmlhttp.open("GET","vendAdrr.php?type=set&name="+nm+"&addr="+addr,true);
			xmlhttp.send();
		}
}	

function addjc(){
	var jc=document.getElementById("jcode").value;
	var desc=document.getElementById("jcdesc").value;
	var budg=document.getElementById("budge").value;
	var pm=document.getElementById("jcdd").value;
		if(jc!="" && desc !=""){
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					if(xmlhttp.responseText==1){
						jc=document.getElementById("jcode").value;
						var	venS = document.getElementById('ddown');
						var option = document.createElement('option');
						option.text=jc;
						option.selected="selected";
						venS.appendChild(option);
						  $('#jcModal').modal("hide");
					}
					else 
						alert(xmlhttp.responseText);
				}
				
			};
			
			xmlhttp.open("GET","vendAdrr.php?type=setJc&jc="+jc+"&desc="+desc+"&budget="+budg+"&pm="+pm,true);
			xmlhttp.send();
		}
}	
</script>
</head>
<body>
<?php
(include 'header.php');
?>
<div id="vendModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Vendor</h4>
      </div>
      <div class="modal-body" id='datamodal'>
		<form>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="vName">Vendor Name:<span class="reqd">*</span> </label><input id="vName" type="text" class="form-control" placeholder="Name" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="vAddr">Vendor Address:<span class="reqd">*</span> </label><textarea id="vAddr" rows="4" class="form-control" placeholder="Address"></textarea> </div>
		</div>
	   </form>
      </div>
      <div class="modal-footer">
	  
	   <button type="button" class="btn btn-primary" onclick="addVendor()">Add</button>
		 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		
      </div>
    </div>

  </div>
</div>

<div id="jcModal" class="modal fade">
  <div class="modal-dialog">

    
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Job Code</h4>
      </div>
      <div class="modal-body" id='datamodal'>
		<form>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="jcode">Job Code:<span class="reqd">*</span> </label><input id="jcode" type="text" class="form-control" placeholder="Job Code" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="jcdesc">Description:<span class="reqd">*</span> </label><textarea id="jcdesc" rows="4" class="form-control" placeholder="Description"></textarea> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="budge">Budget ($) :</label><input id="budge" type="text" class="form-control" placeholder="Budget" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="jcpm">Project Manager:</label>
		<div  class="form-inline selectContainer">
						<select id="jcdd" class="form-control required" name="shipMethod" id="shipMethod">
							<option value="">Select</option>
							
						</select>
					</div></div>
		</div>
	   </form>
      </div>
      <div class="modal-footer">
	  
	   <button type="button" class="btn btn-primary" onclick="addjc()">Add</button>
		 <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
		
      </div>
    </div>

  </div>
</div>

      <div class="container">
      <div class="container " >
  			<div class="progress " align="right" >
    		<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:33%">
      				Step 1 of 3: Purchase Details
   			 </div>
 		 </div>
	</div>
      
      <form class="detForm" name="pDetails" action="Items.php" method="post" role="form">
      <div class="container">
      <div class="container" id="initial" style="padding: 10px;">
      <div class="col-sm-4"><label for="requester">Requested By:</label><label id="requesterName">Aakriti Dubey</label></div>
      <div  class="col-sm-5 form-inline form-group pull-right">
        <label class="col-sm-3 control-label" for="ddown">Job Code:<span class="reqd">*</span></label>
        <div id="jobCodeDiv" class="form-inline selectContainer">
            <select class="form-control required" name="JobCode" id="ddown" onchange="jobCodeChange(this.value)">
                <option value="">Job Code</option>
				<option value="new">New Job Code</option>
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
		<div class="pull-right" id="jcBudg"></div>
			     <table class="table table-bordered" style="padding:10px">
			     <tbody>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="svendor">Suggested Vendor:<span class="reqd">*</span></label> 
					<div id="svendordiv" class="form-inline selectContainer">
						<select class="form-control required" name="suggvendor" id="svendor" onchange="vendorAddr(this.value)">
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
			        <textarea class="form-control required" rows="4" id="shipAddress" name="shipAddr"></textarea> </td>
			        <td class="col-sm-4"> <div class="checkbox"><label class="checkbox-inline"><input type="checkbox" value="" name="bugd" id="budgt" checked>Budgeted</label>
						</div> 
						<div id="budgdiv"><label for="bcs">BCS#:</label><input  type="text" class="form-control" id="bcs" name="bcs"/></div></td>
			      </tr>
			      <tr>
			        <td id="vaddrdiv" colspan="2" class="col-sm-4"><label for="vendorAddress">Address of Vendor:<span class="reqd">*</span></label> 
			        <textarea class="form-control required" rows="4" id="vendorAddress" name="vendAddr"></textarea> </td>
			        <td id="attndiv" class="col-sm-4"><label for="attn">Attention:<span class="reqd">*</span></label> 
			        <input type="text" class="form-control required" id="attn" name="attn"/></td>
			        <td  class="col-sm-4"> <div class="checkbox"><label class="checkbox-inline"><input type="checkbox" value="" name="nbug" id="nbudgt">Non-Budgeted</label>
						</div> 
						<div id="nbudgtdiv"><label for="explain">Explanation:</label><input type="text" class="form-control" id="explain" name="explain"/></div></td>
			      </tr>
			      <tr>
			         <td class="col-sm-2"><label for="phoneNum">Phone Number:</label> 
			        <input type="text" class="form-control" id="phoneNum" name="phoneNum"/></td>
			        <td class="col-sm-2"><label for="faxNum">Fax Number:</label> 
			        <input type="text" class="form-control" id="faxNum" name="faxNum"/></td>
			        <td id="datediv" class="col-sm-4 form-control " >
                <label for="datepicker">Date Needed:<span class="reqd">*</span></label>
                    <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control required" id="datepicker" name="daten"></div></td>
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
			        <input type="email" class="form-control required" id="email" name="email"/></td>
			        <td class="col-sm-4"><label for="shipMethod" >Shipping Method:<span class="reqd">*</span></label> 
					<div id="smdiv" class="form-inline selectContainer">
						<select class="form-control required" name="shipMethod" id="shipMethod">
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