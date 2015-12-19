<?php
$host="localhost"; //replace with database hostname 
$username="root"; //replace with database username 
$password=""; //replace with database password 
$db_name="recommendationengine"; //replace with database name

$con=mysqli_connect("$host", "$username", "$password","$db_name"); 
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  } else
	  echo "connected";
mysqli_select_db($con,"$db_name");
?>
