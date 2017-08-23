<?php 

session_start();

if(isset($_GET['delete_id']))
		{	
		
			$stmt = $conn->prepare("DELETE FROM products WHERE id=?");
			$stmt->bind_param("i", $_GET['delete_id']);
			$stmt->execute();
			$stmt->close();
				
		}

$ename="";$eprice="";$eimgs;

		
	if(isset($_GET['edit_id']))
		{	
			$_SESSION['id'] = $_GET['edit_id'];
			$ed=$_GET['edit_id'];
		 	$stmt = $conn->prepare("SELECT * FROM product1 WHERE id=?");
			$stmt->bind_param("i", $ed);

			$stmt->execute();
			$stmt->bind_result($ids, $names, $prices, $images);
			while($stmt->fetch())
				{
					$ename = $names;
					$eprice = $prices;
					$eimgs = $images;
				}
			$stmt->close();
		}

	if(isset($_POST['updatebtn']))
		{
			
			$stmt = $conn->prepare("UPDATE product1 SET name=?,price=? WHERE id=?");
			$stmt->bind_param("ssi",$_POST['product_name'],$_POST['product_price'] ,$_SESSION['id']);
			$stmt->execute();
			unset($_SESSION['id']);
   			session_destroy();
  			$_SESSION=[];


		}

	if(isset($_POST['submit']))
		{
        
	        $image = "";
	        if(isset($_FILES['image']))
	        {
	            if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$_FILES['image']['name']))
	            {
	                $image = $_FILES['image']['name'];
	            }
        	}


        $price = $_POST['product_price'];
        $name = $_POST['product_name'];
      	$stmt = $conn->prepare("INSERT INTO product1 (name, price, image) VALUES (?, ?, ?)");
		$stmt->bind_param("sss", $name, $price, $image);
		$stmt->execute();
		$stmt->close();
 		}


 		$stmt = $conn->prepare("SELECT * FROM product1");
		$stmt->execute();
		$stmt->bind_result($idd,$nm,$pr,$img);
    		
    		while($stmt->fetch()) 
    			{
    				$htmlcontent .= "<tr><td>".$idd."</td><td>".$nm."</td>  <td>".$pr."</td>  <td><img src=".$img."></td><td><a class='action' class='edit' href='product.php?edit_id=".$idd."' data-pid= ".$idd." >Edit</a> <a class='delete' href='product.php?delete_id=".$idd."'>Delete</a> </td>   </tr>";
    			}
    			//echo "html created";
		$stmt->close();

?>
<html>
	<head>
		
	</head>
	<body>
		<div id = "wrapper">
			<div id = "main">
				<form method = "POST" action = "product.php" enctype="multipart/form-data">
				<label>Product Name : </label><input type = "text" name = "product_name" value = "<?php if(isset($_GET['edit_id'])){ echo $ename; } ?>"><br>
				<label>Product Price : </label><input type = "text" name = "product_price" value = "<?php if(isset($_GET['edit_id'])){ echo $eprice;} ?>"><br>
				<label>Product Image : </label><input type = "file" name = "image" value = "<?php if(isset($_GET['edit_id'])){ echo $eimgs;} ?>"><br>
				
				<?php  
					if(isset($_GET['edit_id']))
					{
						echo "<input type='submit' name='updatebtn' value='Update Product' >";

					}
					else
					{
						echo " <input type='submit' name='submit' value='Add Product' >";
					}


				?>
				
				</form>
			</div>
			<div id = "show">
				<table>
				<tr>
					<th>ID</th><th>NAME</th><th>PRICE</th><th>IMAGE</th><th>ACTION</th>
				</tr>
				<tr>
				<?php 
					echo  $htmlcontent ;
				?> 
				</tr></table>
			</div>
		</div>

	</body>
</html>