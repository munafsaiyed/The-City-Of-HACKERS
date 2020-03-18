<?php
$id = $_REQUEST["varname"];
include("../database.php");
$rs=mysqli_query($cn,"DELETE FROM registration WHERE uid=$id");
header("Location: /admin/registration.php");
?>