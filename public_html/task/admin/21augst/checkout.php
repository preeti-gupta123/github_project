<?php
	session_start();
 	include "config.php";
 	
 	function findPrice($checkout){
 		$price=0;
 			foreach($checkout as $key=>$value){
 				$price=$checkout[$key]['price']+$price;
 			}
 				return $price;
 		}
 		function findQuant($checkout){
 			$quantity=0;
 				foreach($checkout as $key=>$value){
 					$quantity=$value['quantity'];
 				}
 					return $quantity;
 			}
	$checkout=array();
		echo '<table><th>ID</th><th>Name</th><th>Price</th><th>Quantity</th><th>Image</th><th>Action</th>';

			if(isset($_SESSION['cart'])){
				$checkout=$_SESSION['cart'];
				$total_price=findPrice($checkout);
				$total_quantity=findQuant($checkout);
				$_SESSION['price']=$total_price;              
				$_SESSION['quantity']=$total_quantity;
					foreach($checkout as $x=>$y){
						echo '<tr><td>'.$y['id'].'</td>';
						echo '<td>'.$y['name'].'</td>';
						echo '<td>'.$y['price'].'</td>';
						echo '<td> <input type="number" class="quantity" min="1" value='.$y['quantity'].'></td>';
						echo '<td><img src="'.$y['image'].'"></td>';
						echo '<td><a class="Delete" href="" data-deleteid='.$y['id'].'> delete</a></td>';
						echo '<td><a class="Edit" href="" data-editid='.$y['id'].'> Edit</a></td>';

					}
						echo '<tr><td colspan="2">total price</td><td >'.$total_price.'</td></tr>';
							echo '</table>';
			}
					
	 		
		if(isset($_POST['order'])){
		$stmt = $conn->prepare("INSERT INTO orders (orderuser,orderdata,orderdate,orderprice) VALUES (?, ?, ?,?)");
		$stmt->bind_param("sssi",$user, $obj, $date,$total_price);

		$user= $_SESSION["role"];
		$obj= json_encode($_SESSION["cart"]);
		$date = date('Y/m/d H:i:s');
		


		$stmt->execute();
		$stmt->close();


header("Location:thankyou.php");
		


	
		
 	}

?>
<html>
	<head>
	<link href="task10.css" type="text/css" rel="stylesheet">
	</head>
		<body>
		<script type="text/javascript" src="jquery.js"></script>
		<form action="" method="post">
		<input type="submit"  style="font-size:20px" name="order" value="BUY NOW">
		</form> 
		
		<script type="text/javascript">
				$(document).ready(function(){
					$('.Delete').click(function(){
						var d_id=$(this).data('deleteid');

						$.ajax({method:"POST",
								url:"ajax.php",
									data:{dltid:d_id },
										dataType:"json"});
									

							

					});
					$(document).ready(function(){
						$('.Edit').click(function(e){
						
							var e_id=$(this).data('editid');
							$.ajax({
									method:"POST",
									url:"ajax.php",
									data:{edtid:$(this).data('editid'),val:$(this).parent().parent().find(".quantity").val()},
									dataType:"json"

							      });
						});
					});


			});
		</script>
		</body>
		</html>