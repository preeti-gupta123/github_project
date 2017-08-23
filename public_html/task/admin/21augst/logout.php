<?php
session_start();

	unset($_SESSION['user']);
	unset($_SESSION['role']);
	unset($_SESSION['msg_user']);
	unset($_SESSION['cart']);
	unset($_SESSION['total_qty']);
	unset($_SESSION['total_amount']);
	$_SESSION=[];
	session_destroy();
	header("Location:login.php");
	
?>