 <?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}

$type=$_POST['type'];

if($type=='get'){
	$jc=$_POST['jc'];
	if($jc!=""){
		$query="SELECT * FROM `jobcode` WHERE JobCode='".$jc."'";
				$result = $conn->query($query);
				$budg=$result->fetch_assoc();
				echo "<div class='container form-group'>";
				echo  "<label class='control-label col-sm-2' for='decripb'>Description: </label><label class='control-label col-sm-10' id='descipb'>".$budg['Descr']."</label>";
				echo	"</div>	<div class='container form-group'>";
					echo "<label class='control-label col-sm-2' for='origB'>Allocated Budget: </label><label class='control-label col-sm-2' id='origB'>$".number_format($budg['LastSet'], 2, '.', ',')."</label>";
				echo	"</div>	<div class='container form-group'>";
				echo "<label class='control-label col-sm-2' for='cbudg'>Remaining Budget: </label><label class='control-label col-sm-2' id='cbudg'>$".number_format($budg['Budget'], 2, '.', ',')."</label>";
				echo	"</div>	<div class='container form-group'>";
				echo "<label class='control-label col-sm-2' for='cbudg'>Current Project Manager: </label><label class='control-label col-sm-2' id='cpm'>".$budg['PM']."</label>";
				echo	"</div>	<div class='container form-group'>";
				echo	"<label class='control-label col-sm-2' for='nbudg'>New Budget: </label>";
				echo	"<div class='col-sm-4'> <input type='text' class='form-control' id='nbudg' name='newBudg' placeholder='New Budget($)' onkeypress='return numVal()'>";
				echo	"</div>	<div class='row container form-group  form-inline '>";
				echo	"<label class='control-label col-sm-2' for='npm'>New Project Manager: </label>";
				echo 	"<select class='form-control col sm-4' name='nPM' id='npm'>";
				echo	"<option value=''>SELECT FROM THE USERS</option></select>";
				echo	"</div></div>";
	}
}

if($type=='set'){
		$val=$_POST["newBudg"];
		$jc= $_POST["jc"];

		$query="update jobcode set LastSet=".$val.", Budget=".$val.", TotalAlloc= TotalAlloc+".$val." where JobCode='".$jc."'";
		if ($conn->query($query)== TRUE)
			echo 1;
		else 
			echo 0;
}
$conn->close();

?>
