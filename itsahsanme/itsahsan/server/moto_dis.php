<?php
// $servername = "localhost";
// $username = "itsahsan_kanak";
// $password = "kanakkoushik_12457";
// $dbname = "itsahsan_test";


$mysql_host = "localhost";
$mysql_database = "itsahsan_test";
$mysql_username = "itsahsan_kanak";
$mysql_password = "kanakkoushik_12457";

date_default_timezone_set("Asia/Dhaka");
$hora = time();
$fechaRegistro="".date("H:i:s", $hora);
$distance = htmlspecialchars($_GET["distance"],ENT_QUOTES);
$device_id = htmlspecialchars($_GET["d_id"],ENT_QUOTES);



$conn = mysql_connect($mysql_host,$mysql_username,$mysql_password) or die("Unable to connect to server.");
mysql_select_db($mysql_database) or die("Unable to open Database.");	


if (($fechaRegistro!="") and ($device_id!="")) {
	// $check_qur = "INSERT INTO `motorcycle_positon`(`time`, `lat`, `log`, `device_id`) VALUES ($logtime,$lat,$lon,$device_id)";
	$check_qur = "INSERT INTO `distance`(`device_id`, `distance`, `time`, `date`) VALUES ('$device_id','$distance','11:11','1-10-10')";
	$check=mysql_query($check_qur);
	echo $check;
	echo "#Done";
}

?>