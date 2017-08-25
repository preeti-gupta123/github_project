<?php
session_start();
include 'config.php';

if(isset($_POST["register"])){


$role= "user";


$stmt = $conn->prepare("INSERT INTO user (name, password, role) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $_POST['username'], $_POST['password'], $role);
$stmt->execute();
$stmt->close();

echo '<script language="javascript">';
echo 'alert("Successfully Registered..Now you may LOGIN")';
echo '</script>';


}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="task8.css">
</head>
<body>
<form method="post" action="">
<div id="register">

	<label>
	<h2>REGISTER</h2>
	</label>

	<label>
	<span>Username</span> 
	<input type="text" name="username" required>
	</label>
	<br>
	<label>
	<span>Password</span> 
	<input type="Password" name="password" required>
	</label><br>

	<label class="register">
	<input type="submit" name="register" value="Register">
	</label>

<lable>
	<div id="link">
	<a href="login.php">LOGIN</a>
	</div>
	</lable>
</div>
</form>

</body>
</html>