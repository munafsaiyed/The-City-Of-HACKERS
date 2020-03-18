<?php
	
	$cn = mysqli_connect("localhost","root","","tcoh");
	if(mysqli_connect_errno())
	{
		echo "Failed to Connect to MySQL:".
		mysqli_connect_error();
	
	}
	
	
?>