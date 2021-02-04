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
$level = htmlspecialchars($_GET["w"],ENT_QUOTES);
$date="10:07:2018";
echo "Time--".$fechaRegistro."ID--".$value."level--".$level;

if (($fechaRegistro!="") and ($value!="")) {
	$conn = mysql_connect($servername,$username,$password) or die("Unable to connect to server.");
	mysql_select_db($dbname) or die("Unable to open Database.");	
	$check_qur = " SELECT 1  FROM gas WHERE  id = '$value' ";//: for add $ for update 

	$check=mysql_query($check_qur);
	$row = mysql_fetch_array($check);
	if ($row!=""){
		

		// $sql = "UPDATE `gas` SET `level`=20 WHERE `id`=2";

		$sql = "UPDATE `gas` SET `level`='$level',`u_time`='$fechaRegistro',`u_date`='$date' WHERE `id`='$value'";
		$result=mysql_query($sql);
		echo $result;
		echo "updating"; 
	}
	else{
		$sql = "INSERT INTO `itsahsan_test`.`gas` (`id`, `level`, `time`, `date`) VALUES ('$value', '**', '$fechaRegistro', '05-06-18')";
		$result=mysql_query($sql);
		echo "inserting"; 
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