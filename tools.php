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
        <link href="vendor/swiper/css/swiper.min.css" rel="stylesheet" type="text/css"/>

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
                                <li class="nav-item"><a class="nav-item-child nav-item-hover active" href="tools.php">Tools</a></li>
                                <li class="nav-item"><a class="nav-item-child nav-item-hover" href="Study.php">Study</a></li>
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
                <h1 class="carousel-title">TOOLS</h1>
                <p>In this page it provide latest tools which provide best work.<br/> And this provide almost all type of tools.</p>
            </div>
        </div>
        <!--========== PARALLAX ==========-->

        <!--========== PAGE LAYOUT ==========-->
        <!-- Our Exceptional Solutions -->
        <div class="content-lg container">
            <div class="row margin-b-40">
                <div class="col-sm-6">
                    <h2>Our Best Hacking Tools</h2>
                    <p>This all tools are the best hacking tools which are used for penetration testing. In this there is Some hacking operating systems are also there.</p>
                </div>
            </div>
            <!--// end row -->

            <div class="row margin-b-50">
                <!-- Our Exceptional Solutions -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/01.jpg" alt="Our Exceptional Solutions Image">
                        </div>
                    </div>
                    <h3><a href="#">Kali Linux</a> <span class="text-uppercase margin-l-20">Rs750</span></h3>
                    <p>Kali Linux is a Debian-derived Linux distribution designed for digital forensics and penetration testing. It is maintained and funded by Offensive Security Ltd. Mati Aharoni, Devon Kearns and Raphaël Hertzog are the core developers.</p>
                    <a class="link" href="#">Buy</a>
                </div>
                <!-- End Our Exceptional Solutions -->

                <!-- Our Exceptional Solutions -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/02.jpg" alt="Our Exceptional Solutions Image">
                        </div>
                    </div>
                    <h4><a href="#">Backtrack</a> <span class="text-uppercase margin-l-20">Rs500</span></h4>
                    <p>BackTrack was a Linux distribution that focused on security, based on the Knoppix Linux distribution aimed at digital forensics and penetration testing use. In March 2013, the Offensive Security team rebuilt BackTrack around the Debian distribution and released it under the name, Its a hacking OS Kali Linux.</p>
                    <a class="link" href="#">Buy</a>
                </div>
                <!-- End Our Exceptional Solutions -->

                <!-- Our Exceptional Solutions -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/03.jpg" alt="Our Exceptional Solutions Image">
                        </div>
                    </div>
                    <h4><a href="#">ParrotSec</a> <span class="text-uppercase margin-l-20">Rs450</span></h4>
                    <p>Parrot Security OS (or ParrotSec) is a Linux distribution based on Debian with a focus on computer security. It is designed for penetration testing, vulnerability assessment and mitigation, computer forensics and anonymous web browsing. It is developed by the Frozenbox Team.</p>
                    <a class="link" href="#">Buy</a>
                </div>
                <!-- End Our Exceptional Solutions -->
            </div>
            <!--// end row -->

            <div class="row">
                <!-- Our Exceptional Solutions -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/04.png" alt="Our Exceptional Solutions Image">
                        </div>
                    </div>
                    <h4><a href="#">Wifislax</a> <span class="text-uppercase margin-l-20">Rs400</span></h4>
                    <p>Cracking a wireless network is defeating the security of a wireless local-area network (wireless LAN). A commonly used wireless LAN is a Wi-Fi network. Wireless LANs have inherent security weaknesses from which wired networks are exemp.</p>
                    <a class="link" href="#">Buy</a>
                </div>
                <!-- End Our Exceptional Solutions -->

                <!-- Our Exceptional Solutions -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/05.jpg" alt="Our Exceptional Solutions Image">
                        </div>
                    </div>
                    <h4><a href="#">Tor Browser</a> <span class="text-uppercase margin-l-20">Rs100</span></h4>
                    <p>Tor is free software for enabling anonymous communication. The name is derived from an acronym for the original software project name "The Onion Router.</p>
                    <a class="link" href="#">Buy</a>
                </div>
                <!-- End Our Exceptional Solutions -->

                <!-- Our Exceptional Solutions -->
                <div class="col-sm-4 sm-margin-b-50">
                    <div class="margin-b-20">
                        <div class="wow zoomIn" data-wow-duration=".3" data-wow-delay=".1s">
                            <img class="img-responsive" src="img/970x647/06.png" alt="Our Exceptional Solutions Image">
                        </div>
                    </div>
                    <h4><a href="#">BlueBorne</a> <span class="text-uppercase margin-l-20">Rs3500</span></h4>
                    <p>BlueBorne allows attackers to take control of devices, access corporate data and networks, penetrate secure “air-gapped” networks, and spread malware laterally to adjacent devices.</p>
                    <a class="link" href="#">Buy</a>
                </div>
                <!-- End Our Exceptional Solutions -->
            </div>
            <!--// end row -->
        </div>
        <!-- End Our Exceptional Solutions -->

        <!-- Clients -->
        <div class="bg-color-sky-light">
            <div class="content-lg container">
                <!-- Swiper Clients -->
                <div class="swiper-slider swiper-clients">
                    <!-- Swiper Wrapper -->
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/01.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/02.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/03.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/04.png" alt="Clients Logo">
                        </div>
                        <div class="swiper-slide">
                            <img class="swiper-clients-img" src="img/clients/05.png" alt="Clients Logo">
                        </div>
                    </div>
                    <!-- End Swiper Wrapper -->
                </div>
                <!-- End Swiper Clients -->
            </div>
        </div>
        <!-- End Clients -->

        <!-- Promo Section -->
       
        <!-- End Promo Section -->
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
        <script src="vendor/swiper/js/swiper.jquery.min.js" type="text/javascript"></script>

        <!-- PAGE LEVEL SCRIPTS -->
        <script src="js/layout.min.js" type="text/javascript"></script>
        <script src="js/components/wow.min.js" type="text/javascript"></script>
        <script src="js/components/swiper.min.js" type="text/javascript"></script>

    </body>
    <!-- END BODY -->
</html>