<?PHP
session_start();
if (!isset($_SESSION['username']))
        {
            header("Location: ../admin.php");
        }
?>
<?php

    $a=0;
    include("../database.php");
    $u=(trim($_SESSION['username']));
    $rs1=mysqli_query($cn,"select * from adminmaster where username='$u'") or die(mysqli_error($cn));
     $row = mysqli_fetch_array($rs1);
     $f_name1=$row['f_name'];
    $l_name1=$row['l_name'];
if(isset($_POST['submit']))
{
$username=trim($_POST["username"]);
$email=trim($_POST["email"]);
$f_name=trim($_POST["f_name"]);
$l_name=trim($_POST["l_name"]);
$addresh=trim($_POST["addresh"]);
$city=trim($_POST["city"]);
$country=trim($_POST["country"]);
$pincode=trim($_POST["pincode"]);
$about=trim($_POST["about"]);
$pass=trim($_POST["password"]);
include("../database.php");
$rs=mysqli_query($cn,"insert into adminmaster(username,email,f_name,l_name,addresh,city,country,pincode,about,password) values('$username','$email','$f_name','$l_name','$addresh','$city','$country','$pincode','$about','$pass')") or die(mysqli_error($cn));
    
 }   

                              
    ?>
<!DOCTYPE html>
<html lang="en">

<head >
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/now-ui-dashboard.css?v=1.0.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="">
    <div class="wrapper ">
        <div class="sidebar" data-color="orange">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
            <div class="logo">
                <a href="../index.php" class="simple-text logo-mini">
                    
                </a>
                <a href="../index.php" class="simple-text logo-normal">
                    The City Of Hacker's
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li>
                        <a href="../admin/user.php">
                            <i class="now-ui-icons users_single-02"></i>
                            <p>User Profile</p>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/registration.php">
                            <i class="now-ui-icons files_single-copy-04"></i>
                            <p>Registration</p>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/course.php">
                            <i class="now-ui-icons ui-1_bell-53"></i>
                            <p>Course</p>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/query.php">
                            <i class="now-ui-icons design_app"></i>
                            <p>Query Form</p>
                        </a>
                    </li>
                    <li>
                        <a href="../admin/map_db.php">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>User Location</p>
                        </a>
                    </li>
                    <?php
                    if(($_SESSION['username'])=="munafsaiyed")
                    {
                       echo "<li class='active'>
                            <a href='../admin/signup.php'>
                                <i class='now-ui-icons location_map-big'></i>
                                <p>Add New Admin</p>
                            </a>
                        </li>";
                    }
                    ?>
                   
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent  navbar-absolute bg-primary fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <div class="navbar-toggle">
                            <button type="button" class="navbar-toggler">
                                <span class="navbar-toggler-bar bar1"></span>
                                <span class="navbar-toggler-bar bar2"></span>
                                <span class="navbar-toggler-bar bar3"></span>
                            </button>
                        </div>
                        <a class="navbar-brand" href="#pablo">CEO</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                        <span class="navbar-toggler-bar navbar-kebab"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <form>
                            <div class="input-group no-border">
                                <input type="text" value="" class="form-control" placeholder="Search...">
                                <span class="input-group-addon">
                                    <i class="now-ui-icons ui-1_zoom-bold"></i>
                                </span>
                            </div>
                        </form>
                        <ul class="navbar-nav">
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="user.php">Profile</a>
                                    <a class="dropdown-item" href="logout.php">Logout</a>
                                    
                                </div>
                            </li>
                           
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- End Navbar -->
            <div class="panel-header panel-header-sm">
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h5 class="title">Register New Admin</h5>
                            </div>
                            <div class="card-body">
                                <form method="post">
                                    <div class="row">
                                        <div class="col-md-5 pr-1">
                                            <div class="form-group">
                                                <label>Company (disabled)</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" value="The City Of Hacker's">
                                            </div>
                                        </div>
                                        <div class="col-md-3 px-1">
                                            <div class="form-group">
                                                <label>Username</label>
                                                <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" name="f_name" id="f_name" placeholder="Company" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" name="l_name" id="l_name" placeholder="Last Name" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" name="password" id="password" placeholder="Password" value="">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" class="form-control" name="addresh" id="addresh" placeholder="Home Address" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 pr-1">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="city" id="city" class="form-control" placeholder="City" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 px-1">
                                            <div class="form-group">
                                                <label>Country</label>
                                                <input type="text" class="form-control" name="country" id="country" placeholder="Country" value="">
                                            </div>
                                        </div>
                                        <div class="col-md-4 pl-1">
                                            <div class="form-group">
                                                <label>Postal Code</label>
                                                <input type="number" name="pincode" id="pincode" class="form-control" placeholder="ZIP Code" value="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="4" cols="80" class="form-control" name="about" id="about" placeholder="Here can be your description" value=""></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" name="submit" value="submit" id="submit" class="btn btn-primary btn-block" onclick="demo.showNotification('top','center')">
                                    <?php
                                    
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card card-user">
                            <div class="image">
                                <img src="../assets/img//bg5.jpg" alt="...">
                            </div>
                            <div class="card-body">
                                <div class="author">
                                    <a href="#">
                                        <img class="avatar border-gray" src="../assets/img//munaf.jpg" alt="...">
                                        <h5 class="title"><?php echo $f_name1," ", $l_name1; ?></h5>
                                    </a>
                                    <p class="description">
                                        
                                    </p>
                                </div>
                                <p class="description text-center">
                                    
                                </p>
                            </div>
                            <hr>
                            <div class="button-container">
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-facebook-f"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-twitter"></i>
                                </button>
                                <button href="#" class="btn btn-neutral btn-icon btn-round btn-lg">
                                    <i class="fab fa-google-plus-g"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul>
                            <li>
                                <a href="">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright">
                        &copy;
                        <script>
                            //document.write(new Date().getFullYear())
                        </script>
                        <a href="https://www.invisionapp.com" target="_blank"></a>
                        <a href="https://www.creative-tim.com" target="_blank"></a>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js"></script>
<script src="../assets/js/core/popper.min.js"></script>
<script src="../assets/js/core/bootstrap.min.js"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Google Maps Plugin    -->
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<!-- Chart JS -->
<script src="../assets/js/plugins/chartjs.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/now-ui-dashboard.js?v=1.0.1"></script>
<!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
<script src="../assets/demo/demo.js"></script>

</html>
