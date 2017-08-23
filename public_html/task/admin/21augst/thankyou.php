<?php
session_start();
unset($_SESSION['username']);
	unset($_SESSION['role']);
	$_SESSION = [];
	session_destroy();
	header("Location:login.php");
		


  echo "<a style='color:black; font-size:30px; margin:10% 40%' href='task13.php'>Back to HOME..</a>";
       unset($_SESSION['cart']);

?>
 