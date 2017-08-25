<?php
session_start();
include "config.php";

  $products=array();
 $stmt=$conn->prepare("SELECT * FROM product1");
 $stmt->bind_result($r_id,$r_name,$r_price,$r_image);
 $stmt->execute();
 while($stmt->fetch()){
 	array_push($products,array('id'=>$r_id,'name'=>$r_name,'price'=>$r_price,'image'=>$r_image));
 }
$stmt->close();

?>	
<!DOCTYPE html>
<html>
<head>
	<title>
		Products
	</title>
	<link href="task10.css" type="text/css" rel="stylesheet">
</head>
<script type="text/javascript" src="jquery.js"></script>
	
<body>
	<div id="header">
		<h1 id="logo">Logo</h1>
			<nav>
				<ul id="menu">
					<li><a href="#">Home</a></li>
					<li><a href="#">Products</a></li>
					<li><a href="logout.php">Logout</a></li>
					<li><a href="register.php">Register</a></li>
					<?php if(isset($_SESSION['role'])){?>
					<li><a href="checkout.php">checkout</a></li>

				<?php }else {?>
				<li><a  id="p1" href="">checkout</a></li>
				<?php }?>
				</ul>
			</nav>
	</div>
		<div id="div2">
			
		
		</div>
	<div id="main">
		<div id="products">
		 <?php foreach($products as $key=>$product) :
		  ?>
			
				<div id='<?php echo $product['id']; ?>'class="product">
					<input type="hidden" name="p1" value="<?php echo $product['id']; ?>">
					<img src="images/<?php echo $product['image']; ?> ">
					<h3 class="title" ><a href="#"><?php echo $product['name']; ?></a></h3>
					$<span class="product-price"><?php echo $product['price']; ?></span>
					<br>
					<a class="add-to-cart" data-productid="<?php echo $product['id']; ?>">add-to-cart</a>
						
				</div>
			

			<?php endforeach; ?>
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
			
			<script type="text/javascript">
		$('document').ready(function(){
			
			$('.add-to-cart').click(function(){
				var html="";
				html+= "<table><tr><th><b>Product Quantity</th><th><b>Product price</th></tr>";
				var pid=$(this).data('productid');
				$.ajax({
					method:"POST",
					url:"ajax.php",
					data:{id:pid },
					dataType:"json"
					
				}).done(function(msg){
					
					
					
					 
					 		for(i=0;i<msg.cart.length;i++){
					 			html+="<tr><td>"+msg.cart[i].quantity+"</td><td>"+msg.cart[i].price+"</td></tr>";
					 	} 

					 	html+="</table>";
					 		$("#div2").html(html);
					 
								
						});
					 
   					 
				});
				$('#p1').click(function(){
					alert("you must log in to checkout your cart");
				})
			});



					

	
	</script>
		 
	</body>
</html>
					 	  
					 	
					 		
					 		


					 	