<?php 
session_start();
global $products;
 $products=array(
				array(
					'img'=>'images/football.png',
					'id'=>'1',
					'name'=>'Product 101',
					'price'=>'$150.00'
					),
				array(
					'img'=>'images/tennis.png',
					'id'=>'2',
					'name'=>'Product 102',
					'price'=>'$120.00'
					),
				array(
					'img'=>'images/basketball.png',
					'id'=>'3',
					'name'=>'Product 103',
					'price'=>'$90.00'
					),
				array(
					'img'=>'images/table-tennis.png',
					'id'=>'4',
					'name'=>'Product 104',
					'price'=>'$110.00'
					),
				array(
					'img'=>'images/soccer.png',
					'id'=>'5',
					'name'=>'Product 105',
					'price'=>'$80.00'
					)
			);
global $cart;
$cart=array();
function getProduct($product_id)
{
	global $products;
	
	foreach ($products as $key => $value)
	{
		if($value['id']==$product_id)
		{
			$value['qty']=1;
			return $value;
			break;
		}
	}

}

function ProductExistInCart($product_id)
{
	if(isset($_SESSION['cart']))
	{
		$cart=$_SESSION['cart'];
		foreach ($cart as $key => $value)
		{
			if($value['id']==$product_id)
			{

				return true;
			}
		}
	}
}
function UpdateCart($product_id)
{
	$cart=$_SESSION['cart'];
	if(isset($_SESSION['cart']))
	{
		$cart=$_SESSION['cart'];
		foreach ($cart as $key => $value)
		{
			if($value['id']==$product_id)
			{
				$cart[$key]['qty']+=1;
				break;
			}
		}
		return $cart;
	}
}

if ($_SERVER["REQUEST_METHOD"] == "POST")
		{	  
		      $id=$_POST['id'];

if(isset($_POST['submit']))
{
	$product_id=$_POST['id'];
	$product=getProduct($product_id);
	
	if(isset($_SESSION['cart']))
	{
		$cart=$_SESSION['cart'];
	}
	if(ProductExistInCart($product_id))
	{
		$cart=UpdateCart($product_id);
	}
	
	else
		$cart[]=$product;
	
	

	$_SESSION['cart']=$cart;
}	
        }
?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="task10.css" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
		<nav>
			<ul id="menu">
				<li><a href="#">Home</a></li>
				<li><a href="#">Products</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
		</nav>
	</div>
	<div>
		
	</div>
	<div>
	<div id="div1">
		<table id="tablenew">
			<tr>
				<th>Product Image</th>
				<th>Product Id</th>
				<th>Product Name</th>
				<th>Product Price</th>
				<th>Product Quantity</th>
			</tr>
			<?php foreach ($cart as $key => $value):?>
			<tr>
				 <td><img src="<?php echo $value['img']; ?>"></td>
				 <td><?php echo $value['id']; ?></td>
				 <td><?php echo $value['name']; ?></td>
				 <td><?php echo $value['price']; ?></td>
				 <td><?php echo $value['qty']; ?></td>	
			</tr>
			<?php endforeach;?>
		</table>
	</div>
	</div>
	<div id="main">
		<div id="products">
			<form id="1" action="task10.php" method="post">
			<div id="product-101" class="product">
				<img src="images/football.png">
				<h3 class="title"><a href="#">Product 101</a></h3>
				<span>Price: $150.00</span>
				<input type="hidden" name="id" value="1">
				<input type="submit" name="submit"  value="Add_to_cart" class="add-to-cart" >

			</div>
			</form>
			<form id="2" action="task10.php" method="post">
			<div id="product-101" class="product">
				<img src="images/tennis.png">
				<h3 class="title"><a href="#">Product 102</a></h3>
				<span>Price: $120.00</span>
				<input type="hidden" name="id" value="2">
				<input type="submit" name="submit" value="Add_to_cart" class="add-to-cart"  >
			</div>
			</form>
			<form id="3" action="task10.php" method="post">
			<div id="product-101" class="product">
				<img src="images/basketball.png">
				<h3 class="title"><a href="#">Product 103</a></h3>
				<span>Price: $90.00</span>
				<input type="hidden" name="id" value="3">
				<input type="submit" name="submit"  value="Add_to_cart" class="add-to-cart">
			</div>
			</form>
			<form id="4" action="task10.php" method="post">
			<div id="product-101" class="product">
				<img src="images/table-tennis.png">
				<h3 class="title"><a href="#">Product 104</a></h3>
				<span>Price: $110.00</span>
				<input type="hidden" name="id" value="4">
				<input type="submit" name="submit" value="Add_to_cart" class="add-to-cart" >
			</div>
			</form>
			<form id="5" action="task10.php" method="post">
			<div id="product-101" class="product">
				<img src="images/soccer.png">
				<h3 class="title"><a href="#">Product 105</a></h3>
				<span>Price: $80.00</span>
				<input type="hidden" name="id" value="5">
				<input type="submit" name="submit"  value="Add_to_cart" class="add-to-cart">
			</div>
			</form>
		</div>
	</div>
	<div id="footer">
		<nav>
			<ul id="footer-links">
				<li><a href="#">Privacy</a></li>
				<li><a href="#">Declaimers</a></li>
			</ul>
		</nav>
	</div>
</body>
</html>