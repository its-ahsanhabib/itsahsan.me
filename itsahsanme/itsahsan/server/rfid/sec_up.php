<?php
$servername = "localhost";
$username = "itsahsan_kanak";
$password = "kanakkoushik_12457";
$dbname = "itsahsan_test";

//$now = date("His");//or date("H:i:s")
//$start = '210000';//or '13:00:00'
//$end = '211500';//or '17:00:00'
//if($now >= $start && $now <= $end){


date_default_timezone_set("Asia/Dhaka");
$hora = time();
$fechaRegistro="".date("H:i:s", $hora);
// $lat = htmlspecialchars($_GET["lat"],ENT_QUOTES);
// $lon = htmlspecialchars($_GET["lon"],ENT_QUOTES);
// $logtime = htmlspecialchars($_GET["logtime"],ENT_QUOTES);
$value = htmlspecialchars($_GET["v"],ENT_QUOTES);
// echo "".$fechaRegistro."000".$value;

if (($fechaRegistro!="") and ($value!="")) {
	$conn = mysql_connect($servername,$username,$password) or die("Unable to connect to server.");
	mysql_select_db($dbname) or die("Unable to open Database.");	
	$check_qur = " SELECT 1  FROM attend WHERE  cardid = '$value' ";//: for add $ for update 

	$check=mysql_query($check_qur);
	$row = mysql_fetch_array($check);
	// echo $row;
	if ($row!=""){
		// echo "row working";
		$con_red = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($con_red->connect_error) {
		    die("Connection failed: " . $con_red->connect_error);
		}

		$sql = "SELECT status FROM attend WHERE cardid = '$value' ";
		$result = $con_red->query($sql);
		$row = $result->fetch_assoc();
		if($row['status']=="in"){
			// echo "Status in";
			$sql = "UPDATE attend SET out_time='$fechaRegistro'  WHERE cardid='$value'";
			$result=mysql_query($sql);
			if ($result) {
				$sql = "UPDATE attend SET status= 'out'  WHERE cardid='$value'";
				$result=mysql_query($sql);
			}
		}
		elseif($row['status']=="out"){
			// echo "Status out";
			$sql = "UPDATE attend SET in_time='$fechaRegistro'  WHERE cardid='$value'";
			$result=mysql_query($sql);
			if ($result) {
				$sql = "UPDATE attend SET status= 'in'  WHERE cardid='$value'";
				$result=mysql_query($sql);
			}
		}
	}	
	else{
		$sql = "INSERT into attend ('cardid', 'time') VALUES ('', '$value', '$fechaRegistro')";
		$result=mysql_query($sql);
		echo "#notallowed";
	}	
 
// if successfully updated. 
	if($result){ 
		if($row['status']=="in") {
			$sql = "SELECT name FROM attend WHERE cardid = '$value' ";
			$result = $con_red->query($sql);
			$row = $result->fetch_assoc();
			echo "#","out","#",$row['name'] ; 
		}
		elseif($row['status']=="out"){
			$sql = "SELECT name FROM attend WHERE cardid = '$value' ";
			$result = $con_red->query($sql);
			$row = $result->fetch_assoc();
			echo "#","in","#",$row['name'] ; 
		}
		else { 
		echo "#notallowed"; 
		}
	}	 
}
//}else{
 //   echo "Time outside constraints";
//}

?>