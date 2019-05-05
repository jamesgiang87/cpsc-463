<?php
	// establish connection
	$con = mysqli_connect('127.0.0.1','root','');
		
	// select database
	mysqli_select_db($con,'beyondshopper');

	// NOTE: INSTEAD OF 'username', MUST CHANGE $CURRENTUSER TO HOLD
	//       USERNAME OF USER THAT IS LOGGED IN
	$currentuser = 'username'
	
	// remove the item from the user's shopping cart
	$sql = "DELETE FROM shoppingcart WHERE (NAME = '$_GET[id]' AND username = '$currentuser')";
			
	// if successful, refresh back to shopping cart
	if( mysqli_query($con,$sql))	
		header("refresh:1; url=shoppingcart.php");	
	// if successful, output "Not deleted" and refresh back to shopping cart
	else
		echo "Error! Item not deleted.";
		header("refresh:5; url=shoppingcart.php");
?>