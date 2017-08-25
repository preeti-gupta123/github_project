<?php
include('config.php');
{	

	$uname=$_POST['name'];
	$uprice=$_POST['price'];
	$uimag=$_FILES['image']['name'];
	$ucategory=$_POST['dropdown'];
	$uid=$_POST['id'];

	$filename="";

		if(isset($_FILES['image']))
			{
	           if(move_uploaded_file($_FILES['image']['tmp_name'], "../Uploads/images/".$_FILES['image']['name']))
	           {
	                $filename = $_FILES['image']['name'];
	           }
	        }



	$stmt=$conn->prepare("UPDATE store SET name=?,price=?,image=?,category=?,id=? WHERE id=?");
	$stmt->bind_param("ssssi",$Uname,$Uprice,$Uimag,$Ucategory,$Uid);
	$Uname=$uname;
	$Uprice=$uprice;
    $Uimag=$uimag;
    $Ucategory=$ucategory
    $Uid=$uid
	$stmt->execute();
	
header("Location:manage.php");
?>