<?php
session_start();
error_reporting(1);
?>
<?php

include("/database.php");

if(isset($_POST['username'])){

$username=trim($_POST["username"]);
$email=trim($_POST["email"]);
$f_name=trim($_POST["f_name"]);
$l_name=trim($_POST["l_name"]);
$gender=trim($_POST["gender"]);
$dob=trim($_POST["dob"]);
$add=trim($_POST["add"]);
$city=trim($_POST["city"]);
$pincode=trim($_POST["pincode"]);
$m_no=trim($_POST["m_no"]);
$type=trim($_POST["type"]);
$password=trim($_POST["password"]);
include("/database.php");
$rs=mysqli_query("select * from registration where username='$username'");


	if(mysqli_query($cn,"insert into registration(username,email,f_name,l_name,gender,dob,address,city,pincode,m_no,type,password) values('$username','$email','$f_name','$l_name','$gender','$dob','$add','$city','$pincode','$m_no','$type','$password')"))
	{


        $d="1";
		mysqli_close($cn);	
    header("Location:login.php");		
	
	}	
else
{
	$d="2";
}	

}
 


?>

<!DOCTYPE html>

<html lang="en" class="no-js">
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8"/>
        <title>The City Of Hackers</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta content="" name="description"/>
        <meta content="" name="author"/>

        <!-- GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Hind:300,400,500,600,700" rel="stylesheet" type="text/css">
        <link href="vendor/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>

        <!-- PAGE LEVEL PLUGIN STYLES -->
        <link href="css/animate.css" rel="stylesheet">

        <!-- THEME STYLES -->
        <link href="css/layout.min.css" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="css/style1.css">

        <!-- Favicon -->
        <link rel="shortcut icon" href="favicon.ico"/>
    </head>
    <!-- END HEAD -->

    <!-- BODY -->
    <body>

        <!--========== HEADER ==========-->
        <header class="header navbar-fixed-top">
            <!-- Navbar -->
            <nav class="navbar" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="menu-container">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".nav-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="toggle-icon"></span>
                        </button>

                        <!-- Logo -->
                        <div class="logo">
                            <a class="logo-wrap" href="index.php">
                                <img class="logo-img logo-img-main" src="img/logo.png" alt="Asentus Logo">
                                <img class="logo-img logo-img-active" src="img/logo-dark.png" alt="Asentus Logo">
                            </a>
                        </div>
                        <!-- End Logo -->
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse nav-collapse">
                        <div class="menu-container">
                            <ul class="navbar-nav navbar-nav-right">
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="pricing.php">Pricing</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="about.php">About</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="tools.php">Tools</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="study.php">Study</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="contact.php">Contact</a></li>
								<li class="nav-item"><a class="nav-item-child nav-item-hover" href="login.php">Login</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- End Navbar Collapse -->
                </div>
            </nav>
            <!-- Navbar -->
        </header>
        <!--========== END HEADER ==========-->

        <!--========== PARALLAX ==========-->
        <div class="parallax-window" data-parallax="scroll" data-image-src="img/1920x1080/01.jpg">
            <div class="parallax-content container">
                <h1 class="carousel-title">Login/Signup</h1>
                <p></p>
				<div class="login">

  <div class="login-header">
  <?php
if($d=="1"){
echo "<h1><b><i>Added Successfully.</i></b></h1>";
$d="0";

}
elseif($d=="2")
  {

    echo "<h1>Added Rejected.</h1>";
    echo  (mysqli_error($cn));
    exit;
}


  ?>

    <h1>Signup</h1>
  </div>
  <form class="login-form" name="registration" id="registration" method= "post" action="#">
    <h3>Username:</h3>
    <input type="text" name="username" placeholder="Username" id="username" required="required"><br>

	<h3>Email Id:</h3>
    <input type="email" id="email" name="email" placeholder="Email Id" required="required"><br>
	<h3>First Name:</h3>
    <input type="text" id="f_name" name="f_name" placeholder="Munaf" required="required"><br>
	<h3>Last Name:</h3>
	<input type="text" id="l_name" name="l_name" placeholder="Saiyed" required="required"><br>
	<h3>Gender:<h3>
  <h2 class="ch">
  <input type="radio" id="gender" name="gender" value="Male" required="required"> <label class="ch">Male</label>
  <style>
  .ch{
  color:white;
  font-size:20px;
  text-align:center;
  
  }
  </style>
  
  
  
  <input type="radio" id="gender" name="gender" value="Female"
required="required"> <label class="ch"> Female</label><br>
    
  </h2>
  <h3>Date Of Birth:</h3>
	<input type="date" id="dob" name="dob" placeholder="01/01/2017" required="required"><br>
	<h3>Address:</h3>
	<input type="text" id="add" name="add" placeholder="xxxx" required="required"><br>
	<h3>City:</h3>
	<input type="text" id="city" name="city" placeholder="xxxxxx" required="required"><br>
	<h3>Pincode:</h3>
	<input type="number" id="pincode" name="pincode" placeholder="38xxxx" required="required"><br>
	<h3>Mobile No:</h3>
    <input type="number" id="m_no" name="m_no" placeholder="99XXXXXXXX" required="required"><br>
	
	
	<h3>Registration Type:<h3>
	<h2 class="ch">
	<input type="radio" id="type" name="type" value="Learner"> <label class="ch" required="required">LEARNER</label>
	<style>
	.ch{
	color:white;
	font-size:20px;
	text-align:center;
	
	}
	</style>
	
	
	
	<input type="radio" id="type" name="type" value="Hacker" required="required"> <label class="ch"> HACKER</label><br>
    
	</h2>
	
	<h3>Password:</h3>
    <input type="password"id="password" name="password" placeholder="Password" required="required">
    <br>
	
    <input class="login-button" id="submit" type="submit" value="Signup" name="submit">
    <br>
	<br>
    <a class="sign-up" href="login.php">Login!</a>
    <br>
    <h6 class="no-access">Can't access your account?</h6>
  </form>
</div>

<div class="error-page">
  <div class="try-again">?</div>
</div>

			</div>
        </div>
       
        <footer class="footer">
           

            <!-- Copyright -->
            <div class="content container">
                <div class="row">
                    <div class="col-xs-6">
                        <img class="footer-logo" src="img/logo.png" alt="Asentus Logo">
                    </div>
                    <div class="col-xs-6 text-right">
                         <p class="margin-b-0"><a class="color-base fweight-700">Design</a> by <a class="color-base fweight-700" href="http://www.Masterhacker00.blogspot.com">Munaf Saiyed</a> and Kamar Shaikh</p>
                    </div>
                </div>
                <!--// end row -->
            </div>
            <!-- End Copyright -->
        </footer>
        <!--========== END FOOTER ==========-->

        <!-- Back To Top -->
        <a href="javascript:void(0);" class="js-back-to-top back-to-top">Top</a>

        <!-- JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
        <!-- CORE PLUGINS -->
        <script src="vendor/jquery.min.js" type="text/javascript"></script>
        <script src="vendor/jquery-migrate.min.js" type="text/javascript"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL PLUGINS -->
        <script src="vendor/jquery.easing.js" type="text/javascript"></script>
        <script src="vendor/jquery.back-to-top.js" type="text/javascript"></script>
        <script src="vendor/jquery.smooth-scroll.js" type="text/javascript"></script>
        <script src="vendor/jquery.wow.min.js" type="text/javascript"></script>
        <script src="vendor/jquery.parallax.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
		
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>
        <script src="js/components/gmap.min.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&amp;callback=initMap" async defer></script>

    </body>
    <!-- END BODY -->
</html>