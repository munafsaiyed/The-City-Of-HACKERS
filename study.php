<?php
session_start();
include("/database.php");
?>
<?php

     if(isset($_SESSION['username']))
    {
    include("database.php");
    $u=(trim($_SESSION['username']));
    $rs=mysqli_query($cn,"select * from registration where username='$u'") or die(mysqli_error($cn));
    $row = mysqli_fetch_array($rs);
    $type=$row['type'];   
}
$path = "material/"; 
$latest_ctime = 0;
$latest_filename = '';    
$d = dir($path);
while (false !== ($entry = $d->read())) 
{
    $filepath = "{$path}/{$entry}";
    // could do also other checks than just checking whether the entry is a file
    if (is_file($filepath) && filectime($filepath) > $latest_ctime) 
    {
        $latest_ctime = filectime($filepath);
        $latest_filename = $entry;
    }
}
$i=$latest_filename;
//$j=0;
$k=0;
include("database.php");
$rs=mysqli_query($cn,"select * from course") or die(mysqli_error($cn));
$array = mysqli_fetch_all($rs);
    $row = json_encode($array[0][3]);
    
if(isset($_POST["submit"]))
    {
        
        include("/database.php");
        $name=trim($_POST["name"]);
        $email=trim($_POST["email"]);
        $phone=trim($_POST["phone"]);
        $message=trim($_POST["message"]);
        $rs=mysqli_query($cn,"insert into query_form(name,email,phone,message) values('$name','$email','$phone','$message')");
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
                                <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="study.php">Study</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="contact.php">Contact</a></li>
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
                <h1 class="carousel-title">Study</h1>
                <p>This page provides all the latest posts or course material uploaded  <br/> by Certified Ethical Hackers. </p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Service -->
        <div class="bg-color-sky-light" data-auto-height="true">
            <div class="content-lg container">
                <div class="row row-space-1 margin-b-2">
                    <?php
                        if(isset($array[0][0]))
                        {
                echo "<div class='col-sm-6 sm-margin-b-2'>
                        <div class='wow fadeInLeft' data-wow-duration='.3' data-wow-delay='.2s'>
                            <div class='service' data-height='height'>
                                
                                
                        <h3 style='text-transform: capitalize'>by ".substr((json_encode($array[0][1])),1,-1); echo "</h3>
                                <img class='img-responsive' src='material/".substr((json_encode($array[0][2])),1,-1); echo "' height='500px' width='400px' alt='Our Office'><br>
                                <p class='margin-b-5' style='text-transform: capitalize'>".substr((json_encode($array[0][3])),1,-1); echo "</p>
                                <a href='#' class='content-wrapper-link'></a>
                                        
                            </div>
                        </div>
                    </div>";
                }
                ?>
                    <?php
                        if(isset($array[1][0]))
                        {
                  echo  "<div class='col-sm-6'>
                        <div class='wow fadeInLeft' data-wow-duration='.3' data-wow-delay'.1s'>
                            <div class='service' data-height='height'>
                                
                                <h3 style='text-transform: capitalize'>by ".substr((json_encode($array[1][1])),1,-1); echo "</h3>
                                <img class='img-responsive' src='material/".substr((json_encode($array[1][2])),1,-1); echo "' height='500px' width='400px' alt='Our Office'><br>
                                <p class='margin-b-5' style='text-transform: capitalize'>".substr((json_encode($array[1][3])),1,-1); echo"</p>
                                <a href='#' class='content-wrapper-link'></a>    
                            
                            </div>
                        </div>
                    </div>
                </div>";
            }
            ?>
                <!--// end row -->
                <?php
                        if(isset($array[2][0]))
                        {
         echo "<div class='row row-space-1 margin-b-2'>
                    <div class='col-sm-6 sm-margin-b-2'>
                        <div class='wow fadeInLeft' data-wow-duration='.3' data-wow-delay='.3s'>
                            <div class='service' data-height='height'>
                                <h3 style='text-transform: capitalize'>by ".substr((json_encode($array[2][1])),1,-1); echo "</h3>
                                <img class='img-responsive' src='material/".substr((json_encode($array[2][2])),1,-1); echo "' height='500px' width='400px' alt='Our Office'><br>
                                <p class='margin-b-5' style='text-transform: capitalize'>".substr((json_encode($array[2][3])),1,-1); echo "</p>
                                <a href='#' class='content-wrapper-link'></a>    
                            </div>
                        </div>
                    </div>";
                }
                ?>
                    <?php
                        if(isset($array[3][0]))
                        {
               echo  "<div class='col-sm-6'>
                        <div class='wow fadeInLeft' data-wow-duration='.3' data-wow-delay='.2s'>
                            <div class='service' data-height='height'>
                                <h3 style='text-transform: capitalize'>by ".substr((json_encode($array[3][1])),1,-1);echo "</h3>
                                <img class='img-responsive' src='material/".substr((json_encode($array[3][2])),1,-1); echo "' height='500px' width='400px' alt='Our Office'><br>
                                <p class='margin-b-5' style='text-transform: capitalize'>".substr((json_encode($array[3][3])),1,-1); echo "</p>
                                <a href='#' class='content-wrapper-link'></a>    
                            </div>
                        </div>
                    </div>
                </div>";
            }
            ?>
                <!--// end row -->
                <?php
                        if(isset($array[4][0]))
                        {
           echo   "<div class='row row-space-1'>
                    <div class='col-sm-6 sm-margin-b-2'>
                        <div class='wow fadeInLeft' data-wow-duration='.3' data-wow-delay='.4s'>
                            <div class='service' data-height='height'>
                                <h3 style='text-transform: capitalize'>by ".substr((json_encode($array[4][1])),1,-1);echo "</h3>
                                <img class='img-responsive' src='material/".substr((json_encode($array[4][2])),1,-1);echo "'height='500px' width='400px' alt='Our Office'><br>
                                <p class=''margin-b-5' style='text-transform: capitalize'>".substr((json_encode($array[4][3])),1,-1); echo "</p>
                                <a href='#' class='content-wrapper-link'></a>    
                            </div>
                        </div>
                    </div>";
                    }
                    ?>
                        <?php
                        if(isset($array[5][0]))
                        {
                            
               echo "<div class='col-sm-6'>
                        <div class='wow fadeInLeft' data-wow-duration='.3' data-wow-delay='.3s'>
                            <div class='service' data-height='height'>
                                <h3 style='text-transform: capitalize'>by ".substr((json_encode($array[5][1])),1,-1);echo "</h3>
                                <img class='img-responsive' src='material/".substr((json_encode($array[5][2])),1,-1); echo "' height='700px' width='400px' alt='Our Office'><br>
                                <p class='margin-b-5' style='text-transform: capitalize'>".substr((json_encode($array[5][3])),1,-1);echo "</p>
                                <a href='#' class='content-wrapper-link'></a>    
                            </div>
                        </div>
                    </div>";
                }
                ?>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Service -->

        <!-- General Questions -->
       
        <!-- End General Questions -->

        <!-- Pricing -->
        <div class="bg-color-sky-light">
            <div class="content-lg container">
                <div class="row row-space-1">
                    <div class="col-sm-4 sm-margin-b-2">
                        <div class="wow fadeInLeft" data-wow-duration=".3" data-wow-delay=".1s">
                            <!-- Pricing -->
                            <div class="pricing">
                                 <div class="margin-b-30">
                                    <i class="pricing-icon icon-chemistry"></i>
                                    <h3>Starter Kit <span> - $</span> FREE</h3>
                                    <p>This Package Is Only For Demo</p>
                                </div>
                                <ul class="list-unstyled pricing-list margin-b-50">
                                    <li class="pricing-list-item">Basic Features</li>
                                    <li class="pricing-list-item">No Discounts</li>
                                    <li class="pricing-list-item">No Certification </li>
                                </ul>
                                <a href="pricing.php" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Choose</a>
                            </div>
                            <!-- End Pricing -->
                        </div>
                    </div>
                    <div class="col-sm-4 sm-margin-b-2">
                        <div class="wow fadeInUp" data-wow-duration=".3" data-wow-delay=".2s">
                            <!-- Pricing -->
                            <div class="pricing pricing-active">
                                <div class="margin-b-30">
                                    <i class="pricing-icon icon-badge"></i>
                                    <h3>Professional <span> - $</span> 49</h3>
                                    <p>This Package Is Limited</p>
                                </div>
                                <ul class="list-unstyled pricing-list margin-b-50">
                                    <li class="pricing-list-item">Basic Features</li>
                                    <li class="pricing-list-item">20% Discounts On Tools</li>
                                    <li class="pricing-list-item">Certification </li>
                                </ul>
                                <a href="pricing.php" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Choose</a>
                            </div>
                            <!-- End Pricing -->
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="wow fadeInRight" data-wow-duration=".3" data-wow-delay=".1s">
                            <!-- Pricing -->
                            <div class="pricing">
                                <div class="margin-b-30">
                                    <i class="pricing-icon icon-shield"></i>
                                    <h3>Advanced <span> - $</span> 149</h3>
                                    <p>This Package Provide Totally Knowledge</p>
                                </div>
                                <ul class="list-unstyled pricing-list margin-b-50">
                                    <li class="pricing-list-item">Extended Features</li>
                                    <li class="pricing-list-item">50% Discount On Tools</li>
                                    <li class="pricing-list-item">Certificate</li>
                                </ul>
                                <a href="pricing.php" class="btn-theme btn-theme-sm btn-default-bg text-uppercase">Choose</a>
                            </div>
                            <!-- End Pricing -->
                        </div>
                    </div>
                </div>
                <!--// end row -->
            </div>
        </div>
        <!-- End Pricing -->
        <!--========== END PAGE LAYOUT ==========-->

        <!--========== FOOTER ==========-->
        <footer class="footer">
            <!-- Links -->
            <div class="footer-seperator">
                <div class="content-lg container">
                    <div class="row">
                        <div class="col-sm-2 sm-margin-b-50">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a class="footer-list-link" href="index.php">Home</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="pricing.php">Pricing</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="about.php">About</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="tools.php">Tools</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="study.php">Study</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="contact.php">Contact</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                        <div class="col-sm-4 sm-margin-b-30">
                            <!-- List -->
                            <ul class="list-unstyled footer-list">
                                <li class="footer-list-item"><a class="footer-list-link" href="http://www.twitter.com">Twitter</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="http://www.facebook.com">Facebook</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="http://www.instagram.com">Instagram</a></li>
                                <li class="footer-list-item"><a class="footer-list-link" href="http://www.youtube.com">YouTube</a></li>
                            </ul>
                            <!-- End List -->
                        </div>
                        <div class="col-sm-5 sm-margin-b-30">
                            <form method="post" action="#">
                            <h2 class="color-white">Send Us A Note</h2>
                            <input type="text" name="name" id="name" class="form-control footer-input margin-b-20" placeholder="Name" required>
                            <input type="email" name="email" id="email" class="form-control footer-input margin-b-20" placeholder="Email" required>
                            <input type="text" name="phone" id="phone" class="form-control footer-input margin-b-20" placeholder="Phone" required>
                            <textarea class="form-control footer-input margin-b-30" name="message" id="message" rows="6" placeholder="Message" required></textarea>
                            <button type="submit" id="submit" name="submit" class="btn-theme btn-theme-sm btn-base-bg text-uppercase" value="submit">Submit</button>
                        </form>
                        </div>
                    </div>
                    <!--// end row -->
                </div>
            </div>
            <!-- End Links -->

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

    </body>
    <!-- END BODY -->
</html>