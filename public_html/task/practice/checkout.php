<?php
session_start();
if(!isset($_SESSION['user']))
{
	header("location:login.php");
}
$products=array();
if(isset($_POST["check"]))
{
	include("config.php");

	$date = date('Y/m/d H:i:s');
	$user = $_SESSION['user'];
	//$order_data = json_encode($_SESSION['cart']);


	$stmt = $conn->prepare("INSERT INTO orders (orderuser, orderprice, orderdate,orderdata) VALUES (?, ?, ?, ?)");
	$stmt->bind_param("ssss",$Puser, $Pprice, $date, $data );

	
	$Puser=$user;
	//$Pprice=$price;
	//$Pdata=$order_data;
	$Pdate =$date;
	

	$stmt->execute();

	


}
?>
<!DOCTYPE html>
<html>
<head>
	<link href="task10.css" type="text/css" rel="stylesheet">
	<title>checkout</title>
</head>
<body>

<?php 
	include("header.php");
?>
<br>
<br> 
<div id="products_list">
	<?php
		if(isset($_SESSION['cart'])):
	?>

			<table>
			<tr>
			<th>Product ID</th>
			<th>Product Name</th>
			<th>Product Price</th>
			<th>Quantity</th>
			<th>Action</th>
			</tr>
	

		

	<?php
		endif;

		if(isset($_SESSION['cart'])):

		$products=$_SESSION['cart'];

		foreach ($products as $value):

	?>
	
		<tr class="product_fetch">

			<td><img src="images/<?php echo $value['image'] ?>"></td>
			<td><?php echo $value['id']; ?></td>
			<td><?php echo $value['name']; ?></td>
			<td><?php echo "$".$value['price']; ?></td>
			

		</tr>

	<?php

		endforeach;
		endif;

	?>

	</table>
	<?php
		if(!isset($_SESSION['cart']))
		{
			echo "<h1>";
			echo"No products added to cart";
			echo "</h1>";
		}
	?>
		
</div>

<div>
	<table>
	
	<tr>
	<td><?php if(isset($_SESSION['total_amount'])) echo "Your total amount is :$".$_SESSION['total_amount'];?></td>
	</tr>

	<tr>
	<td>
	<form action="" method="POST">
	<input type="submit" name="check" value="BUY NOW">
	</form>
	</td>
	</tr>

	</table>
</div>

	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">

	$(document).ready(function(){
		$(".update").click(function(){
			$.ajax({
				url:"ajax.php",
				method:"POST",
				dataType: "json",
				data:{
					update_id:$(this).data("product_id"),
					new_qty:$(this).parents(".product_fetch").find(".new_qty").val(),
					data1:1
				    }
				});
		});
	});
	</script>
</body>
</html>