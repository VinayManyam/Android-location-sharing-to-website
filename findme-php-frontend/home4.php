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

  $name4 = $_SESSION["name4"];

  $sql4 = "SELECT * FROM `products` WHERE CONCAT(`name`) LIKE '%".$name4."%'";
  $retval = mysql_query( $sql4);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
$htn4=$row['name'];
$nam4=$row['price'];
$cgp4=$row['description'];
$dr4=$row['updated_at'];

 

} 

$name5 = $_SESSION["name5"];

  $sql5 = "SELECT * FROM `products` WHERE CONCAT(`name`) LIKE '%".$name5."%'";
  $retval = mysql_query( $sql5);
   
   if(! $retval ) {
      die('Could not get data: ' . mysql_error());
   }
   
   while($row = mysql_fetch_array($retval, MYSQL_ASSOC)) {
$htn5=$row['name'];
$nam5=$row['price'];
$cgp5=$row['description'];
$dr5=$row['updated_at'];

 

} 
$lat1=$name3+$name1+$nam4+$nam5;
$lat1=$lat1/4;

$lon2=$cgpa+$cgpa2+$cgp4+$cgp5;
$lon2=$lon2/4;


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
          zoom: 10,
          center: {lat: <?php echo "$lat1";?>, lng: <?php echo "$lon2";?>}
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
        {lat: <?php echo "$name3"; ?>, lng: <?php echo "$cgpa2"?>},
        {lat: <?php echo "$nam4"; ?>, lng: <?php echo "$cgp4"; ?>},
		{lat: <?php echo "$nam5"; ?>, lng: <?php echo "$cgp5"; ?>}
    
      ]
    </script>
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <script async defer
   src="https://maps.googleapis.com/maps/api/js?key=apikey&callback=initMap">
    </script>
  </body>
</html>