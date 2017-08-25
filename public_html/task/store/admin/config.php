<?php
$servername = "localhost";
$username = "preetig";
$password = "password";
$dbname = "preetig_admin";

$conn = new mysqli($servername,$username,$password,$dbname);

//check connection
if ($conn->connect_error)
 {
    die("Connection failed: " . $conn->connect_error);
 }
echo "Connected successfully";

?>