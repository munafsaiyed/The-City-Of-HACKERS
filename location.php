<?php
//whether ip is from share internet
if (!empty($_SERVER['HTTP_CLIENT_IP']))   
  {
    $ip_address = $_SERVER['HTTP_CLIENT_IP'];
  }
//whether ip is from proxy
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))  
  {
    $ip_address = $_SERVER['HTTP_X_FORWARDED_FOR'];
  }
//whether ip is from remote address
else
  {
    $ip_address = $_SERVER['REMOTE_ADDR'];
  }
?>
<?php
include("/database.php");
date_default_timezone_set("Asia/Kolkata");
$lat = $_REQUEST["lat"];
$lon = $_REQUEST["lon"];
$ip = $ip_address;
$host = gethostname();
$date = date("Y-m-d");
$time = date("H:i:s");
include("/database.php");
if(mysqli_query($cn,"insert into trackingg(ip,hostname,date,time,lat,lon) values('$ip','$host','$date','$time','$lat','$lon')"))
  {
        $d=".";
    mysqli_close($cn); 
  } 
else
{
  $d=".";
}
echo $d;
?>