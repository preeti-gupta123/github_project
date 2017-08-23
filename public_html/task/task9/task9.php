<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>



<?php

$products = array(
                "Electronics" => array(
                                    "Television" => array(
                                                        array(
                                                            "id" => "PR001",
                                                            "name" => "MAX-001",
                                                            "brand" => "Samsung"
                                                        ),
                                                        array(
                                                            "id" => "PR002",
                                                            "name" => "BIG-301",
                                                            "brand" => "Bravia"
                                                        ),
                                                        array(
                                                            "id" => "PR003",
                                                            "name" => "APL-02",
                                                            "brand" => "Apple"
                                                        )
                                                    ),
                                    "Mobile" => array(
                                                        array(
                                                            "id" => "PR004",
                                                            "name" => "GT-1980",
                                                            "brand" => "Samsung"
                                                        ),
                                                        array(
                                                            "id" => "PR005",
                                                            "name" => "IG-5467",
                                                            "brand" => "Motorola"
                                                        ),
                                                        array(
                                                            "id" => "PR006",
                                                            "name" => "IP-8930",
                                                            "brand" => "Apple"
                                                        )
                                                    )
                                ),
                "Jewelry" => array(
                                    "Earrings" => array(
                                                        array(
                                                            "id" => "PR007",
                                                            "name" => "ER-001",
                                                            "brand" => "Chopard"
                                                        ),
                                                        array(
                                                            "id" => "PR008",
                                                            "name" => "ER-002",
                                                            "brand" => "Mikimoto"
                                                        ),
                                                        array(
                                                            "id" => "PR009",
                                                            "name" => "ER-003",
                                                            "brand" => "Bvlgari"
                                                        )
                                                    ),
                                    "Necklaces" => array(
                                                        array(
                                                            "id" => "PR010",
                                                            "name" => "NK-001",
                                                            "brand" => "Piaget"
                                                        ),
                                                        array(
                                                            "id" => "PR011",
                                                            "name" => "NK-002",
                                                            "brand" => "Graff"
                                                        ),
                                                        array(
                                                            "id" => "PR012",
                                                            "name" => "NK-003",
                                                            "brand" => "Tiffany"
                                                        )
                                                    )                
                            )
            );
?>
<table  border="1" style="height:auto;width: 60%; background-color: #CFA76E; color:black;">
<h3>PRODUCTS</h3>
    <tr>
        <th>Category</th>
         <th>Sub-category</th>
          <th>Id</th>
           <th>Name</th>
            <th>Brand</th>
    </tr>

<?php
        foreach ($products as $key => $categories) 
{

        foreach ($categories as $key1 => $subcategories) 
    {

        foreach ($subcategories as $key2 => $product) 
        {

echo '<td>'.$key. '</td><td>'.$key1.'</td><td>'.$product["id"].'</td><td>'.$product["name"].'</td><td>'.$product["brand"].'</td></tr>';        
              
                   
                
        }

    }
 
 }
?>

</table>
<table  border="1" style="height:auto;width: 60%; background-color: #CFA76E;color:balack;">
<h3> MOBILE PRODUCT</h3>
<tr>
       <th>Category</th>
       <th>Sub-category</th>
       <th>ID</th>
       <th>Name</th>
       <th>Brand</th>
</tr>
        
         <?php
        foreach ($products as $key => $categories) 
{

        foreach ($categories as $key1 => $subcategories) 
    {

        foreach ($subcategories as $key2 => $product) 
        {
          if($key1=="Mobile")
            {
    echo "<tr>
         <td>".$key."</td><td>".$key1."</td><td>".$product['id']."</td><td>".$product['name']."</td><td>".$product['brand']."</td>
          </tr>";
             }
        }
    }
}
 
?>
 </table>


  <h3>SAMSUNG</h3>
  <div style="height:auto;width: 60%; background-color:grey;color:balack;">

   <?php


            foreach ($products as $key => $categories)
             {
                foreach ($categories as $key1 => $subcategories) 
                {
                    foreach ($subcategories as $key2 => $product) {
                        if($product["brand"]=="Samsung")
                        {
                           
                            echo '<br>Product ID:'.$product["id"]. '<br>Product Name:'.$product["name"].'<br>Subcategory:'.$key1.'<br>Category:'.$key;
                        }
                    }
                }
            }
   ?>

</div>

<h3>Delete product</h3>
<div>
<?php

foreach ($products as $key => $categories)
             {
                foreach ($categories as $key1 => $subcategories) 
                {
                foreach ($subcategories as $key2 => $product) 
                    {
                if($product["id"]=="PR003")
                        {

    unset($products[$key][$key1][$key2]);


                        }
                    }
                }
             }



 ?>


<table  border="1" style="  height:auto;width: 60%; background-color: #977254 ;color:balack;">

<tr><th>Category</th><th>subcategory</th><th>Id</th><th>Name</th><th>Brand</th></tr>
<?php
foreach ($products as $key => $categories)
             {
                foreach ($categories as $key1 => $subcategories) 
                {
                    foreach ($subcategories as $key2 => $product) 
                    {

  
echo '<td>'.$key. '</td><td>'.$key1.'</td><td>'.$product["id"].'</td><td>'.$product["name"].'</td><td>'.$product["brand"].'</td></tr>';

                    }

                }
            }
 ?>
 </div>




<?php
            foreach ($products as $key => $categories)
             {
                foreach ($categories as $key1 => $subcategories) 
                {
                    foreach ($subcategories as $key2 => $product) 
                    {
                        if($product["id"]=="PR002")
                        {
                           
                            $products[$key][$key1][$key2]["name"]="BIG-555";
                        }
                    }
                }
            }
        ?>
        <table  border="1" style="  height:auto;width: 60%; background-color: #b03a2e; color:balack;">
        <h2>update</h2>
            <tr>
                <th>Category</th><th> Subcategory</th><th>  ID   </th><th>Name</th><th>Brand</th>
            </tr>
            <?php
               foreach ($products as $key => $categories)
             {
                foreach ($categories as $key1 => $subcategories) 
                {
                    foreach ($subcategories as $key2 => $product) 
                    {
                            echo '<td>'.$key. '</td><td>'.$key1.'</td><td>'.$product["id"].'</td><td>'.$product["name"].'</td><td>'.$product["brand"].'</td></tr>';
                    }
               }
            }
          
            ?>
        </table>


 </table>  

 </body>
 </html>     


   