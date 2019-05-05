<font face="Verdana"><center><h1>

<script>
// JS functions for popups
function processed(){
	alert ("Order processed. Click OK to return to Homepage.")
}
function notProcessed(){
	alert ("Order not processed. Click OK to return to your shopping cart.")
}
</script>

<!-- NOTE: MUST BE UPDATED TO WORK WITH APPRORIATE DATABASE -->
<?php
	// establish connection
	$con = mysqli_connect('127.0.0.1','root','');
		
	// select database
	mysqli_select_db($con,'beyondshopper');
	
	$currentuser = 'username';
	
	// Clear shopping cart of user that is logged in
	$sql = "DELETE FROM shoppingcart WHERE username = '$currentuser'";
				
	// if SUCCESSFUL
	if( mysqli_query($con,$sql)){
		echo '<script>processed()</script>';
		// NOTE: CHANGE 'shoppingcart.php' TO HOMEPAGE LINK
		header("refresh:2; url=shoppingcart.php");	
	}
	// if UNSUCCESSFUL
	else{
		echo '<script>notProcessed()</script>';
		header("refresh:5; url=shoppingcart.php");	
	}
?>
</h1></center></font>