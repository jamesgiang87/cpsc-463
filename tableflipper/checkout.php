<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
    box-sizing: border-box;
}

.row::after {
content: "";
clear: both;
display: table;
}

[class*="col-"] {
    float: left;
padding: 15px;
}

html {
    font-family: "Lucida Sans", sans-serif;
}

.header {
    background-color: #9933cc;
color: #ffffff;
padding: 15px;
}

.menu ul {
    list-style-type: none;
margin: 0;
padding: 0;
}

.menu li {
padding: 8px;
    margin-bottom: 7px;
    background-color: #33b5e5;
color: #ffffff;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
    background-color: #0099cc;
}

.shopCart {
    background-color: #33b5e5;
padding: 15px;
color: #ffffff;
    text-align: center;
    font-size: 14px;
    box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
    background-color: #0099cc;
color: #ffffff;
    text-align: center;
    font-size: 12px;
padding: 15px;
}

/* For mobile phones: */
[class*="col-"] {
width: 100%;
}

@media only screen and (min-width: 600px) {
    /* For tablets: */
    .col-s-1 {width: 8.33%;}
    .col-s-2 {width: 16.66%;}
    .col-s-3 {width: 25%;}
    .col-s-4 {width: 33.33%;}
    .col-s-5 {width: 41.66%;}
    .col-s-6 {width: 50%;}
    .col-s-7 {width: 58.33%;}
    .col-s-8 {width: 66.66%;}
    .col-s-9 {width: 75%;}
    .col-s-10 {width: 83.33%;}
    .col-s-11 {width: 91.66%;}
    .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
    /* For desktop: */
    .col-1 {width: 8.33%;}
    .col-2 {width: 16.66%;}
    .col-3 {width: 25%;}
    .col-4 {width: 33.33%;}
    .col-5 {width: 41.66%;}
    .col-6 {width: 50%;}
    .col-7 {width: 58.33%;}
    .col-8 {width: 66.66%;}
    .col-9 {width: 75%;}
    .col-10 {width: 83.33%;}
    .col-11 {width: 91.66%;}
    .col-12 {width: 100%;}
}
table {
    border-collapse: collapse;
width: 100%;
}

th, td {
    text-align: left;
padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
    </style>
    
    </head>
    <body>
    
    <div class="header">
    <h1>Product Page</h1>
    </div>
    
    
    <div class="row">
    <div class="menu li"><ul>
    <ul>
    <li><a href="cproduct.php"> HOME</a> </li>
    
    
    
    
    </ul>
    </div>
    
    

<?php
session_start();	// Used to store TOTAL
$sum = $_SESSION['total']; // Get TOTAL from Shopping Cart
$sumplusshipping = $sum + '4.95'; // TOTAL = TOTAL + Shipping

		// establish connection
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'tableflipper');
		
		// store current user's username
		$currentuser = $_SESSION['username'];
    
    
		
		// If user clicks "Submit Order"
		if(isset($_POST['submitorder'])){
            
            
            $sql = "SELECT * FROM `shoppingcart` WHERE `username` ='{$_SESSION['username']}'";
            $result = mysqli_query($con,$sql);
            
            while($row1 = mysqli_fetch_array($result) ){
            $sql1 = "SELECT * FROM `inventory` WHERE `num` = '{$row1[2]}'";
            $result1 = mysqli_query($con,$sql1);
            
            date_default_timezone_set('America/Los_Angeles');
            $date = date("Y-m-d H:i:s");
            
            $row = mysqli_fetch_row($result1);
            
            $result_num =  $row[1];
                $random_sales_num = rand();
                $sql3 = "INSERT INTO sales(BARCODE,PURCHASE_DATE,CUSTOMER_EMAIL, BUYPRICE,INFO,NAME,NUM,SELLPRICE,TYPE,SALES_NUM,USERNAME)
                VALUES ('{$row[0]}','{$date}','{$_POST["EMAIL"]}','{$row[5]}','{$row[4]}','{$row[2]}','{$row[1]}','{$row[6]}','{$row[3]}','{$random_sales_num}', '$currentuser')";
                $result3 = mysqli_query($con,$sql3);
            }
			// Add all data into orders table
			$sql2 = "INSERT INTO orders (username, Email, FirstName, LastName, Address, Apartment,
			City, Country, State, ZIP, CardNumber, NameOnCard, Expiration, Code, Total) VALUES ('$currentuser','".$_POST["EMAIL"]."','".$_POST["FIRST"]."','".$_POST["LAST"]."','".$_POST["ADDR"]."',
			'".$_POST["APT"]."','".$_POST["CITY"]."','".$_POST["CTRY"]."','".$_POST["ST"]."','".$_POST["ZIP"]."',
			'".$_POST["CARDNUM"]."','".$_POST["CARDNAME"]."','".$_POST["EXP"]."','".$_POST["CODE"]."','$sumplusshipping')";
			
			$results2 = mysqli_query($con,$sql2);
	
						
			// Refresh to clearcart.php to clear the shopping cart after order processed
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
