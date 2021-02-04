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
$value = htmlspecialchars($_GET["v"],ENT_QUOTES);
echo "".$fechaRegistro."000".$value;

if (($fechaRegistro!="") and ($value!="")) {
	$conn = mysql_connect($servername,$username,$password) or die("Unable to connect to server.");
	mysql_select_db($dbname) or die("Unable to open Database.");	
	$check_qur = " SELECT 1  FROM attend WHERE  cardid = '$value' ";//: for add $ for update 

	$check=mysql_query($check_qur);
	$row = mysql_fetch_array($check);
	if ($row!=""){
	$sql = "UPDATE attend SET time='$fechaRegistro' WHERE cardid='$value'";
	$result=mysql_query($sql);
}
	else{
	$sql = "INSERT into attend (`metric`, `cardid`, `time`) VALUES ('', '$value', '$fechaRegistro')";
	$result=mysql_query($sql);
	}	
 
// if successfully updated. 
if($result){ 
echo "Successful"; 
} 
else { 
echo "ERROR"; 
}
} 

//}else{
 //   echo "Time outside constraints";
//}

?>