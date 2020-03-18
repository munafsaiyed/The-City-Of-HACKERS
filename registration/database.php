<?php
	session_start();
	$db = mysqli_connect('localhost','root','0078','registration');
	
	if (isset($_POST['submit'])) {
		
		$username = $_POST['username'];
		$email = $_POST['Email'];
		$password = $_POST['password'];
		$confirm_password = $_POST['confirm_password'];

		if ($password == $confirm_password) {
			$password = md5($password);
			$sql = "INSERT INTO user (username,email,password) VALUES('$username','$email','$password')";

			mysqli_query($db,$sql);
			header("location:login.php");
		}	
		else{
		   $error = "PassWord Did Not Match .!.";
		 
		}
	}
?>