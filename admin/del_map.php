<?php
$id = $_REQUEST["varname"];
include("../database.php");
$rs=mysqli_query($cn,"DELETE FROM trackingg WHERE id=$id");
header("Location: /admin/map_db.php");
?>