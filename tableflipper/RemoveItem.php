<?php
session_start();
	// establish connection
	$con = mysqli_connect('127.0.0.1','root','');
		
	// select database
	mysqli_select_db($con,'tableflipper');

	// store current user's username 
	$currentuser = $_SESSION['username'];
	
	// remove the item from the user's shopping cart
	$sql = "DELETE FROM shoppingcart WHERE num = '$_GET[id]' and username = '$currentuser'";
			
	// if successful, refresh back to shopping cart
	if( mysqli_query($con,$sql))	
		header("refresh:1; url=shoppingcart.php");	
	// if successful, output "Not deleted" and refresh back to shopping cart
	else
		echo "Error! Unable to remove item from cart. Refreshing page.";
		header("refresh:3; url=shoppingcart.php");
?>
