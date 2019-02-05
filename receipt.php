<!DOCTYPE html>
	<head>
	
	</head>
	
	<body>
		<?php
			//Jesse Patteson
			//php for Assignment 4
			//Validating inputs and showing a receipt
			
			function validate()
			{
				$input['name'] = $_POST["name"];
				$input['address'] = $_POST["address"];
				$input['city'] = $_POST["city"];
				$input['province'] = $_POST["province"];
				$input['postalCode'] = $_POST["postalCode"];
				$input['quantity'] = $_POST["quantity"];
				$errorMessage = "";
				$allValid = true;
				if ($input['name'] == "")
				{
					$errorMessage .= "name cannot be blank. ";
					$allValid = false;
				}
				if ($input['address'] == "")
				{
					$errorMessage .= "address cannot be blank. ";
					$allValid = false;
				}
				if ($input['city'] == "")
				{
					$errorMessage .= "city cannot be blank. ";
					$allValid = false;
				}
				if ($input['province'] == "")
				{
					$errorMessage .= "province must be selected. ";
					$allValid = false;
				}
				if ($input['postalCode'] == "")
				{
					$errorMessage .= "name cannot be blank. ";
					$allValid = false;
				}
				if ($input['quantity'] == "" or !is_numeric($input['quantity']) or $input['quantity'] <=0)
				{
					$errorMessage .= "quantity must be a number greater than 0. ";
					$allValid = false;
				}	
				
				
				if ($allValid == false)
				{
					print $errorMessage;	
				}
				return $allValid;
			}//end function validate()
			
			
			if(validate())
			{
				$price = 20;
				$taxRate =1;
				$name = $_POST["name"];
				$province = $_POST["province"];
				$city = $_POST["city"];
				$postalCode = $_POST["postalCode"];
				$quantity = $_POST["quantity"];
				$address = $_POST["address"];
				$phoneNumber = $_POST["phoneNumber"];
				$email = $_POST["email"];
				$cost = $price * $quantity;
				print ("<strong>Your order has been sent please verify the information.</strong>");
				print ("<br><br>Shipping Info:");
				print ("<br><br>Name: $name");
				print ("<br>address: $address");
				print ("<br>Location: $city $province");
				print ("<br>Postal code: $postalCode");
				print ("<br>Phone number: $phoneNumber");
				print ("<br>email address: $email");
				print ("<br><br><strong>Order Information:</strong>");
				print ("<br><br>Quantity: $quantity");
			
				
				
				if ($province == "Ontario")
				{
					$taxRate = 0.13;
				}
				elseif ($province == "British Columbia")
				{
					$taxRate = 0.12;
				}
				elseif ($province == "Alberta")
				{
					$taxRate = 0.05;
				}
				elseif ($province == "Manitoba")
				{
					$taxRate = 0.13;
				}
				elseif ($province =="New Brunswick")
				{
					$taxRate = 0.15;
				}
				elseif ($province =="Newfoundland and Labrador")
				{
					$taxRate = 0.15;
				}
				elseif ($province =="Northwest Territories")
				{
					$taxRate = 0.05;
				}
				elseif ($province =="Nova Scotia")
				{
					$taxRate = 0.15;
				}
				elseif ($province =="Nunavut")
				{
					$taxRate = 0.05;
				}
				elseif ($province =="Prince Edward Island")
				{
					$taxRate = 0.15;
				}
				elseif ($province =="Quebec")
				{
					$taxRate = 0.14975;
				}
				elseif ($province =="Saskatchewan")
				{
					$taxRate = 0.11;
				}
				elseif ($province =="Yukon")
				{
					$taxRate = 0.05;
				}
				else 
				{
					print ("<br>You did not select a vailid province");
				}//end if statement for province
				
				$taxAmount = 0;
				$shipping = 0;
				$numberOfDays = 1;
				$secondsPerDay = 86400; // seconds in a day
				if ($cost >0 and $cost <=25)
				{
					$shipping = 3; 
					$numberOfDays = 1;
				}
				elseif ($cost >25 and $cost <=50)
				{
					$shipping = 4;
					$numberOfDays = 1;
				}
				elseif ($cost>50 and $cost <=75)
				{
					$shiping = 5;
					$numberOfDays = 3;
				}
				else
				{
					$shipping = 6;
					$numberOfDays = 4;
				}
				$deliveryDate = $numberOfDays * $secondsPerDay;
				$taxAmount = $cost * ($taxRate);
				print ("<br>Estimated delivery date:".date ("d-m-y", time() + $deliveryDate)); 
				print ("<br><br><strong>Cost Totals</strong>:");
				print ("<br><br>Shipping cost:"."$".($shipping));
				print ("<br>Tax rate:" .($taxRate * 100)."%");
				print ("<br>Tax amount: $$taxAmount"); 
				print ("<br>Subtotal: $$cost");
				$taxRate = $taxRate + 1;
				print ('<br>Total cost: $' . (($cost * $taxRate  + $shipping)));
			}//end if
		?>
	
	</body>
	
</html>