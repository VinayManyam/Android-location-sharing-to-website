<?php
include 's.php';
include 'db_config.php';
$name = $_SESSION["name"];
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

 ?>
<html>
  <head>
  
  <META HTTP-EQUIV="refresh" CONTENT="30">
    <meta charset="UTF-8" />
    <title>findme</title>
    <script src="https://maps.googleapis.com/maps/api/js?key=APIkey=initMap"></script>
    <script>
      function writeAddressName(latLng) {
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({
          "location": latLng
        },
        function(results, status) {
          if (status == google.maps.GeocoderStatus.OK)
            document.getElementById("address").innerHTML = results[0].formatted_address;
          else
            document.getElementById("error").innerHTML += "Unable to retrieve your address" + "<br />";
        });
      }

      function geolocationSuccess(position) {
        var userLatLng = new google.maps.LatLng( <?php echo $name1 ?>,  <?php echo $cgpa ?>);
        // Write the formatted address
        writeAddressName(userLatLng);

        var myOptions = {
          zoom : 14,
          center : userLatLng,
          mapTypeId : google.maps.MapTypeId.ROADMAP
        };
        // Draw the map
        var mapObject = new google.maps.Map(document.getElementById("map"), myOptions);
        // Place the marker
        new google.maps.Marker({
          map: mapObject,
          position: userLatLng
        });
        // Draw a circle around the user position to have an idea of the current localization accuracy
        var circle = new google.maps.Circle({
          center: userLatLng,
          radius: 100,
          map: mapObject,
          fillColor: '#0000FF',
          fillOpacity: 0.2,
          strokeColor: '#0000FF',
          strokeOpacity: 1.0
        });
        mapObject.fitBounds(circle.getBounds());
      }

      function geolocationError(positionError) {
        document.getElementById("error").innerHTML += "Error: " + positionError.message + "<br />";
      }

      function geolocateUser() {
        // If the browser supports the Geolocation API
        if (navigator.geolocation)
        {
          var positionOptions = {
            enableHighAccuracy: true,
            timeout: 10 * 1000 // 10 seconds
          };
          navigator.geolocation.getCurrentPosition(geolocationSuccess, geolocationError, positionOptions);
        }
        else
          document.getElementById("error").innerHTML += "Your browser doesn't support the Geolocation API";
      }

      window.onload = geolocationSuccess;
    </script>
    <style type="text/css">
	
	
	div.fixed {
    position: fixed;
    top: 10;
    right: 0;
    width: 300px;
	height: 100px;
  
}
      #map {
        width: 1300px;
        height: 500px;
      }
    </style>
	 
  </head>
  <body>

<center>
	 <div id="map"></div>
 	   <p><b>Address</b>: <span id="address"></span></p>
    <p id="error"></p>
	<?php echo "Present  ID:$name";?>
	<?php  
	echo " Latitude:$name1<br>";
	echo "Longitude:$cgpa";
	
	 ?>
	</center>

		<center><h2>sharing location from android device to website</h2>	</center>
<h2>website Link:</h2>
<a href="http://projects2017.ml/"><p>http://projects2017.ml/ </p></a>

<p>With this video, I am introducing my work on Android Location</p>
<p>sharing service (consider as findme app)</p>

	<center><h2>About findme app</h2>	</center>
<p>It is an idea to share android location from android app to website</p>

	<center><h2>How it works</h2>	</center>
<p>Findme app will get current location by fallowing ways</p>
<p>1. GPS (requires wide range of sky)</p>
<p>2. Mobile Networks + GPS</p>
<p>3. Network Routers +GPS</p>

<p>Then it will generate 12 Digit ID temporarily to send this location
to a website.</p>

<center><h2>Security</h2></center>
<p>
No need to sign up or any other personal data is needed.</p>
<p>12 Digit ID will act as a mediator between your android device to the website</p>
<p>ID Generated in this app is one-time use only i.e.</p>
<p>it will be lost by stopping this app. findme app provides a temporary location</p>
<p>sharing service with your friends, family and xyzâ¦
</p>
<p><center><h2>Start Now</h2></center>
1. Download app from below link( i.e www.projects2017.ml)</p>
</p>findme.apk is compatible with android versions -android 2.3-5(lollipop)</p>
</p>2. Get 12 Digit ID by clicking start button(you can manually update your
location by clicking update button )</p>
</p>3. Then share to your friends how wants your location</p>
</p>4. After that, your friend will receive your ID and website to
follow you on the website.</p>
</p>5. By starting service in the app your location will be updated for every 30 sec at the other end your friend website will reload with time 30 sec to update your location. that's it..
	
	</p>
	

	
	
  </body>
</html>