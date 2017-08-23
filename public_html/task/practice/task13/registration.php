<!DOCTYPE html>
<html>
<head>
	<link href="task8.css" type="text/css" rel="stylesheet">
	<title>Register</title>
</head>
<body>
<?php
include("header.php");
?>
  <div id="register">
  <form action="enter.php" method="POST">	  
	<table>

	  <tr>
	  <td>User Name</td>
	  <td><input type="text" name="user" value=""></td>
	  </tr>

	  <tr>
	  <td>EmailId</td>
	  <td><input type="text" name="emailid" value=""></td>
	  </tr>

	  <tr>
	  <td>Mobile Number</td>
	  <td><input type="text" name="mob_num" value=""></td>
	  </tr>

	  <tr>
	  <td>Role</td>
	  <td>
	  <select Name="role">
	  <option value="select" selected>select..</option>
	  <option value="user">USER</option>
	  <option value="admin">ADMIN</option>
	  </select>
	  </td>
	  </tr>

	  <tr>
	  <td>Password</td>
	  <td><input type="password" name="password" value=""></td>
	  </tr>

	  
	  

	  </table>
  </form>

</div>
</body>
</html>