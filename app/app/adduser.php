<?php
include('header.php');

$name=$_POST['name'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$age=$_POST['age'];
$gender=$_POST['gender'];
$query="insert into user(name,password,email,age,gender) values('$name','$password','$email','$age','$gender')";
echo $query.'<br />';
mysqli_query($con,$query);
$id=$name;
echo $id;
mysqli_close($con);

header("Location: index.php?uid=$name");
//echo($id);
?>