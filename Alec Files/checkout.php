<html>
<body>
<title>Checkout</title>
<font face="Verdana">
<h1>Checkout</h1>

<?php
session_start();	// Used to store TOTAL
$sum = $_SESSION['total']; // Get TOTAL from Shopping Cart
$sumplusshipping = $sum + '4.95'; // TOTAL = TOTAL + Shipping

		// NOTE: CHANGE ANY DETAILS TO WORK WITH APPRORIATE DATABASE

		// establish connection
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'beyondshopper');
		
		// NOTE: MUST CHANGE $currentuser TO HOLD THE USERNAME OF
		//       THE CURRENT USER THAT IS LOGGED IN AND NOT 'username'
		$currentuser = 'username';
		
		// If user clicks "Submit Order"
		if(isset($_POST['submitorder'])){
			
			// Add all data into sales table
			// NOTE: MUST BE UPDATED TO WORK WITH APPRORIATE TABLE FROM YOUR DATABASE
			$sql = "INSERT INTO sales (username, Email, FirstName, LastName, Address, Apartment, 
			City, Country, State, ZIP, CardNumber, NameOnCard, Expiration, Code, Total) VALUES ('$currentuser','".$_POST["EMAIL"]."','".$_POST["FIRST"]."','".$_POST["LAST"]."','".$_POST["ADDR"]."',
			'".$_POST["APT"]."','".$_POST["CITY"]."','".$_POST["CTRY"]."','".$_POST["ST"]."','".$_POST["ZIP"]."',
			'".$_POST["CARDNUM"]."','".$_POST["CARDNAME"]."','".$_POST["EXP"]."','".$_POST["CODE"]."','$sumplusshipping')";
			
			$results = mysqli_query($con,$sql);
	
						
			// Refresh to clearcart.php to clearcart after order processed
			header("refresh:1; url=clearcart.php");
		}
?>

<!-- Form for user to enter all information required for submitting order -->
<form action="checkout.php" method="post">
Contact information</br>
<input type="text" name="EMAIL" placeholder="Email"><br/></br>
Shipping information</br>
<input type="text" name="FIRST" placeholder="First Name"><br/>
<input type="text" name="LAST" placeholder="Last Name"><br/>
<input type="text" name="ADDR" placeholder="Address"><br/>
<input type="text" name="APT" placeholder="Apartment (optional)"><br/>
<input type="text" name="CITY" placeholder="City"><br/>
<input type="text" name="CTRY" placeholder="Country/Region"><br/>
<input type="text" name="ST" placeholder="State"><br/>
<input type="text" name="ZIP" placeholder="ZIP code"><br/></br>
Shipping method</br>
<!-- Single shipping method to keep it simple -->
$4.95 - Standard Flat Rate (3-5 Business Days After Fulfillment)</br>
</br>
Payment information (Accepted Cards: Visa, Mastercard, Amex)</br>
<input type="text" name="CARDNUM" placeholder="Card number"><br/>
<input type="text" name="CARDNAME" placeholder="Name on card"><br/>
<input type="text" name="EXP" placeholder="Expiration date (MM/YY)"><br/>
<input type="text" name="CODE" placeholder="Security code"><br/></br>
Billing address</br>
<select name="billingaddress">
	<option value="Same">Same as shipping address</option>
	<!-- 'DIFFERENT BILLING ADDRESS' option does not work currently -->
	<option value="Different">Use a different billing address</option>
</select>
</br></br>

<!-- Output Subtotal, Shipping cost, and Total -->
Subtotal
<?php echo "$".$sum; ?></br>
Shipping $4.95</br></br>

Total
<?php echo "$".$total = $sum + "4.95"; ?></br></br>

<!-- User clicks here to submit order, then goes to clearcart.php -->
<button type="submit" name="submitorder">Submit Order</button>

</form>
<br>
</font>
</body>
</html>