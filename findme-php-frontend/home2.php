<?php
 include 's.php'; 
$name = $_SESSION["name"];
include 'db_config.php';
  $sql = "SELECT * FROM `products` WHERE CONCAT(`name`) LIKE '%".$name."%'";
  $retval = mysql_query( $sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
$htn=$row['name'];
$name1=$row['price'];
$cgpa=$row['description'];
$dr=$row['updated_at'];
   }
  $name2 = $_SESSION["name2"];

  $sql2 = "SELECT * FROM `products` WHERE CONCAT(`name`) LIKE '%".$name2."%'";
  $retval = mysql_query( $sql2);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
$htn2=$row['name'];
$name3=$row['price'];
$cgpa2=$row['description'];
$dr2=$row['updated_at'];

 

} 

$lat1=$name3+$name1;
$lat1=$lat1/2;

$lon2=$cgpa+$cgpa2;
$lon2=$lon2/2;

?>












<!DOCTYPE html>
<html>
  <head>
  <META HTTP-EQUIV="refresh" CONTENT="30">
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <title>findme</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }

    </style>
  </head>
  <body>


    <div id="map"></div>
    <script>

      function initMap() {

        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 12,
          center: {lat:  <?php echo "$lat1";?>, lng: <?php echo "$lon2";?>}
        });

        
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
       
        var markers = locations.map(function(location, i) {
          return new google.maps.Marker({
            position: location,
            label: labels[i % labels.length]
          });
        });

       
        var markerCluster = new MarkerClusterer(map, markers,
            {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
      }
      var locations = [

        {lat: <?php echo "$name1"; ?>, lng: <?php echo "$cgpa"?>},
        {lat: <?php echo "$name3"; ?>, lng: <?php echo "$cgpa2"?>}
    
      ]
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=apikey&callback=initMap">
    </script>
  </body>
</html>