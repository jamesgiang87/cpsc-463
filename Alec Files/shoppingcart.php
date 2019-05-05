<html>
<head>
<title>Shopping Cart</title>
</head>
<center>
<font face = "verdana">
<h1>Shopping Cart</h1>
<body>

<!-- ADD CHECK IF LOGGED IN -->

<!-- NOTE: CHANGE DETAILS TO WORK WITH APPROPRIATE DATABASE -->
<?php
// SESSION_START used to keep TOTAL
session_start();

		// establish connction 
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'beyondshopper');
		
		// NOTE: CHANGE '$currentuser' TO STORE THE USERNAME OF THE 
		//       CURRENT USER THAT IS LOGGED IN
		$currentuser = 'username';
		
		// select table from database
        $sql2 = "SELECT * FROM shoppingcart WHERE username = '$currentuser'";
		
		// query all data from that table
        $records = mysqli_query($con,$sql2);
?>



<?php 
	// If no items in user's cart
	if (mysqli_num_rows($records)==0){?>
		Your Cart is Empty
<?php
		}
	// If 1 or more items in user's cart
	else{?>

<!-- Output Shopping Cart Table -->
<table border = "2" cellpadding = "2" cellspacing = "2" width = >
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
				echo "<td><a href=RemoveItem.php?id=".$row['NAME'].">Remove Item</a></td>";
		
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
	
<!-- Button to homepage for the customer to continue browsing -->
<!-- NOTE: CHANGE 'index.php' TO PHP FILE OF THE HOMEPAGE -->
	<button type = "button" onclick = "location.href = 'index.php';">Continue Browsing</button>
</center>
</br>
<?php
	// If Shopping Cart is not empty, show 'Check Out' button
	if (mysqli_num_rows($records)>=1){
	?><center><button type = "button" onclick = "location.href = 'checkout.php';">Check Out</button><?php
	}
?>
</center>
</font>
</center>
</body>
</html>
