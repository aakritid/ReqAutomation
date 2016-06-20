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
	if($jc=="new")
		echo "new";
	else if($jc!=""){
		
		$op="";
		$query="SELECT * from users where Active=1";
		$result = $conn->query($query);
		while ($row = $result->fetch_assoc()) {
			$op.= "<option value='" . $row['id'] . "'>" . $row['First Name'] ." ". $row['Last Name']. "</option>";
		}
		$query="SELECT * FROM `jobcode` WHERE JobCode='".$jc."'";
		$result = $conn->query($query);
		$budg=$result->fetch_array(MYSQLI_BOTH);
		$pm= "N/A";
		if($budg['PM']!="" && $budg['PM']!=0){
			$query="SELECT * FROM `users` WHERE id=".$budg['PM'];
			$result = $conn->query($query);
			$res=$result->fetch_assoc();
			$pm=$res['First Name']." ".$res['Last Name'];
		}
		$rev=$budg['RevNo'];
		$check=$budg['SelfApp'];
		if($check==0)
			$inp="<input id='selfa' name='selfa' type='checkbox' >";
		else
			$inp="<input id='selfa' name='selfa' type='checkbox' checked>";
		$op2="<div class='row container form-group  form-inline '><label class='control-label col-sm-2'>Allow Self Approve: </label>".$inp." </div>";
			$alloc=$budg[$rev];
				echo "<div class='container form-group'>";
				echo  "<label class='control-label col-sm-2' for='decripb'>Description: </label><label class='control-label col-sm-10' id='descipb'>".$budg['Descr']."</label>";
				echo	"</div>	<div class='container form-group'>";
					echo "<label class='control-label col-sm-2' for='origB'>Allocated Budget: </label><label class='control-label col-sm-2' id='origB'>$".number_format($alloc, 2, '.', ',')."</label>";
				echo	"</div>	<div class='container form-group'>";
				echo "<label class='control-label col-sm-2' for='cbudg'>Remaining Budget: </label><label class='control-label col-sm-2' id='cbudg'>$".number_format($budg['Budget'], 2, '.', ',')."</label>";
				echo	"</div>	<div class='container form-group'>";
				echo "<label class='control-label col-sm-2' for='cbudg'>Current Project Manager: </label><label class='control-label col-sm-2' id='cpm'>".$pm."</label>";
				echo	"</div>	<div class='container form-group'>";
				echo	"<label class='control-label col-sm-2' for='nbudg'>New Budget: </label>";
				echo	"<div class='col-sm-4'> <input type='text' class='form-control' id='nbudg' name='newBudg' placeholder='New Budget($)' onkeypress='return numVal()'>";
				echo	"</div>	<div class='row container form-group  form-inline '>";
				echo	"<label class='control-label col-sm-2' for='npm'>New Project Manager: </label>";
				echo 	"<select class='form-control col sm-4' name='nPM' id='npm'>";
				echo	"<option value=''>Select</option>".$op."</select>";
				echo	"</div>".$op2."</div>";
	}
}

if($type=='set'){
		$val=$_POST["newBudg"];
		$jc= $_POST["jc"];
		$pm= $_POST['newPm'];
		$sa= $_POST['selfA'];
		
		$query="select * from jobcode where JobCode='".$jc."'";
		$result=$conn->query($query);
		$res=$result->fetch_assoc();
		$revn=$res['RevNo'];
		if($revn<10)
			$revn++;
		
		$col=$result->fetch_field_direct($revn);		
		
		if($val!=""){
			$query="update jobcode set ".$col->name."=".$val.", Budget=".$val.", TotalAlloc= TotalAlloc+".$val.", RevNo=".$revn.", SelfApp=".$sa." where JobCode='".$jc."'";
			if ($conn->query($query)== TRUE)
				echo 1;
			else 
				echo $conn->error;
		}
		if($pm!=""){
			$query="select PM from jobcode where JobCode='".$jc."'";
			$result = $conn->query($query);
			$res=$result->fetch_assoc();
			
			$query="update jobcode set PM=".$pm. ", SelfApp=".$sa." where JobCode='".$jc."'";
			if ($conn->query($query)== TRUE)
				echo 1;
			else 
				echo $conn->error;
			
			$query="update users set Type=3 where id=".$pm;
			$result = $conn->query($query);
			
			if($res['PM']!="" && $res['PM']!=0){
				$currpm=$res['PM'];	
				$query="select JCId from jobcode where PM=".$currpm;
				$result = $conn->query($query);
				if($result->num_rows ==0){
					$query="update users set Type=2 where id=".$currpm;
					$result = $conn->query($query);
				}
			}
		}
		if($val=="" && $pm==""){
			$query="update jobcode set SelfApp=".$sa." where JobCode='".$jc."'";
			if ($conn->query($query)== TRUE)
				echo 1;
			else 
				echo $conn->error;
		}
		
}
$conn->close();

?>
