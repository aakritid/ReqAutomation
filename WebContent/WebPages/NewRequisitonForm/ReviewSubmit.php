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
	echo $_SESSION["JobCode"];
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
	<div class="container">
	<form action="submit.php" method="POST>
	<div class="col-sm-4"><label for="requester">Requested By: AAKRITI DUBEY </label></div>
	 <div class="col-sm-4 pull-right"><label for="jobCode1">Job Code:</label><label id="jobCode1"><?php echo $_SESSION["JobCode"]?></label></div>
	 
	 
	<button class="btn btn-default pull-right" type="Submit">Submit</button>
	</form>
			  </div>
	 
</body>
</html>