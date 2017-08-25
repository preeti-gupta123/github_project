<?php

session_start();
include("config.php");
global $conn;

if(isset($_POST['submit']))
{


	$stmt=$conn->prepare("INSERT INTO `store` (name,price,image,category) VALUES(?,?,?,?)");
	$stmt->bind_param("ssss",$name,$price,$image,$category);

	$name= $_POST['name'];
	$price=$_POST['price'];
	$category=$_POST['dropdown'];

	if(isset($_FILES['image']))


		{

	if(move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/images/".$_FILES['image']['name']))
			{
				$image=$_FILES['image']['name'];
			}
		}
	

		$stmt->execute() or die("abc");
		$stmt->close();  

		}

		else if(isset($_POST['update']))
{	

	$Uname=$_POST['name'];
	$Uprice=$_POST['price'];
	$Uimag=$_FILES['image']['name'];
	$Ucategory=$_POST['dropdown'];
	$id_to_update=$_POST['edit'];


	$stmt=$conn->prepare("UPDATE store SET name=?,price=?,image=?,category=? WHERE id=?");
	$stmt->bind_param("ssssi",$Uname,$Uprice,$Uimag,$Ucategory,$id_to_update);

	$stmt->execute();
	session_destroy();

}
$conn->close();

	
	header("location:addproduct.php");


?>
