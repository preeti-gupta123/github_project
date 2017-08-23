
var products=[];
function myfunction()
{
var product={ };
product.id=document.getElementById('product_id').value;
	product.name=document.getElementById('product_name').value;
	product.price=document.getElementById('product_price').value;


	products.push(product);


var list="<table><tr><th>Product id</th><th>Product Name</th><th>Product Price</th></tr>";
	for(var i=0;i<products.length;i++)
	{
		list+="<tr><td>"+products[i].id+"</td><td>"+products[i].name+"</td><td>"+products[i].price+"</td></tr></table>";
	}


	document.getElementById('view').innerHTML=list;
}
 