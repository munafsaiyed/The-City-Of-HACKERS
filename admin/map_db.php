<?PHP
session_start();
if (!isset($_SESSION['username']))
        {
            header("Location: ../admin.php");
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Course Details</title>
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
                    <li class="active">
                        <a href="../admin/map_db.php">
                            <i class="now-ui-icons location_map-big"></i>
                            <p>User Location</p>
                        </a>
                    </li>
                    <?php
                    if(($_SESSION['username'])=="munafsaiyed")
                    {
                       echo "<li>
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
                        <a class="navbar-brand" href="#pablo">Table List</a>
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
                            <li class="nav-item">
                                
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="now-ui-icons users_single-02"></i>
                                    <p>
                                        <span class="d-lg-none d-md-block">Some Actions</span>
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="/admin/user.php">Profile</a>
                                    <a class="dropdown-item" href="/admin/logout.php">Logout</a>
                                   
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
                    <div class="col-md-12">
                        <div class="card" >
                            <div class="card-header">
                                <h4 class="card-title"> Messages</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class=" text-primary">
                                            <th>
                                                id
                                            </th>
                                            <th>
                                                Ip_Address
                                            </th>
                                            <th>
                                                Hostname
                                            </th>
                                            <th>
                                                Date
                                            </th>
                                            <th>
                                                Time
                                            </th>
                                            <th>
                                                Latitude
                                            </th>
                                            <th>
                                                Longitude
                                            </th>

                                            <th>
                                                Trace
                                            </th>
                                            <th class="text-right">
                                                Action
                                            </th>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("../database.php");
                                            $rs=mysqli_query($cn,"select * from trackingg") or die(mysqli_error($cn));
                                            
                                            while($row = mysqli_fetch_array($rs)) {
                                             
                                        echo  "<tr>
                                                <td>",$row['id'];
                                           echo "</td>
                                                <td>",$row['ip'];
                                           echo "</td>
                                                <td>",$row['hostname'];
                                           echo "</td>
                                                <td >",$row['date'];
                                            echo "</td>
                                                <td>",$row['time'];
                                           echo "</td>
                                                <td >",$row['lat'];
                                            echo "</td>
                                                <td>",$row['lon'];
                                           echo "</td>";
                                                
                                           echo "<td class='text-right'><a href='map.php?varname=";
                                                echo $row['id']; echo "'><input type='submit' class='btn btn-primary btn-block' name='",$row['id'];echo "' value='Locate'></a></td><td class='text-right'><a href='del_map.php?varname=";
                                                echo $row['id']; echo "'><input type='submit' class='btn btn-primary btn-block' name='s",$row['id'];echo "' value='Delete'></a>
                                                </td>
                                            </tr>";
                                        }
                                            ?>
                                           
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        
                    </nav>
                   
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
