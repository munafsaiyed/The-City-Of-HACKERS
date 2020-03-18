<?PHP
session_start();
if (!isset($_SESSION['username']))
        {
            header("Location: login.php");
        }
?>
<?php

    
    include("database.php");
    $u=(trim($_SESSION['username']));
    $rs=mysqli_query($cn,"select * from registration where username='$u'") or die(mysqli_error($cn));
    $row = mysqli_fetch_array($rs);
    $username=$row['username'];
    $email=$row['email'];
    $f_name=$row['f_name'];
    $l_name=$row['l_name'];
    $gender=$row['gender'];
    $dob=$row['dob'];
    $add=$row['address'];
    $city=$row['city'];
    $pincode=$row['pincode'];
    $m_no=$row['m_no'];
    $type=$row['type'];
$b=0;
$a=0;
if(isset($_POST['submit']))
{
$password=trim($_POST["password"]);
$confirm_password=trim($_POST["confirm_password"]);
if($password==$confirm_password)
{
    include("database.php");
    $sql = "UPDATE registration SET password='$confirm_password' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=3;
}
else
{
    $a=2;
}
}
if(isset($_POST['submit1']))
{
include("/database.php");
$email1=trim($_POST["email"]);
$f_name1=trim($_POST["f_name"]);
$l_name1=trim($_POST["l_name"]);
$gender1=trim($_POST["gender"]);
$dob1=trim($_POST["dob"]);
$add1=trim($_POST["add"]);
$city1=trim($_POST["city"]);
$pincode1=trim($_POST["pincode"]);
$m_no1=trim($_POST["m_no"]);


if (!empty($_POST["f_name"]))
{
    include("database.php");
    $sql = "UPDATE registration SET f_name='$f_name1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;    
}
if(!empty($_POST["l_name"]))
{
    include("database.php");
    $sql = "UPDATE registration SET l_name='$l_name1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);    
    $a=4;
}
if(!empty($_POST["email"]))
{
    include("database.php");
    $sql = "UPDATE registration SET email='$email1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;
}
if(!empty($_POST["dob1"]))
{
    include("database.php");
    $sql = "UPDATE registration SET dob='$dob1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;
}
if(!empty($_POST["add"]))
{
    include("database.php");
    $sql = "UPDATE registration SET address='$add1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;
}
if(!empty($_POST["city"]))
{
    include("database.php");
    $sql = "UPDATE registration SET city='$city1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;
}
if(!empty($_POST["pincode"]))
{
    include("database.php");
    $sql = "UPDATE registration SET pincode='$pincode1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;
}
if(!empty($_POST["m_no"]))
{
    include("database.php");
    $sql = "UPDATE registration SET m_no='$m_no1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;
}
if(!empty($_POST["gender"]))
{
    include("database.php");
    $sql = "UPDATE registration SET gender='$gender1' WHERE username='$username'";
    $rs=mysqli_query($cn,$sql);
    $a=4;
}
if(!empty($_FILES["fileToUpload"]))
{
	
$filename = $_FILES["fileToUpload"]["name"];
$file_ext = substr($filename, strripos($filename, '.')); // get file name
$newfilename = $u . '.jpg';
$target_dir = "uploads/";
$target_file = $target_dir . $newfilename;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image

    /*$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {*/
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        
    $b=6;
        //echo '<script>window.location="profile.php"</script>';
        
    } else {

    	//header("Location: /profile.php");
        echo "Sorry, there was an error uploading your file.";
    }
//}
}
else{
	$a=5;
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
        <link rel="stylesheet" href="css/profile.css">

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
                                <?php
                                if(!isset($_SESSION['username']))
                                {
                                echo "<li class='nav-item'><a class='nav-item-child nav-item-hover' href='login.php'>Login</a></li>";
                                }
                                else
                                {
                                $u=(trim($_SESSION['username']));
                                	if($type=='Hacker')
                                	{
                                		echo "<li class='nav-item'><a class='nav-item-child nav-item-hover' href='profile2.php'><div class='chip'>$u<img src='uploads/$u' alt='Person' width='96' height='96'></div></a></li>";
                                	}
                                	else
                                	{
                                		echo "<li class='nav-item'><a class='nav-item-child nav-item-hover' href='profile.php'><div class='chip'>$u<img src='uploads/$u' alt='Person' width='96' height='96'></div></a></li>";
                                	}
                                }
                                ?>
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
                <h1 class="carousel-title"></h1>
                
                
              	 <div class="login">
              	 	<div class="login-header">
					
					<div class="container">
						<div class="card">
							<?php  
							echo "<img src='uploads/$u' alt='Avatar' style='border:6px groove red; border-width:4px' width='200' height='200'>";
							?>
							<div class="container">
								<?php
								echo "<h4 style='text-transform: uppercase'><b><br>$u</b></h4> 
								<p>$type</p>";
								?> 
							</div>
						</div> 
						<div class="row">
							<div class="col-md-3">
								<ul class="nav nav-pills nav-stacked admin-menu" >
									<li class="active"><a href="" data-target-id="profile"><i class="glyphicon glyphicon-user"></i> Profile</a></li>
									<li><a href="" data-target-id="change-password"><i class="glyphicon glyphicon-lock"></i> Change Password</a></li>
									<li><a href="" data-target-id="settings"><i class="glyphicon glyphicon-cog"></i> Edit Profile</a></li>
									<li><a href="" data-target-id="logout"><i class="glyphicon glyphicon-log-out"></i> Logout</a></li>
								</ul>
							</div>
                            <div class='panel-heading'>
								<h3 class='panel-title'>
									<label for='new_password' class=''control-label panel-title'>
									<?php
										if($a==2)
											{  
												echo "Confirm Password Not Matched";
											}
										elseif($a==3)
											{
												echo "Successfully Password Changed";
											}
										elseif($a==4)
											{
												echo "Update Successfully Done";
											}
										elseif($a==5)
											{
												echo "Update Cancelled";
											}
										if ($b==6) 
											{
												echo "<br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been Uploaded.";
											}
									?>
									</label>
								</h3>
							</div>
							<div class="col-md-9  admin-content" id="profile">
								<div class="panel panel-info" style="margin: 1em;">
									<div class="panel-heading">
										<h3 class="panel-title">Name</h3>
									</div>
									<?php
										echo "<div class='panel-body badge'>
												<b style='text-transform: capitalize'>$f_name $l_name</b>
												</div>";
									?>
								</div>
								<div class="panel panel-info" style="margin: 1em;">
									<div class="panel-heading">
										<h3 class="panel-title">Email</h3>
									</div>
									<?php
										echo "<div class='panel-body badge'>
												$email
												</div>";
									?>
								</div>
								<div class="panel panel-info" style="margin: 1em;">
									<div class="panel-heading">
										<h3 class="panel-title">Gender</h3>
									</div>
									<?php
										echo "<div class='panel-body badge'>
												$gender
												</div>";
									?>
								</div>
								<div class="panel panel-info" style="margin: 1em;">
									<div class="panel-heading">
										<h3 class="panel-title">Date Of Birth</h3>
									</div>
									<?php
										echo "<div class='panel-body badge'>
											$dob
											</div>";
									?>
								</div>
								<div class="panel panel-info" style="margin: 1em;">
									<div class="panel-heading">
										<h3 class="panel-title">Addresh</h3>
									</div>
									<?php
										echo "<div class='panel-body badge' style='text-transform: capitalize'>
												$add,<br>
												$city,<br>
												pincode-$pincode
											</div>"
									?>
								</div>
								<div class="panel panel-info" style="margin: 1em;">
									<div class="panel-heading">
										<h3 class="panel-title">Mobile No</h3>
									</div>
									<?php
										echo "<div class='panel-body badge'>
												$m_no
											</div>"
									?>
								</div>
                

							</div>

							<div class="col-md-9  admin-content" id="settings">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="f_name" class="control-label panel-title">First Name</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
												<?php
													echo "<input style='text-transform: capitalize' type='text' class='form-control' name='f_name' id='f_name' value='$f_name'>";
												?>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="l_name" class="control-label panel-title">Last Name</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
													<?php
														echo "<input style='text-transform: capitalize' type='text' class='form-control' name='l_name' id='l_name' value='$l_name'>";
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="email" class="control-label panel-title">Email</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
													<?php
														echo "<input style='text-transform: capitalize' type='email' class='form-control' name='email' id='email' value='$email'>";
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="dob" class="control-label panel-title">Date Of Birth</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
												<?php
													echo "<input style='text-transform: capitalize' type='Date' class='form-control' name='dob' id='dob' value='$dob'>";
												?>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="address" class="control-label panel-title">Addresh</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
													<?php
														echo "<input style='text-transform: capitalize' type='text' class='form-control' name='add' id='add' value='$add'>";
													?>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="city" class="control-label panel-title">City</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
												<?php
													echo "<input style='text-transform: capitalize' type='text' class='form-control' name='city' id='city' value='$city'>";
												?>
												</div>
											</div>
										</div>

									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="pincode" class="control-label panel-title">Pincode</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
												<?php
													echo "<input style='text-transform: capitalize' type='text' class='form-control' name='pincode' id='pincode' value='$pincode'>";
												?>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="m_no" class="control-label panel-title">Mobile No</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
												<?php
													echo "<input style='text-transform: capitalize' type='text' class='form-control' name='m_no' id='m_no' value='$m_no'>";
												?>
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="m_no" class="control-label panel-title">Gender</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
												<div style="text-transform: capitalize"><input type="radio" name="gender" id="gender" value="Male" <?php if($gender == 'Male') { echo 'checked'; }?>>
													<label class="">Male</label>
													<input type="radio" name="gender" id="gender" value="Female" <?php if($gender == 'Female') { echo 'checked'; }?>>
													<label class=''>Female</label></div>;
												
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="m_no" class="control-label panel-title">Profile Picture</label></h3>
										</div>
										<div class="panel-body">	
											<div class="form-group">
												<div class="col-sm-10">
													<input  type="file" class="panel-body control-label" style="background-color: red; " name="fileToUpload" id="fileToUpload">
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info border" style="margin: 1em;">
										<div class="panel-body">
											<div class="form-group">
												<div class="pull-left">
													<input type="submit" class="form-control btn btn-primary" name="submit1" id="submit1" style="background-color: red; text-decoration-color: white;">
												</div>
											</div>
										</div>
									</div>
   								</form>
							</div>
							<div class="col-md-9  admin-content" id="change-password">
								<form method="post">        
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="new_password" class="control-label panel-title">New Password</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
													<input type="password" class="form-control" name="password" id="password" >
												</div>
											</div>
										</div>
									</div>
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title"><label for="confirm_password" class="control-label panel-title">Confirm password</label></h3>
										</div>
										<div class="panel-body">
											<div class="form-group">
												<div class="col-sm-10">
													<input type="password" class="form-control" name="confirm_password" id="confirm_password" >
												</div>
											</div>
										</div>
									</div>

           
									<div class="panel panel-info border" style="margin: 1em;">
										<div class="panel-body">
											<div class="form-group">
												<div class="pull-left">
													<input type="submit" class="form-control btn btn-primary" name="submit" id="submit" style="background-color: red; text-decoration-color: white;">
												</div>
											</div>
										</div>
									</div>

								</form>
							</div>

							
								<div class="col-md-9  admin-content" id="logout">
									<div class="panel panel-info" style="margin: 1em;">
										<div class="panel-heading">
											<h3 class="panel-title">Confirm Logout</h3>
										</div>
										<div class="panel-body">
											Do you really want to logout ?  
											<a  href="logout.php" class="label label-danger">
												<span >   Yes   </span>
											</a>    
											<a href="profile.php" class="label label-success"> <span >  No   </span></a>
										</div>
										<form id="logout-form" action="#" method="POST" style="display: none;">
										</form>
									</div>
								</div>
						</div>
					</div>
					</div>
				</div>
			</div>
		</div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Contact List -->
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
		<script  src="js/index1.js"></script>
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>
        <script src="js/components/gmap.min.js" type="text/javascript"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBsXUGTFS09pLVdsYEE9YrO2y4IAncAO2U&amp;callback=initMap" async defer></script>
        <style>
            .card {
    box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    transition: 0.3s;
    border-radius: 5px; /* 5px rounded corners */
}

/* Add rounded corners to the top left and the top right corner of the image */
img {
    border-radius: 0px 0px 0 0;
}
        </style>
<script type="text/javascript">


         $(document).ready(function()
      {
        var navItems = $('.admin-menu li > a');
        var navListItems = $('.admin-menu li');
        var allWells = $('.admin-content');
        var allWellsExceptFirst = $('.admin-content:not(:first)');
        allWellsExceptFirst.hide();
        navItems.click(function(e)
        {
            e.preventDefault();
            navListItems.removeClass('active');
            $(this).closest('li').addClass('active');
            allWells.hide();
            var target = $(this).attr('data-target-id');
            $('#' + target).show();
        });
        });
</script>
    </body>
    <!-- END BODY -->
</html>