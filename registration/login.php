<?php
	include 'database.php';
?>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Login Form</title>
  
      <link rel="stylesheet" href="css/style.css">
  
</head>
<body>

<form action="index.php" method="post">
  <h2>Log-In</h2>
  		<p>
  			<label for="username" class="floatLabel">UserName</label>
  			<input name="username" type="text" required>
  		</p>
		<p>
			<label for="password" class="floatLabel">Password</label>
			<input name="password" type="password" required>
		</p>
		<p>
			<input type="submit" value="Sign_In" name="submit">
		</p>
		<p><h3>Not Yet Member<a href="signup.php">CLICK HERE....</a></h3></p>
	</form>

  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="js/index.js"></script>

</body>

</html>
