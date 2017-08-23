function myfunction()
{
	var age,weight;
	 age=number(document.getElementById("age").value);
    weight=number(document.getElementById("weight").value);
	if (age>=5 && age<=7 && weight>=15 weight<=20)
	{
		document.getElementById("coorect_result").value="true";
	}
	else{
		document.getElementById("coorect_result").value="false";
	}

	if (age>=8 && age<=10&& weight>=21 weight<=25)
	{
		document.getElementById("coorect_result").value="true";
	}
	else{
		document.getElementById("coorect_result").value="false";
	}

	if (age>=11 && age<=15&& weight>=26 weight<=30)
	{
		document.getElementById("coorect_result").value="true";
	}
	else{
		document.getElementById("coorect_result").value="false";
	}

	if (age>=16 && age<=20&& weight>=31 weight<=40)
	{
		document.getElementById("coorect_result").value="true";
	}
	else{
		document.getElementById("coorect_result").value="false";
	}



}
