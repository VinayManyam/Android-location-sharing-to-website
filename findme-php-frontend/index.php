<?php include 's.php'; ?>

<?php



if(isset($_POST["submit"]))

{

$_SESSION["name"] = $_POST["name"];

$name = $_POST["name"];



 echo "<script> window.location.assign('home.php'); </script>";



} 

?>



<?php

if(isset($_POST["submit2"]))

{

 

 $_SESSION["name"] = $_POST["name"];

 $_SESSION["name2"] = $_POST["name2"];



   echo "<script> window.location.assign('home2.php'); </script>";



  

 

}

?>

<?php

if(isset($_POST["submit3"]))

{

 

include 'db_config.php';

 $_SESSION["name"] = $_POST["name"];

 $_SESSION["name2"] = $_POST["name2"];

  $_SESSION["name4"] = $_POST["name3"];

   echo "<script> window.location.assign('home3.php'); </script>";

 

}

?>



<?php

if(isset($_POST["submit4"]))

{

 

include 'db_config.php';

 $_SESSION["name"] = $_POST["name"];

 $_SESSION["name2"] = $_POST["name2"];

  $_SESSION["name4"] = $_POST["name3"];

 $_SESSION["name5"] = $_POST["name4"];

  echo "<script> window.location.assign('home4.php'); </script>";

}

?>

<html>

<head>

	<!-- core CSS -->

    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link href="css/font-awesome.min.css" rel="stylesheet">

    <link href="css/animate.min.css" rel="stylesheet">

    <link href="css/owl.carousel.css" rel="stylesheet">

    <link href="css/owl.transitions.css" rel="stylesheet">

    <link href="css/prettyPhoto.css" rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">

    <link href="css/responsive.css" rel="stylesheet">



    </head>

	<title>findme</title>



		<!-- end preloader -->

<style>

body  {

    background-image: url("map.jpg");

    background-color: #cccccc;

}

.center {

   position: fixed; /* or absolute */

  top: 20%;

  left: 40%;

    

}

	div.fixed {

    position: fixed;

    top: 10;

    right: 0;

    width: 300px;

	height: 100px;

  

}



</style>

<body>



    <div class="fixed">

<a href="http://lbrce.ac.in/site/findme.apk"><img src="http://4.bp.blogspot.com/-dOB_75cqOIw/VsGt1pErOzI/AAAAAAAAAWI/tC8l2c6-brs/s1600/apk-download.png"></a>

</div>

 <center>  <h2><font color="red">Android Location Sharing Service</h2></center>

<div class="container">

<br>

<br>

<br>

<br>

<br>

<br>

<br>

            <div class="section-header">

             

			

                <p class="text-center wow fadeInDown"></p>

            </div>



            <div class="row">

                <div class="col-sm-6 col-md-3">

                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="0ms">

                        <ul class="pricing">

								<br>

			<img src="http://lbrce.ac.in/site/d/user.png" width="150"height="150">

      <form action="" method="post">

        

        <table>



		<br>

		<br>

          <tr><td><input class="text" name="name" type="text" value="      A"/></td></tr>

          <tr><td align="center"><br/>

             <input type="submit" name="submit" value="submit"  />

          </td></tr>

        </table>  

      </form>

                        </ul>

                    </div>

                </div>

                <div class="col-sm-6 col-md-3">

                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="200ms">

                        <ul class="pricing featured">

						<br>

                          			<img src="http://lbrce.ac.in/site/d/user2.png" width="150" height="150">

      <form action="" method="post">

              <table>

			  <br>

			  

          <tr><td><input class="text" name="name" type="text" value="      A" /></td></tr>	

<tr><td><input class="text" name="name2" type="text"value="      B"/></td></tr>		  

		  

          <tr><td align="center"><br/>

             <input type="submit" name="submit2" value="Submit"  />

          </td></tr>

        </table>  

      </form> 

                        </ul>

                    </div>

                </div>

				

				          <div class="col-sm-6 col-md-3">

                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="200ms">

                        <ul class="pricing">

						<br>

                            			<img src="http://lbrce.ac.in/site/d/user3.png"" width="150"height="150">

      <form action="" method="post">

        

        <table>

          <tr><td><input class="text" name="name" type="text" value="      A"/></td></tr>

		  <tr><td><input class="text" name="name2" type="text"value="      B"/></td></tr>

		  <tr><td><input class="text" name="name3" type="text"value="      C"/></td></tr>

          <tr><td align="center"><br/>

             <input type="submit" name="submit3" value="Submit"  />

          </td></tr>

        </table>  

      </form>

                        </ul>

                    </div>

                </div>

				

				

				          <div class="col-sm-6 col-md-3">

                    <div class="wow zoomIn" data-wow-duration="400ms" data-wow-delay="200ms">

                        <ul class="pricing featured">

                           			<img src="http://lbrce.ac.in/site/d/user4.png"" width="150"height="150">

      <form action="" method="post">

        

        <table>

          <tr><td><input class="text" name="name" type="text" value="      A"/></td></tr>

		  <tr><td><input class="text" name="name2" type="text"value="      B"/></td></tr>

		  <tr><td><input class="text" name="name3" type="text"value="      C"/></td></tr>

		  <tr><td><input class="text" name="name4" type="text"value="      D"/></td></tr>

          <tr><td align="center"><br/>

             <input type="submit" name="submit4" value="Submit"  />

          </td></tr>

        </table>  

      </form>

                        </ul>

                    </div>

                </div>

                

                            </div>

        </div>

</body>

</head>

</html>
