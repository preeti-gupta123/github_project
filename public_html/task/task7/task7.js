var temp="";
var oprator="";
var result="";
$(document).ready(function()
{
	$('.reset').click(function()
	{
		temp="";
		oprator="";
		result="";
		$('#show').val("");
	});
	$('.number').click(function()
	{
		temp+=$(this).val();
		$("#show").val(temp);
	});
	$('.opr').click(function()
	{
		var op=$(this).val();
		if(oprator=="")
		{
			oprator=op;
			result=temp;
			$('#show').val(result);
			temp="";
		}
		else if(oprator=="+")
        {
        	oprator=op;
			result=parseFloat(result)+parseFloat(temp);
			$('#show').val(result);
			temp="";
		}
		else if(oprator=="-")
		{
			oprator=op;
			result=parseFloat(result)-parseFloat(temp);
			$('#show').val(result);
			temp="";
		}
		else if(oprator=="*")
		{
			oprator=op;
			result=parseFloat(result)*parseFloat(temp)
			$('#show').val(result);
			temp="";
		}
		else if(oprator=="/")
		{
			oprator=op;
			result=parseFloat(result)/parseFloat(temp)
			$('#show').val(result);
			temp="";
		}
		else if(oprator=="=")
		{
			oprator=op;
		}
	});	
});