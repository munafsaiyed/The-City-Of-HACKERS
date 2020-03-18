<html>
<body>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  
   <?php  if (isset($_POST['username'])) : ?>
      <p>Welcome <strong><?php echo $_POST['username']; ?></strong></p>
      <p> <a href="login.php" style="color: red;">logout</a> </p>
    <?php endif ?>
    
</body>
</html>