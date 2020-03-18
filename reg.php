<?php
function(data)
{
    $('$result').html(data);
}
<?php          echo $ip_address;
echo "<br>";
// Prints the day, date, month, year, time, AM or PM
echo date("l jS \of F Y h:i:s A") . "<br>";
echo gethostname(); ?>
include("database.php");

if($submit==$_POST["submit"] || strlen($username)>0){
$username=trim($_POST["username"]);
$email=trim($_POST["email"]);
$f_name=trim($_POST["f_name"]);
$l_name=trim($_POST["l_name"]);
$dob=trim($_POST["dob"]);
$add=trim($_POST["add"]);
$city=trim($_POST["city"]);
$pincode=trim($_POST["pincode"]);
$m_no=trim($_POST["m_no"]);
$type=trim($_POST["type"]);
$password=trim($_POST["password"]);

//$rs=mysql_query("select * from registration where id='$username'");

	//include("../database.php");
	mysql_query("insert into registration(username,email,f_name,l_name,dob,add,city,pincode,m_no,type,password) values ('$username','$email','$f_name','$l_name','$dob','$add','$city','$pincode','$m_no','$type','$password')",$cn) or die(mysql_error());
	echo "<p class='ms1'>Added Successfully.</p>";		
		$submit="";
	

}
?>18008969999