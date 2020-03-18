<?PHP
session_start();
if (!isset($_SESSION['username']))
        {
            header("Location: login.php");
        }
?>
<? php
include("/database.php");
$username=(trim($_SESSION['username']));
$email=trim($_POST["email"]);
$f_name=trim($_POST["f_name"]);
$l_name=trim($_POST["l_name"]);
$gender=trim($_POST["gender"]);
$dob=trim($_POST["dob"]);
$add=trim($_POST["add"]);
$city=trim($_POST["city"]);
$pincode=trim($_POST["pincode"]);
$m_no=trim($_POST["m_no"]);
function f_name(){
    		var_dump($_POST);
		if (isset($_POST["f_name"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET f_name='$f_name' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);    
		}
}
function l_name(){
		if(!empty($_POST["l_name"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET l_name='$l_name' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);    
		}
}
function email(){		
		if(!empty($_POST["email"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET email='$email' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);
		}
}
function dob(){
		if(!empty($_POST["dob"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET dob='$dob' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);
		}
}
function add(){
		if(!empty($_POST["add"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET address='$add' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);
		}
}
function city(){
		if(!empty($_POST["city"]))
		{
   			include("database.php");
    		$sql = "UPDATE registration SET city='$city' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);
		}
}
function pincode(){
		if(!empty($_POST["pincode"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET pincode='$pincode' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);
		}
}
function m_no(){
		if(!empty($_POST["m_no"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET m_no='$m_no' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);
		}
}
function gender(){
		if(!empty($_POST["gender"]))
		{
    		include("database.php");
    		$sql = "UPDATE registration SET gender='$gender' WHERE username='$username'";
    		$rs=mysqli_query($cn,$sql);
		}
}