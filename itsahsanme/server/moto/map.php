 <?php
 $servername = "localhost";
 $username = "itsahsan_kanak";
 $password = "kanakkoushik_12457";
 $dbname = "itsahsan_test";

// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
 if ($conn->connect_error) {
 	die("Connection failed: " . $conn->connect_error);
 }

 $sql = "SELECT * FROM motorcycle_positon";
 $result = $conn->query($sql);
 $rows = $result->fetch_assoc();

 ?>

 <script type="text/javascript">
 	<?php foreach($rows  as $row){ ?>
 		var location = new google.maps.LatLng(<?php echo $row['lat']; ?>, <?php echo $row['log']; ?>);
 		var marker = new google.maps.Marker({
 			position: location,
 			map: map
 		});
 		<?php } ?>
 	</script>