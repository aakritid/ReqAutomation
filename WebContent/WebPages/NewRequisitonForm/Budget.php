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
		$query="SELECT Descr,Budget FROM `jobcode` WHERE JobCode='".$jc."'";
				$result = $conn->query($query);
				$budg=$result->fetch_assoc();
				echo "<div class='container form-group'>";
				echo  "<label class='control-label col-sm-2' for='decripb'>Description: </label><label class='control-label col-sm-10' id='descipb'>".$budg['Descr']."</label>";
				echo	"</div>	<div class='container form-group'>";			
				echo "<label class='control-label col-sm-2' for='cbudg'>Current Budget: </label><label class='control-label col-sm-2' id='cbudg'>$".number_format($budg['Budget'], 2, '.', ',')."</label>";
				echo	"</div>	<div class='container form-group'>";
				
				echo	"<label class='control-label col-sm-2' for='nbudg'>New Budget: </label>";
				echo	"<div class='col-sm-4'> <input type='text' class='form-control' id='nbudg' name='newBudg' placeholder='New Budget($)'>";
				echo	"</div></div>";
	}
}

if($type=='set'){
		$val=$_POST["newBudg"];
		$jc= $_POST["jc"];

		$query="update jobcode set Budget=".$val." where JobCode='".$jc."'";
		if ($conn->query($query)== TRUE)
			echo 1;
		else 
			echo 0;
}
$conn->close();

?>
