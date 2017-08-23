<?php

session_start();

$cart= array();

$products= array(
					array(
							"id"=> 1,
							"name"=> "Football",
							"price"=> "$120.00",
							"image"=> "football.png"
						),
					array(
							"id"=> 2,
							"name"=> "Tennis",
							"price"=> "$100.00",
							"image"=> "tennis.png"
						),
					array(
							"id"=> 3,
							"name"=> "Basket Ball",
							"price"=> "$150.00",
							"image"=> "basketball.png"
						),
					array(
							"id"=> 4,
							"name"=> "Table Tennis",
							"price"=> "$130.00",
							"image"=> "table-tennis.png"
						),
					array(
							"id"=> 5,
							"name"=> "Soccer",
							"price"=> "$140.00",
							"image"=> "soccer.png"
						)
         		);


function ProductExistInCart($id){

	if(isset($_SESSION["cart"])){
	
		$cart= $_SESSION["cart"];
		
		foreach ($cart as $key => $d){

			if($d['id']==$id){

				return true;
			}
		}
		return false;
	}	
}


if(isset($_POST['id'])){

	$id= $_POST['id'];

	foreach ($products as $key => $d) {

	  	if($d['id']== $id){ 

	  		if(ProductExistInCart($id)){

	  			$cart=$_SESSION["cart"];
	  		}


	  		else{
	  		if(isset($_SESSION["cart"])){
			
					$cart=$_SESSION["cart"];       
				}

		  		
				$cart[]= $d;
				$_SESSION["cart"] = $cart;
			}
	    }
	}
}
// for deleting
if(isset($_POST['did'])){

	$did= $_POST['did'];
	$cart= $_SESSION["cart"];

	foreach ($cart as $key => $d) {

	  	if($d['id']== $did){

		  	unset($cart[$key]);
		 
		  	sort($cart); 
			$_SESSION["cart"] = $cart;
	  	}
	}  	
}

echo json_encode(array('cart'=>$cart));



?>