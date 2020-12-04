<?php  

	include('sessions.php');
	session_start();
	$_SESSION['user'] = "";
	$_SESSION['user_type'] = "";
	header('location:index.php');
?>