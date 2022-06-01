<?php
$servername = "localhost";
$username = "itsahsan_public";
$password = "%^&123456%^&";
$dbname = "itsahsan_kanak_public_test";

//$now = date("His");//or date("H:i:s")
//$start = '210000';//or '13:00:00'
//$end = '211500';//or '17:00:00'
//if($now >= $start && $now <= $end){


date_default_timezone_set("Asia/Dhaka");
$hora = time();
$fechaRegistro="".date("H:i:s", $hora);

$id=htmlspecialchars($_GET["id"],ENT_QUOTES);
$value1 = htmlspecialchars($_GET["x1"],ENT_QUOTES);
$value2 = htmlspecialchars($_GET["x2"],ENT_QUOTES);
$value3 = htmlspecialchars($_GET["x3"],ENT_QUOTES);
$value4 = htmlspecialchars($_GET["x4"],ENT_QUOTES);


$date="05:06:2018";
echo "Time--".$fechaRegistro."--ID= ".$id."  X1= ".$value1."  X2= ".$value2."  X3= ".$value3."  X4= ".$value4;


if (($fechaRegistro!="") and ($id!="")) {
	$conn = mysql_connect($servername,$username,$password) or die("Unable to connect to server.");
	mysql_select_db($dbname) or die("Unable to open Database.");	
	$check_qur = " SELECT 1  FROM rssi WHERE  id = '$id' ";//: for add $ for update 

	$check=mysql_query($check_qur);
	$row = mysql_fetch_array($check);
	if ($row!=""){
		

		// $sql = "UPDATE `gas` SET `level`=20 WHERE `id`=2";

		$sql = "UPDATE `rssi` SET `x1`='$value1',`x2`='$value2',`x3`='$value3',`x4`='$value4' WHERE `id`='$id'";
		$result=mysql_query($sql);
		echo "  ::: => "; 
		echo $result;
		echo "updating"; 
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