<?php

session_start();
include("config.php");


?>

<!DOCTYPE html>
<html>
<head>
	<title>Products</title>
	<link href="task10.css" type="text/css" rel="stylesheet">
</head>
<body>
	<?php 
	include("header.php");
	?>
	<div id="products">
		    <?php

			    $stmt = $conn->prepare("SELECT id,name,price,image FROM product1");

				$stmt->execute();

				$stmt->store_result();

				if($stmt->num_rows > 0) 
				{
					  $stmt->bind_result($id_1, $name_1, $price_1, $image_1); 

					  while ($stmt->fetch())
					  {
					   $products[]=array("id"=>$id_1,"name"=>$name_1,"price"=>$price_1,"image"=>$image_1);
					  }
				}
				
				foreach ($products as $value):
			?>
						<div class="product">
							    <form action="" method="post">

							    <img src="images/<?php echo $value['image']?>">
								<input type="hidden" name="id" value="<?php echo $value['id']?>">
								<h3 class="title"><a href="#"><?php echo $value['name']?></a></h3>
								<span >Price:<?php echo "$".$value['price']?></span>
								<input type="submit" class="add-to-cart" value="Add to cart" name="cart" data-product_id="<?php echo $value['id'] ?>">

							    </form>
						</div>
			<?php

				endforeach;

			?>
	</div>
	<div></div>
	
	<script type="text/javascript" src="jquery.js"></script>
	<script type="text/javascript">

	$(document).ready(function(){

		$(".add-to-cart").click(function(){
			$.ajax({
				url:"ajax.php",
				method:"POST",
				dataType: "json",
				data:{
					product_id:$(this).data("product_id"),
					data1:0
				    }
				});
		});
	});
	</script>

</body>
</html>