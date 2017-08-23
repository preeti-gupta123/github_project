function myfunction()

	

{

	var name,age,weight;
	name=document.getElementById("name").value;
	 age=document.getElementById("age").value;
    weight=document.getElementById("weight").value;
	if (age>=5 & age<=7)
	{
		if(weight<15)
	
	{
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 15KG at an age between 5 to 7 ";

	}
	else if(weight>20){
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 20KG at an age between 5 to 7 ";
	}
	else
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is perfect"	
	}


	if (age>=8 & age<=10 )
	{
if(weight<21)
	{
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 21KG at an age between 8 to 10";
	}
	else if(weight>25){
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 25KG at an age between 8 to 10";
	}
	else
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is perfect"	
	}


	if (age>=11 & age<=15)
	{
		if(weight<26)
	
	{
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 26KG at an age between 11 to 15";
	}
	else if(weight>30){
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 15KG at an age between 11 to 15";
	}
	else
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is perfect"
}

	if (age>=16 & age<=20)
	{
		if(weight<31)
	

	{
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 26KG at an age between 16 to 20";
	}

	else if (weight>40){
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is less than recommended value of 30KG at an age between 16 to 20";
	}

else
		document.getElementById("coorect_result").innerHTML="Hello   "+name+"  !!!  Your weight is perfect"

}

}
