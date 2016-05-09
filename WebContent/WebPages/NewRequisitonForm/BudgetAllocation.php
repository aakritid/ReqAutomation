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
  <script>
function budget(str){
	if (window.XMLHttpRequest) {
            xmlhttp = new XMLHttpRequest();
        } else {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("contents").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("GET","getBudget.php?q="+str,true);
        xmlhttp.send();
}
  </script>
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
      <li><a href="PurchaseRequisition.php">New Requisition</a></li>
      <li><a href="#">Submitted Requisitions</a></li>
      <li><a href="#">Approve Requests</a></li> 
	  <li class="active"><a href="BudgetAllocation.php">Budget Allocation</a></li> 
          </ul>
  </div>
</nav>

<div class="container">
	<h1> Set Budget </h1>
	<form class="" action="setBudg.php" method="post">
		<div class="container form-group">
		<label class="control-label col-sm-2" for="ddown">Job Code:<span class="reqd">*</span></label>
        <div id="jobCodeDiv" class="col-sm-10 form-inline selectContainer">
            <select class="form-control" name="JobCode" id="ddown" onchange="budget(this.value)">
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
		<div class="container" id="contents">
		
		</div>
		<button class="btn btn-default center" type="Submit">Set</button>
		</form>
</div>
</body>
</head>
</html>
		
