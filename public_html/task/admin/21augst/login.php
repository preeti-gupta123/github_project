<?php
   session_start();
   if(isset($_SESSION['user']))
   {
      header("Location:task13.php");   
   }

   $COUNT=0;

   include("config.php");

   if(isset($_POST["Login"]))
   {
      
      $user=$_POST['user'];
      $pass=$_POST['pass'];

       $stmt = $conn->prepare("SELECT name,password,role FROM user");

      $stmt->bind_result($Rname, $Rpass,$Rrole);
      $stmt->execute();
      while($stmt->fetch())
      {
         if($user==$Rname)
         {
            if($pass==$Rpass)
            {
               if($Rrole=="admin")
               {
                  $_SESSION['role']="Hello admin";
                  $_SESSION['user']=$user;
                   header("Location:task13.php");
                }
                if($Rrole=="user")
                {
                  $_SESSION['role']="";
                  $_SESSION['user']=$user;
                  header("Location:task13.php");
                }
            }
         }

       }
               if(!isset($_SESSION['user']))
               {
                  $COUNT=1;
                   $_SESSION['Ruser']="wrong user or password";
                }
   }


?>
<!DOCTYPE html>
<html>
<head>
   <title>Login</title>
   <link href="task10.css" type="text/css" rel="stylesheet">
</head>
<body>
<?php
include("header.php");
?>
<div id="login">
<form action="" method="POST">
<table>
<tr>
<td>User Name</td>
<td><input type="text" name="user" value="<?php if (isset($_SESSION['Ruser']) && $COUNT===1){ echo $_SESSION['Ruser'];}?>"></td>
</tr>
<tr>
<td>Password</td>
<td><input type="password" name="pass"></td>
</tr>
<tr>
<td colspan="2">
<p><input type="submit" name="Login" value="Login"></p>
</td>
</tr>
<tr>
<td colspan="2">
<p><?php if ($COUNT===1) echo "Sorry,register now;" ?></p>
</td>
</tr>
</table>
</form>
</div>
</body>
</html>