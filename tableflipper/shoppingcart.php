<?php
    $page_title = 'View Orders';
    require_once('includes/load.php');
    if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
    ?>
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
    <h1>Shopping Cart Page</h1>
    </div>
    <div class="col-3 col-s-3 menu">
    <ul>
    <li><a href="cproduct.php"> HOME</a> </li></div>


<?php
// SESSION_START used to keep TOTAL


		// establish connction 
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'tableflipper');
		
		// store current user's username
		$currentuser = $_SESSION['username'];
		
		// select table from database
        $sql2 = "SELECT * FROM shoppingcart WHERE username = '$currentuser'";
		
		// query all data from that table
        $records = mysqli_query($con,$sql2);
?>



<?php 
	// If no items in user's cart
	if (mysqli_num_rows($records)==0){?>
		<h1>Your Cart is Empty
<?php
		}
	// If 1 or more items in user's cart
	else{?>

<!-- Output Shopping Cart Table -->
        <div class="col-6 col-s-9"><div class="menu li">
<table >
	<thead>
		<tr>
			<th>Item Name</th>
			<th>Price</th>
		</tr>
	</thead>


<?php
// Create $sum to hold TOTAL of Shopping Cart
$sum = "0";

// Fill table with any products user added to shopping cart
while($row = mysqli_fetch_array($records) ){
				
				$sum += $row['PRICE']; // Calculate the TOTAL
		
				echo "<tr>";
				echo "<td>".$row['NAME']."</td>";
				echo "<td>".$row['PRICE']."</td>";
				
				// Link to remove item from shopping cart
				echo "<td><ul><li><a href=RemoveItem.php?id=".$row['num'].">Remove Item</a></td>";
		
		}
}
?>
</table>
</br>

<?php
// If Shopping Cart is not empty
if (mysqli_num_rows($records)>=1){
	echo " ";
	echo "Subtotal: $".$sum; // Subtotal (before tax + shipping)
	?></br><?php
	echo "Shipping calculated at checkout";
	$_SESSION['total'] = $sum; // Add TOTAL to Session Array to use during checkout
}
?>
</br></br>
	
    </center>
    </font>
    </center>
    </div></div>

<?php
	// If Shopping Cart is not empty, show 'Check Out' button
	if (mysqli_num_rows($records)>=1){
        ?><div class="col-3 col-s-12">
        
        
        <div class="shopCart">
        <h2>Buy Now</h2>
        <form action="checkout.php" method="post">
        <input type="submit" value="Checkout" />
        </form>
        
        </div>
        <br>
        
        </div>
        </div><?php
	}
?>

    
</body>
</html>
