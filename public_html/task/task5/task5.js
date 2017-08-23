

var product=new Array();
var cart=new Array();

var product1=new Object();
product1.img = new Image();
product1.id=101;
product1.name="football";
product1.price=150.00;
product1.quantity=1;
product1.img.src="images/football.png";


var product2=new Object();
product2.img = new Image();
product2.id=102;
product2.name="tennis";
product2.price=120.00;
product2.quantity=1;
product2.img.src="images/tennis.png";

var product3=new Object();
product3.img = new Image();
product3.id=103;
product3.name="basketball";
product3.price=90.00;
product3.quantity=1;
product3.img.src="images/basketball.png";


var product4= new Object();
product4.img = new Image();
product4.id=104;
product4.name="table-tennis";
product4.price=110.00;
product4.quantity=1;
product4.img.src="images/table-tennis.png";


var product5= new Object();
product5.img = new Image();
product5.id=105;
product5.name="soccer";
product5.price=80.00;
product5.quantity=1;
product5.img.src="images/soccer.png";

product.push(product1);
product.push(product2);
product.push(product3);
product.push(product4);
product.push(product5);

function myfunction(x)
{
       var a=0; var b=0; var c=0;
       for(b=0;b<cart.length;b++)
		{
		if(cart[b].id==x)
		{
			cart[b].quantity++;
			a=1;
			break;
		}
		}
		if(a==0)
		{
		  for(var j=0;j<product.length;j++)
		  {
		   if(product[j].id==x)
		   {
			c=j;
		   break;
		   }
	     }
	     cart.push(product[c]);
	   }

var i,n=0;
	n=cart.length;
	var result="<table><tr><th>Product Image</th> <th>Product Id</th> <th>Product Name</th> <th>Product Price</th> <th>Quantity</th></tr>";
	for(i=0;i<n;i++)
	{
		
	result+="<tr><td><img src="+product[i].img.src+"></td><td>"+product[i].id+"</td><td>"+product[i].name+"</td><td>"+product[i].price+"</td><td>"+product[i].quantity+"</td></tr>";

     }
     result+="</table>";
	document.getElementById("result").innerHTML=result;
}


