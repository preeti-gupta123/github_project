<?php
session_start();
include 'config.php';

if(isset($_POST["update_product"])){

	$image = $_SESSION["image"];
        if(isset($_FILES['image'])){
            if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                $_SESSION["image"]= $image;
                
            }
        }

	$stmt = $conn->prepare("UPDATE product1 SET name=?, price=?, image=? WHERE id=?");
	$stmt->bind_param("sssi", $_POST['product_name'], $_POST['product_price'], $image, $_SESSION["epid"]);
	$stmt->execute();
	$stmt->close();

	unset($_SESSION["image"]);
}



if(isset($_GET["epid"])){

	$_SESSION["epid"]= $_GET["epid"];
	$stmt = $conn->prepare("SELECT * FROM product1 WHERE id=?");
 	$stmt->bind_param("i", $_GET["epid"]);
 	$stmt->execute();
 	$stmt->bind_result($Eid, $Ename, $Eprice, $Eimage);

 	while ($stmt->fetch()) {

	    $En = $Ename;
	    $Ep = $Eprice;
	   
	    $_SESSION["image"]=$Eimage; 
	}
	$stmt->close();

}


if(isset($_GET["dpid"])){
	
	$stmt = $conn->prepare("DELETE FROM product1 WHERE id=?");
	$stmt->bind_param("i", $_GET["dpid"]);
	$stmt->execute();
	$stmt->close();

	header("Location:index.php"); 
}


if(isset($_POST["add_product"])){

$name = $_POST['product_name'];
$price = $_POST['product_price'];

}

if(isset($_POST["add_product"])){
        
        $image = "";
        if(isset($_FILES['image'])){
            if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$_FILES['image']['name'])){
                $image = $_FILES['image']['name'];
                $_SESSION["image"]= $image;
            }
        }
    }

$stmt = $conn->prepare("INSERT INTO product1 (name, price, image) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $name, $price, $image);
$stmt->execute();
$stmt->close();

$stmt = $conn->prepare("SELECT * FROM product1");
$stmt->execute();
$stmt->bind_result($Rid, $Rname, $Rprice, $Rimage);

$html=  "<table><tr>
				<th>ID</th>
				<th>Name</th>
				<th>Price</th>
				<th>Image</th>
				<th>Action</th></tr>";

 while ($stmt->fetch()) {
    $id = $Rid;
    $name = $Rname;
    $price = $Rprice;
    $image = $Rimage;

    $html.="<tr><td>".$id."</td>
		  		  <td>".$name."</td>
		  		  <td> $ ".$price."</td>
		  		  <td><img src='uploads/".$image."'></td>
		  		  <td><a href='task12.php?epid=".$id."' class='edit'>Edit</a><a href='task12.php?dpid=".$id."'  class='delete' >Delete</a></td></tr>";
		  		  //here setting href above so that when we click on link we pass the id and get that id thru $_GET..
		  		  
 }

$stmt->close();
$html.= "</table>"








?>


<!DOCTYPE html>
<html>
<head>
	<title>Stock Items using PHP and DB</title>
	<link rel="stylesheet" type="text/css" href="task8.css">
</head>
<body>
	<div id="wrapper">
		<form method="post" action="index.php" enctype="multipart/form-data">
		<div id="add_product_form">
			
			<label for="product_name">
				<span>Product Name</span> 
				<input type="text" name="product_name" value="<?php if(isset($_GET["epid"])){ echo $En; } ?>" id="product_name" required ><br><br>
			</label>
			<label for="product_price">
				<span>Product Price</span> 
				<input type="text"  name="product_price" value="<?php if(isset($_GET["epid"])){ echo $Ep; } ?>" id="product_price" required><br><br>
			</label>
			<label for="product_quantity">
				<span>Product Image</span> 
				<input type="file" name="image" id="product_image" required><br><br>
			</label>
			<p class="submit">
			<?php
				if(!isset($_GET["epid"])){
					echo "<input type='submit' name='add_product' id='add_product' value='Add Product'>"; 
				}
				else {
					echo "<input type='submit' name='update_product' id='update_product' value='UPDATE'>"; 
				}
				
				?>
			</p>
			
		</div>
		</form>

		
		<div id="product_list">
			<?php echo $html ?>
		</div>

		
	</div>
</body>
</html>