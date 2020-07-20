<?php 

session_start();

	if (!isset($_SESSION['username_admin'])) {

		header('location:login_admin.php');
	}

	session_destroy();
	header('location:login_admin.php');


 ?>