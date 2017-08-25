<?php
session_start();

include("admin/config.php");
if(isset($_GET['pid'])){

		//for delete

	$stmt=$conn->prepare("DELETE FROM product1 WHERE id=?");
	$stmt->bind_param("i", $_GET['pid']);
	
	$stmt->execute();
	$stmt->close();

		}
if(isset($_GET['eid'])){

	$_SESSION['id']=$_GET['eid'];

   //for edit

	$edit_id=$_GET['eid'];
				
		$stmt=$conn->prepare("SELECT * FROM product1 WHERE id=?");
		$stmt->bind_param("i" ,$edit_id );

		$stmt->execute();
		$stmt->bind_result($ides,$namees,$pricees,$imagees);
		while($stmt->fetch()){
			$editname=$namees;
			$editprice=$pricees;
			$editimage=$imagees;
				}

}



$html="";

	

		if(isset($_POST['Add_product'])){
	
		$stmt=$conn->prepare("INSERT INTO product1 (name,price,image) VALUES(?,?,?)");
		$stmt->bind_param("sss",$name,$price,$image);
		
		$name=$_POST['textname'];
		
		$price=$_POST['textprice'];
		
		

		if(isset($_FILES['upload'])){

			if(move_uploaded_file($_FILES['upload']['tmp_name'], "uploads/".$_FILES['upload']['name'])){
				$image=$_FILES['upload']['name'];
			}

		}	
			

		$stmt->execute();
		echo "DATA ENTERED";

	}

	else if(isset($_POST['updtfrm'])){


	$stmt = $conn->prepare("UPDATE product1 SET name=?,price=?  WHERE id=?");
	
	$stmt->bind_param("ssi",$_POST['textname'],$_POST['textprice'],$_SESSION['id']);
	

	$stmt->execute();
	unset($_SESSION['id']);
		session_destroy();
		$_SESSION=[];


	}


		$stmt=$conn->prepare("SELECT * FROM product1");

		$stmt->execute();

		$stmt->bind_result($id,$names,$prices,$images);
		while($stmt->fetch()){

		$html .= "<tr> <td> ".$id." </td>   <td>".$names."</td>  <td>".$prices."</td>  <td><img src=".$images."></td>        <td><a class='action' href='sql.php?eid=".$id."' data-pid= ".$id." >Edit</a> <a class='deletes' href='sql.php?pid=".$id."' >Delete</a> </td>   </tr>";

		}

		$stmt->close();
		$conn->close();
        ?>


	<!DOCTYPE html>
	<html>
	<head>
		<title>jQuery</title>
		<link rel="stylesheet" type="text/css" href="task8.css">
	</head>
	<body>

		


	<div id="wrapper">
	<form method="POST" action="sql.php" enctype="multipart/form-data" >
		
		Product Name:  <input type="text" name="textname"  value="<?php if(isset($_GET['eid'])){ echo $editname; } ?>" ><br><br>
		Product Price: <input type="text" name="textprice" value="<?php if(isset($_GET['eid'])){ echo $editprice;} ?>" ><br><br>
		Product Image: <input type="file" name="upload" value="<?php if(isset($_GET['eid'])){ echo $editimage; } ?>">                                              		        

				<?php  if(isset($_GET['eid'])){
					echo "<input type='submit' name='updtfrm' value='Update Product' >";

					}
					else{
						echo " <input type='submit' name='Add_product' value='Add Product' >";
					}


					 ?>


				 	
	</form>
		
	<div id="Show">
		
	<table><tr><th>Name</th><th>Id</th><th>Price</th><th>Image</th><th>Action</th></tr>
			

		<tr>
			
			<?php
			echo $html;
			?>
			

		</tr>

	</table>

	</div>

    </script>
	</body>

	</html>



	



