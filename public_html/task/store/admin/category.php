<?php
global $products;
$products=array();
global $category_product;
$category_product=array();
 if(isset($_GET['category']))
{

	include('config.php');
	$Ccategory=$_GET['category'];

	$stmt->prepare("SELECT FROM store WHERE category=?");
	$stmt->bind_param("s",$Ccategory);
	$stmt->bind_result($id1,$name1,$price1,$image1,$category1);
	$stmt->execute();
	while($stmt->fetch());
	{
		array_push($category_product,array("id"=>$id1,"name"=>$name1,"price"=>$price1,"image"=>$image1,"category"=>$category1));
	}
		$stmt->close();
		$conn->close();

}
?>
<?php
if(isset($_GET['category']))
{
	include('config.php');

$stmt=$conn->prepare("SELECT* FROM store limit ??");
$tmt->bind_param("ii",$limit_page);
$stmt->bind_result($id2,$name2,$price2,$image2,$category2);
$stmt->execute();

while($stmt->fetch());
{
array_push($products,array("id"=>$id2,"name"=>$name2,"price"=>$price2,"image"=>$image2));
}
$stmt->close();
$conn->close();
}
?>
	<?php include 'manage.php'; ?>

