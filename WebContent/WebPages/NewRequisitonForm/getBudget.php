 <?php

$servername = "localhost";
$username = "root";
$password = "pari123#";

$conn = new mysqli($servername, $username, $password,"purchasereq");
if (!$conn) {
    die('Could not connect: ' . mysqli_error($con));
}
$val=$_GET['q'];
if($val!=""){
	$query="SELECT Descr,Budget FROM `jobcode` WHERE JobCode='".$val."'";
			$result = $conn->query($query);
			$budg=$result->fetch_assoc();
			echo "<div class='container form-group'>";
			echo  "<label class='control-label col-sm-2' for='decripb'>Description: </label><label class='control-label col-sm-10' id='descipb'>".$budg['Descr']."</label>";
			echo	"</div>	<div class='container form-group'>";			
			echo "<label class='control-label col-sm-2' for='cbudg'>Current Budget: </label><label class='control-label col-sm-2' id='cbudg'>$".$budg['Budget']."</label>";
			echo	"</div>	<div class='container form-group'>";
			
			echo	"<label class='control-label col-sm-2' for='nbudg'>New Budget: </label>";
			echo	"<div class='col-sm-4'> <input type='text' class='form-control' id='nbudg' name='newBudg' placeholder='New Budget($)'>";
			echo	"</div></div>";
}
$conn->close();

?>
