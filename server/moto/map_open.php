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

$sql = "SELECT `id`,`device_id`,`lat`,`log` FROM `motorcycle_positon` ORDER BY `id` DESC LIMIT 1 ";
$result = $conn->query($sql);

// echo $result;
$row = $result->fetch_assoc();
// echo $row;
// SELECT `id`,`device_id`,`lat`,`log` FROM `motorcycle_positon` ORDER BY `id` DESC LIMIT 1 

$lat=-0.1279688;
$log=51.5077286 ;



?>



<html><body>
  <div id="mapdiv"></div>
  <script src="http://www.openlayers.org/api/OpenLayers.js"></script>
  <script>
    map = new OpenLayers.Map("mapdiv");
    map.addLayer(new OpenLayers.Layer.OSM());

    var lonLat = new OpenLayers.LonLat( <?php echo $row['log']; ?> ,<?php echo $row['lat']; ?> )
          .transform(
            new OpenLayers.Projection("EPSG:4326"), // transform from WGS 1984
            map.getProjectionObject() // to Spherical Mercator Projection
          );
          
    var zoom=16;

    var markers = new OpenLayers.Layer.Markers( "Markers" );
    map.addLayer(markers);
    
    markers.addMarker(new OpenLayers.Marker(lonLat));
    
    map.setCenter (lonLat, zoom);
  </script>
</body></html>