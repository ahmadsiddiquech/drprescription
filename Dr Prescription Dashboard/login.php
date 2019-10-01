<?php
if(isset($_POST['login'])){
	include "dbConnection.php";
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($conn,"SELECT *  FROM registered WHERE username = '$username' and password = '$password'") or die('Error');
	$count=mysqli_num_rows($result);
	if($count==1){
		session_start();
		$_SESSION['user_login'] = $username;
		header("Location: index.php");
	}else{
		echo "<script>alert('Invalid Username or Password');</script>";
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
<div class="wrapper">
	<form class="form-signin" method="POST" action="">       
		<h2 class="form-signin-heading">Please login</h2>
		<input type="text" class="form-control" name="username" placeholder="User Name" required="" autofocus="" />
		<br>
		<input type="password" class="form-control" name="password" placeholder="Password" required="">
		<br>
		<button class="btn btn-lg btn-primary btn-block" type="submit" name="login">Login</button>   
	</form>
</div>
</body>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</html>