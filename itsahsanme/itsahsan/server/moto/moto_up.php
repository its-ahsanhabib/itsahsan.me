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
$lat = htmlspecialchars($_GET["lat"],ENT_QUOTES);
$lon = htmlspecialchars($_GET["lon"],ENT_QUOTES);
$logtime = htmlspecialchars($_GET["logtime"],ENT_QUOTES);
$device_id = htmlspecialchars($_GET["d_id"],ENT_QUOTES);


// http://itsahsan.me/server/moto_up.php?lat=23.74180&lon=90.36131&logtime=16/4/2018::5:47:37&d_id=12


$conn = mysql_connect($mysql_host,$mysql_username,$mysql_password) or die("Unable to connect to server.");
mysql_select_db($mysql_database) or die("Unable to open Database.");	


if (($fechaRegistro!="") and ($device_id!="")) {
	// $check_qur = "INSERT INTO `motorcycle_positon`(`time`, `lat`, `log`, `device_id`) VALUES ($logtime,$lat,$lon,$device_id)";
	$check_qur = "INSERT INTO `motorcycle_positon`(`time`, `lat`, `log`, `device_id`) VALUES ('$logtime','$lat','$lon','$device_id')";
	$check=mysql_query($check_qur);
	echo $check;
	echo "#Done","lat=" ,$lat,"lon=", $lon, "time=", $logtime, "device_id=",$device_id;
}

?>