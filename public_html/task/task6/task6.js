
var products = [{
					"id": "100",
					"name": "iPhone 4S",
					"brand": "Apple",
					"os": "iOS"
				},
				{
					"id": "101",
					"name": "Moto X",
					"brand": "Motorola",
					"os": "Android"	
				},
				{
					"id": "102",
					"name": "iPhone 6",
					"brand": "Apple",
					"os": "iOS"
				},
				{
					"id": "103",
					"name": "Samsung Galaxy S",
					"brand": "Samsung",
					"os": "Android"
				},
				{
					"id": "104",
					"name": "Google Nexus",
					"brand": "ASUS",
					"os": "Android"
				},
				{
					"id": "105",
					"name": "Surface",
					"brand": "Microsoft",
					"os": "Windows"
				}];

  var brands=[];
  var oss=[];
  var display=[];



	
	//for BRAND
     for(var i=0;i<products.length;i++)
            {
                
                if(brands.indexOf(products[i].brand)===-1)
                {
                    brands.push(products[i].brand);
                }
                }
                 

     //for OS

       for(var j=0;j<products.length;j++)
            {
            if(oss.indexOf(products[j].os)===-1)
            {
            oss.push(products[j].os);
            }
            }
            


      $(document).ready(function(){
     var output1= '<select id="OS">';
     output1+="<option value='o'>select brands</option>"

        for(var k=0;k<oss.length;k++)
        {
         output1+='<option value='+oss[k]+' >'+oss[k]+'</option>';
        }
        output1+='</select>';


         var output2= '<select id="PBrand">';
     output2+="<option value='o'>select os</option>"
        for(var l=0;l<brands.length;l++)
        {
         output2+='<option value='+brands[l]+' >'+brands[l]+'</option>';
        }
        output2+='</select>';

        $("#div1").html(output1);
         $("#div1").append(output2);
         $("#div1").on('change','#OS',function(){
           var output3= $(this).val();

           console.log(output3);
            var html="";
            html+= "<table><tr><th>Product id</th> <th>Product name</th> <th>product brand</th><th>Product Os</th></tr> ";
             for(var m=0;m<products.length;m++)
         {
            if(output3==products[m].os)
            {
          html+="<tr> <td>"+products[m].id+"</td><td>"+products[m].name+"</td><td>"+products[m].brand+"</td><td>"+products[m].os+"</td></tr>";
            }
         }
         
         html+="</table>";

         
         $("#div2").html(html);

         });
                 
       $("#div1").on('change','#PBrand',function(){
        var output4= $(this).val();
        console.log(output4);
         var output5="";
     output5+= "<table><tr><th>Product id</th> <th>Product name</th> <th>product brand</th><th>Product Os</th></tr> ";
             for(var m=0;m<products.length;m++)
         {
            if(output4==products[m].brand)
            {
          output5+="<tr> <td>"+products[m].id+"</td><td>"+products[m].name+"</td><td>"+products[m].brand+"</td><td>"+products[m].os+"</td></tr>";
            }
         }
         
         output5+="</table>";
        
         $("#div2").html(output5);

         });

 
    
     });
