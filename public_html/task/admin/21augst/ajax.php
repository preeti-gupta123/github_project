<?php

session_start();
 include "config.php";

$cart= array();

$products= array();
					

	$products= array();
	$stmt = $conn->prepare("SELECT * FROM product1");
	$stmt->execute();
	$stmt->bind_result($Pid, $Pname, $Pprice, $Pimage);

	while ($stmt->fetch()){

		array_push($products,array('id'=>$Pid, 'name'=>$Pname,'price'=>$Pprice,'image'=>$Pimage));
	}



		  function deleteProduct($did,$cart){
                       foreach($cart as $key=>$product){
                            if($cart[$key]['id']==$did){
                              unset($cart[$key]);
                              reset($cart);
                              return $cart;
                            }
                       }

                    }
                    
                     
                    



                    function getProduct($id,$cart){
                    global $products;
                   
                     foreach ($products as $key => $value) 
                              {
                               if($products[$key]['id']== $id)
                                  {
                                    $value['quantity']=1;
                                      $cart[]=$value;
                                      
                                      
                                      return $cart;

                                    
                                    }

                               }
                              
                         }




function UpdateProduct($fid){

	$cart= $_SESSION["cart"];
	
    foreach ($cart as $key => $d){

		if($d['id']==$fid){

			$cart[$key]['quantity'] += 1;
			break;
		}
	}
	return $cart;
}


function ProductExistInCart($fid){

	if(isset($_SESSION["cart"])){
	
		$cart= $_SESSION["cart"];
		
		foreach ($cart as $key => $d){

			if($d['id']==$fid){

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

	  			$cart= UpdateProduct($id);
	  			$_SESSION["cart"] = $cart;
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

echo json_encode(array('cart'=>$_SESSION["cart"]));



?>