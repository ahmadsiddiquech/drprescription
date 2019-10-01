<?php
	session_start();
	if(isset($_SESSION['user_login'])){
		session_unset();
	}
	header("Location:login.php");
?>