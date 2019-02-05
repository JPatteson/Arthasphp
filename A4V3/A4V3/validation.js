function validate()
{
	var name = document.getElementById("name").value;
	var address = document.getElementById("address").value;
	var city = document.getElementById("city").value;
	var province = document.getElementById("province").value;
	var postalCode = document.getElementById("postalCode").value;
	var quantity = document.getElementById("quantity").value;
	var errorMessage = "";
	var allValid = true;
	if (name == "")
	{
		errorMessage += "Name cannot be blank. ";
		allValid = false;
		document.getElementById("name").focus();
	}
	if (address == "")
	{
		errorMessage += "<br>Address cannot be blank. ";
		allValid = false;
		document.getElementById("address").focus();
	}
	if (city == "")
	{
		errorMessage += "<br>City cannot be blank. ";
		allValid = false;
	}
	if (province == "")
	{
		errorMessage += "<br>Province must be selected. ";
		allValid = false;
	}
	if (postalCode == "")
	{
		errorMessage += "<br>Name cannot be blank. ";
		allValid = false;
	}
	if (allValid == false)
	{
		document.getElementById("output").innerHTML = errorMessage;	
	}
	return allValid;
	  
}
function clearOutput()
{
	document.getElementById("output").innerHTML = ""; 
}
