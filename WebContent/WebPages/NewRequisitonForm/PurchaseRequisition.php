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
			 if ($auth['CVReqs']==0){
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
			$('.digit').each(function() {
                $(this).rules("add", 
                    {
                        digits: true
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

function shipChange(str){
	if (window.XMLHttpRequest) {
           xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
				if(xmlhttp.responseText!="new"){
                document.getElementById("shipAddress").value = xmlhttp.responseText;
				}
				else{
					$('#shipModal').modal();
				}
			}
			
        };
        xmlhttp.open("GET","vendAdrr.php?type=getShip&q="+str,true);
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
					if(xmlhttp.responseText==11){
						jc=document.getElementById("jcode").value;
						var	venS = document.getElementById('ddown');
						var option = document.createElement('option');
						option.text=jc;
						option.selected="selected";
						venS.appendChild(option);
						document.getElementById("jcBudg").innerHTML = "<label>Remaining Budget: $"+budg+"</label>";
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

function addShip(){
	var ln=document.getElementById("lName").value;
	var add=document.getElementById("stAdd").value;
	var st=document.getElementById("state").value;
	var ct=document.getElementById("city").value;
	var zp=document.getElementById("zip").value;
	var cn=document.getElementById("ctry").value;
		if(ln!="" && add !=""){
			if (window.XMLHttpRequest) {
				xmlhttp = new XMLHttpRequest();
			} else {
				xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
			}
			xmlhttp.onreadystatechange = function() {
				if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
					if(xmlhttp.responseText!=-1){
						jc=document.getElementById("lName").value;
						var	venS = document.getElementById('shaddr');
						var option = document.createElement('option');
						option.text=jc;
						option.selected="selected";
						option.value=xmlhttp.responseText;
						venS.appendChild(option);
						document.getElementById("shipAddress").value = ln+",\n"+add+",\n"+ct+",\n"+st+"-"+zp+".\n"+cn+".";
						  $('#shipModal').modal("hide");
					}
					else 
						alert(xmlhttp.responseText);
				}
				
			};
			
			xmlhttp.open("GET","vendAdrr.php?type=setSAd&ln="+ln+"&add="+add+"&st="+st+"&ct="+ct+"&zp="+zp+"&cn="+cn,true);
			xmlhttp.send();
		}
}
</script>
</head>
<body>
<?php
(include 'header.php');
$qry="select * from users where LoginId= '".$_SERVER['PHP_AUTH_USER']."'";
$result = $conn->query($qry);
$user=$result->fetch_assoc();

$qry="select * from usertypes where id=".$user['Type'];
$result = $conn->query($qry);
$rights=$result->fetch_assoc();

$_SESSION['ReqsName']=$user['First Name']." ".$user['Last Name'];
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
						<select id="jcdd" class="form-control" name="shipMethod" id="shipMethod">
							<option value="">Select</option>
							<?php
							$query="SELECT * from users";
							$result = $conn->query($query);
							while ($row = $result->fetch_assoc()) {
								echo "<option value='" . $row['id'] . "'>" . $row['First Name'] ." ". $row['Last Name']. "</option>";
					}
					?>
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

<div id="shipModal" class="modal fade">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Shipping Address</h4>
      </div>
      <div class="modal-body" id='datamodal'>
		<form>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="lName">Location Name:<span class="reqd">*</span> </label><input id="lName" type="text" class="form-control" placeholder="Name" /> </div>
		</div>
		<div class="row">
		<div class="col-md-10 form-group"> <label class="" for="stAdd">Street Address:<span class="reqd">*</span> </label><textarea id="stAdd" rows="2" class="form-control" placeholder="Street Address"></textarea> </div>
		</div>
		<div class="row">
		<div class="col-md-6 form-group"> <label class="" for="city">City:<span class="reqd">*</span> </label><input id="city"  class="form-control" placeholder="City"/> </div>
		</div>
		<div class="row">
		<div class="col-md-6 form-group"> <label class="" for="state">State:<span class="reqd">*</span> </label><input id="state"  class="form-control" placeholder="State"/> </div>
		</div>
		<div class="row">
		<div class="col-md-6 form-group"> <label class="" for="zip">Zip/Pin Code:<span class="reqd">*</span> </label><input id="zip"  class="form-control" placeholder="Zip/Pin Code"/> </div>
		</div>
		<div class="row">
		<div class="col-md-6 form-group"> <label class="" for="ctry">Country:<span class="reqd">*</span> </label><input id="ctry"  class="form-control" placeholder="Country"/> </div>
		</div>
	   </form>
      </div>
      <div class="modal-footer">
	  
	   <button type="button" class="btn btn-primary" onclick="addShip()">Add</button>
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
      <div class="col-sm-4"><label for="requester">Requested By:</label><label id="requesterName"><?php echo $user['First Name']." ".$user['Last Name']?></label></div>
      <div  class="col-sm-5 form-inline form-group pull-right">
        <label class="col-sm-3 control-label" for="ddown">Job Code:<span class="reqd">*</span></label>
        <div id="jobCodeDiv" class="form-inline selectContainer">
            <select class="form-control required" name="JobCode" id="ddown" onchange="jobCodeChange(this.value)">
                <option value="">Job Code</option>
				<?php
					if($rights['JCCreate']!=0){
				?>
				<option value="new">New Job Code</option>
				<?php
					}
				?>
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
			        <td id="saddrdiv" class="col-sm-4">
					<div class="form-inline">
					<label for="shipVal">Shipping Location:<span class="reqd">*</span></label> 
					<div id="shipVal" class="form-inline selectContainer">
						<select class="form-control required " name="shipVals" id="shaddr" onchange="shipChange(this.value)">
							<option value="">Shipping Address</option>
							<option value="new">New Address</option>
							<?php
								$query="SELECT * FROM shippingaddr";
								$result = $conn->query($query);
								while ($row = $result->fetch_assoc()) {
									echo "<option value='" . $row['AddrId'] . "'>" . $row['Name'] . "</option>";
								}
							?>
						</select>
					</div>
					</div>
					<div >
					<label for="shipAdd">Shipping Address:<span class="reqd">*</span></label> 
			        <textarea class="form-control required" rows="5" id="shipAddress" name="shipAddr" id="shipAdd"></textarea> 
					</div>
					</td>
			        <td class="col-sm-4"> <div class="checkbox"><label class="checkbox-inline"><input type="checkbox" value="" name="bugd" id="budgt" checked>Budgeted</label>
						</div> 
						<div id="budgdiv"><label for="bcs">BCS#:</label><input  type="text" class="form-control digit" id="bcs" name="bcs"/></div></td>
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
			        <input type="text" class="form-control digit" id="phoneNum" name="phoneNum"/></td>
			        <td class="col-sm-2"><label for="faxNum">Fax Number:</label> 
			        <input type="text" class="form-control digit" id="faxNum" name="faxNum"/></td>
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