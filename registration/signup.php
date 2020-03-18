<?php
	include 'database.php';
?>

	<html lang="en" >
	<head>
	  <meta charset="UTF-8">
	  <title>Registration Form</title>
	  
	      <link rel="stylesheet" href="css/style.css">
	  
	</head>
	<body>

	  	







	<form action="login.php" method="post">
	  <h2>Sign Up</h2>
	  		<p>
	  			<label for="username" class="floatLabel">UserName</label>
	  			<input name="username" type="text" required>
	  		</p>
			<p>
				<label for="Email" class="floatLabel">Email</label>
				<input name="Email" type="text" required>
			</p>
			<p>
				<label for="password" class="floatLabel">Password</label>
				<input name="password" type="password" required>
				<span>Enter a password longer than 8 characters</span>
			</p>
			<p>
				<label for="confirm_password" class="floatLabel">Confirm Password</label>
				<input name="confirm_password" type="password" required>
			</p>
			<p>
				<input type="submit" value="Create My Account" name="submit">
			</p>
			<p><h3>Already A Member<a href="login.php">CLICK HERE....</a></h3></p>
		</form>




















	  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

	    <script  src="js/index.js"></script>

	</body>

	</html>
