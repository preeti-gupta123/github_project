<?php

session_start();
include 'config.php';

if(isset($_GET["logout"])){

	if($_GET["logout"]==1){

		unset($_SESSION['user']);
		unset($_SESSION['role']);

		$_SESSION=[];
		session_destroy();
		header("Location:login.php");	;

	}
}

if(isset($_SESSION["Rname"])){

	echo "<h2 style='color:red; text-transform:uppercase' >WELCOME!!! </h2>";

	
	echo "<a style='color:grey; font-size:23px' href='task13.php?logout=1'>Log Out..</a>";
	


}
$products= array();
$stmt = $conn->prepare("SELECT * FROM product1");
$stmt->execute();
$stmt->bind_result($Pid, $Pname, $Pprice, $Pimage);

while ($stmt->fetch()){

	array_push($products,array('id'=>$Pid, 'name'=>$Pname,'price'=>$Pprice,'image'=>$Pimage));
}



?>



<!DOCTYPE html>
<html>
<head>
	<title>Products using PHP AJAX & DB</title>
	<link rel="stylesheet" type="text/css" href="task10.css">
	<script type="text/javascript" src="jquery.js"></script>
</head>
<body>
<?php
include("header.php");

?>

	<body>
	<div >
		<nav>
			<ul id="menu">
				<li><a href="login.php">LOGIN</a></li>
				<li><a href="register.php">REGISTER</a></li>
				<li><a href="checkout.php">CHECK OUT</a></li>
			</ul>
		</nav>


	</div>
	<div>
		<div id="products">
			<div class="product">
				<div class="product-data">
					<img src="images/basketball.png" class="product-image">
					<a href="#"><h2 class="product-title">Basket Ball</h2></a>
					<p>
						$<span class="product-price">150</span>
					</p>
					<input type="button" class="add-to-cart" value="Add To Cart" data-id=1>
				</div>
			</div>
			<div class="product">
				<div class="product-data" >
					<img src="images/football.png" class="product-image">
					<a href="#"><h2 class="product-title">Football</h2></a>
					<p>
						$<span class="product-price">120</span>
					</p>
					<input type="button" class="add-to-cart" value="Add To Cart" data-id=2>
				</div>
			</div>
			<div class="product">
				<div class="product-data">
					<img src="images/soccer.png" class="product-image">
					<a href="#"><h2 class="product-title">Soccer</h2></a>
					<p>
						$<span class="product-price">140</span>
					</p>
					<input type="button" class="add-to-cart" value="Add To Cart" data-id=3>
				</div>
			</div>
			<div class="product">
				<div class="product-data">
					<img src="images/table-tennis.png" class="product-image">
					<a href="#"><h2 class="product-title">Table Tennis</h2></a>
					<p>
						$<span class="product-price">130</span>
					</p>
					<input type="button" class="add-to-cart" value="Add To Cart" data-id=4>
				</div>
			</div>
			<div class="product">
				<div class="product-data">
					<img src="images/tennis.png" class="product-image">
					<a href="#"><h2 class="product-title">Tennis</h2></a>
					<p>
						$<span class="product-price">100</span>
					</p>
					<input type="button" class="add-to-cart" value="Add To Cart" data-id=5>
				</div>
			</div>
		</div>
		<div id="cart"></div>
	</div>	
	

	<script type="text/javascript">
		$(document).ready(function(){

			$(".add-to-cart").click(function(){

								
				$.ajax({
				  method: "POST",
				  url: "ajax.php",
				  data: {id: $(this).data('id') },
				  dataType: "json"
				})
				  .done(function(msg) {

				  	var html=  "<table><tr>\
								<th>ID</th>\
								<th>Name</th>\
								<th>Price</th>\
								<th>Image</th>\
								<th>Quantity</th>\
								<th>Action</th></tr>";

				  	for (var i = 0; i < msg.cart.length; i++)
					  {
						html+= "<tr><td>"+msg.cart[i].id+"</td>\
							  		<td>"+msg.cart[i].name+"</td>\
							  		<td>"+msg.cart[i].price+"</td>\
							  		<td><img src='images/"+msg.cart[i].image+"'></td>\
							  		<td>"+msg.cart[i].quantity+"</td>\
							  		<td><a href='#' data-id='"+msg.cart[i].id+"' class='remove'>Remove</a></td></tr>";
					  }

					html+= "</table>";

					
					//$_SESSION["cart"]= html;	
					$("#cart").html(html);

					
				});

				  

			});

				

			$(document).on('click','.remove', function(e){

				e.preventDefault();
				
				$.ajax({
				  method: "POST",
				  url: "ajax.php",
				  data: {did: $(this).data('id') },
				  dataType: "json"
				})

				.done(function(msg){

					var html=  "<table id='table'><tr>\
								<th>ID</th>\
								<th>Name</th>\
								<th>Price</th>\
								<th>Image</th>\
								<th>Action</th></tr>";

				  	for (var i = 0; i < msg.cart.length; i++)
					  {
						html+= "<tr><td>"+msg.cart[i].id+"</td>\
							  		<td>"+msg.cart[i].name+"</td>\
							  		<td>"+msg.cart[i].price+"</td>\
							  		<td><img src='images/"+msg.cart[i].image+"'></td>\
							  		<td><a href='#' data-id='"+msg.cart[i].id+"' class='remove'>Remove</a></td></tr>";
					  }

					html+= "</table>"

					$("#cart").html(html);

				});

			});

		});
	</script>
</body>
</html>