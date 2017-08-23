<?php 	

include('admin/config.php');

         // ADD PRODUCT

if(isset($_POST['submit']))
		{	
$image;
$filename="";
if(isset($_FILES['image']))
{
	if(move_uploaded_file($_FILES['image']['tmp_name'], "uploads/".$_FILES['image']['name']))
		$filename = $_FILES['image']['name'];		
}
$image = $filename;
$stmt = $conn->prepare("INSERT INTO product1 (name,price,image) VALUES (?, ?, ?)");
$stmt->bind_param("sss",$_POST['product_name'],$_POST['product-price'],$image);	
$stmt->execute();
$stmt->close();

}
$products_list = array();
$product = array();
$stmt = $conn->prepare("SELECT * FROM product1");
$stmt =execute();
$stmt-> close();


while($stmt -> fetch())
{
echo "under while";
array_push($products_list,array('name' => $_POST['product_name'],'price' => $_POST['product_price'],'image' => $image));
			
}
		echo "Product list array : ";
		print_r($products_list);
		
?>









    <html>

	<head>
	<title>ADD PRODUCT</title>
	</head>
	<body>
	<div id = "wrapper">
	<div id = "main">
	<form method="POST" action = "" enctype = "form-data/multipart">
	<label>PRODUCT NAME : </label>	<input type = "text" name = "product_name"><br>
	<label>PRODUCT PRICE : </label>	<input type = "text" name = "product_price"><br> 
	<label>PRODUCT IMAGE : </label>	<input type = "file" name = "image"><br>
	<input type = "submit" name = "submit" value = "Add to Cart">
    </form> 
	</div>
    </div>
	</body>

    </html>