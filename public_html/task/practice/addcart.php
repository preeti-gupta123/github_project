<?php
		
	include('config.php');
		session_start();
		$cost=0;
		
		$item = $_POST['add_id'];
		
		$products = array();
		$cart = array();
		$product = getProduct($item);
		if(isset($_SESSION['cart']))
		{
			if(check($item))
			{
				updateCart($item);
			}
			else 
			{
				array_push($cart, $product);
			}
		}
		else
		{
			 $cart[] = $product;
			 $_SESSION['cart'] = $cart;
		}



		function getProduct($item)
		{	
			echo "enter getProduct function";	
			$prod_id = $_POST['add_id'];
			
			$stmt1 = $conn->prepare("SELECT * FROM product1 WHERE id = '?' ");
			$stmt1->bind_param("i",$prod_id);
			$stmt1->execute();
			$stmt1->bind_result($cid, $cname, $cprice, $cimage);
			//echo json_encode($stmt1);
			return($stmt1);
			$stmt1->close();

		}
				

					
		function check($item)
		{	
			echo "enter check function";
			if(isset($_SESSION['cart']))
			{
				foreach($cart as $key => $value)
				{
					if($item == $value['id'])
					{
						return true;
						break;
					}
					else return false;
				}

			}
		}


// UPDATE THE QUANTITY & TOTAL PRICE IF THE ITEM ALREADY EXISTS IN THE CART.

		function updateProduct($item)
		{
			echo "enter update function....";

			if(isset($_SESSION['cart'])==true)
			{
				$cart=$_SESSION['cart'];
				foreach ($cart as $key => $val)
				{
					if($item == $val['id'])
					{	
						//echo " updates the quantity of the item";
						$cart[$key]['quantity']+=1;
						$cost = $cart[$k]['price']*$cart[$k]['quantity'];
						echo "update total price = ".$cost;

						
						
					}
				}

				return $cart;
			}
			else return 0;
			
		}
		
?>