<?php
$id = $_REQUEST["varname"];
include("../database.php");
$rs=mysqli_query($cn,"DELETE FROM query_form WHERE q_id=$id");
header("Location: /admin/query.php");
?>