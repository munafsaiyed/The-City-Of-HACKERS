<?php
$id = $_REQUEST["varname"];
include("../database.php");
$rs=mysqli_query($cn,"DELETE FROM course WHERE cid=$id");
header("Location: /admin/course.php");
?>