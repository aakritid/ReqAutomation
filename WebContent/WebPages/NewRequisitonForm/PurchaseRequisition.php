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
  <script type="text/javascript"> $(function(){
$("#datepicker").datepicker({
    format: 'mm/dd/yyyy',
    minDate : 1
});
$("#datepicker").datepicker();

});

  
  
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

      <div class="container">
      <div class="container " >
  			<div class="progress " align="right" >
    		<div class="progress-bar" role="progressbar" aria-valuenow="33" aria-valuemin="0" aria-valuemax="100" style="width:33%">
      				Step 1 of 3: Purchase Details
   			 </div>
 		 </div>
	</div>
      
      <form action="Items.php" method="post" role="form">
      <div class="container">
      <div class="container" id="initial" style="padding: 10px;">
      <div class="col-sm-4"><label for="requester">Requested By:</label><label id="requesterName">Aakriti Dubey</label></div>
      <div class="col-sm-6 form-inline form-group pull-right">
        <label class="col-sm-3 control-label" for="ddown">Job Code:</label>
        <div class="form-inline selectContainer">
            <select class="form-control" name="size" id="ddown">
                <option value="">Job Code</option>
                <option value="US13003">US13003 - Tigershark Rework</option>
                <option value="US13004">US13004 - Tigershark MECR's</option>
                <option value="US14005">US14005 - Tigershark Warranty - India</option>
                <option value="US14006">US14006 - Tigershark Spares </option>
            </select>
        </div>
    </div>
    
		</div>
			     <table class="table table-bordered" style="padding:10px">
			     <tbody>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="svendor">Suggested Vendor:</label> 
			        <input type="text" class="form-control" id="svendor" name="suggvendor"/></td>
			        <td class="col-sm-4"><label for="shipAddress">Shipping Address:</label> 
			        <textarea class="form-control" rows="4" id="shipAddress"></textarea> </td>
			        <td class="col-sm-4"> <div class="checkbox"><label class="checkbox-inline"><input type="checkbox" value="">Budgeted</label>
						</div> 
						<label for="bcs">BCS#:</label><input type="text" class="form-control" id="bcs"/></td>
			      </tr>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="vendorAddress">Address of Vendor:</label> 
			        <textarea class="form-control" rows="4" id="vendorAddress"></textarea> </td>
			        <td class="col-sm-4"><label for="attn">Attention:</label> 
			        <input type="text" class="form-control" id="attn"/></td>
			        <td class="col-sm-4"> <div class="checkbox"><label class="checkbox-inline"><input type="checkbox" value="">Non-Budgeted</label>
						</div> 
						<label for="explain">Explanation:</label><input type="text" class="form-control" id="explain"/></td>
			      </tr>
			      <tr>
			         <td class="col-sm-2"><label for="phoneNum">Phone Number:</label> 
			        <input type="text" class="form-control" id="phoneNum"/></td>
			        <td class="col-sm-2"><label for="faxNum">Fax Number:</label> 
			        <input type="text" class="form-control" id="faxNum"/></td>
			        <td class="col-sm-4 form-control" >
                <label for="datepicker">Date Needed:</label>
                    <div class="input-group date" data-provide="datepicker">
    <input type="text" class="form-control" id="datepicker"></div></td>
			         <td rowspan ="2" class="col-sm-4"> <div class="row-sm-2 checkbox"><label><input type="checkbox" value="">PARI India Scope</label>
						</div> 
						<div class="row-sm-2 checkbox"><label><input type="checkbox" value="">PARI Inc Scope</label>
						</div>
						<div class="row-sm-2 checkbox"><label><input type="checkbox" value="">Other</label><input type="text" class="form-control"/>
						</div>  </td>
			      </tr>
			      <tr>
			        <td colspan="2" class="col-sm-4"><label for="email">Email:</label> 
			        <input type="email" class="form-control" id="email"/></td>
			        <td class="col-sm-4"><label for="shipMethod">Shipping Method:</label> 
			       <input type="text" class="form-control" id="shipMethod"/></td>
			        
			      </tr>
			    </tbody>
			  </table>
			  </div>
			  <div>
			  <button class="btn btn-default pull-right" type="Submit">Next</button>
			  </div>
			  </form>
			</div>
			
  
     </body>
</html>