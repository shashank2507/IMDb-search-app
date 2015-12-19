<?php
include('header.php');
session_start();

//Access form variables
$id=$_POST['id'];
$password=$_POST['password'];
echo $password;
//if($id>943)
$password=md5($_POST['password']);

$query="select * from user";
$result = mysqli_query($con,$query);
$temp=mysqli_num_rows($result);
$_SESSION['users']=$temp;

$query="select * from user where name = '$id' and password = '$password'";
$result = mysqli_query($con,$query);
if(mysqli_num_rows($result) == 1)
{
	$_SESSION['uid']=$id;
	//session_write_close();
	header('Location: dashboard.php');
}
else
	header('Location: false.php');
	//echo $password;
?>
