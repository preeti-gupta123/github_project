<?php
	include("config.php");

	$user=$_POST['user'];
	$mail=$_POST['emailid'];
	$mobile=$_POST['mob_num'];
	$role=$_POST['role'];
	$pass=$_POST['password'];

	    $stmt = $conn->prepare("INSERT INTO user (username,mail,mobile_no,role,password) VALUES (?, ?, ?, ?, ?)");

		$stmt->bind_param("sssss",$table_name, $table_mail, $table_mobile,$table_role,$table_password);


		$table_name = $user;
		$table_mail =$mail;
		$table_mobile=$mobile;
		$table_role=$role;
		$table_password=$pass;

		$stmt->execute();

		header("Location:main.php");

?>