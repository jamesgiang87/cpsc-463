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

<?php
session_start();
	// establish connection
	$con = mysqli_connect('127.0.0.1','root','');
		
	// select database
	mysqli_select_db($con,'tableflipper');
	
	$currentuser = $_SESSION['username'];
	
	// Clear shopping cart of user that is logged in
	$sql = "DELETE FROM shoppingcart WHERE username = '$currentuser'";
				
	// if SUCCESSFUL
	if( mysqli_query($con,$sql)){
		echo '<script>processed()</script>';
		header("refresh:2; url=cproduct.php");	
	}
	// if UNSUCCESSFUL
	else{
		echo '<script>notProcessed()</script>';
		header("refresh:5; url=shoppingcart.php");	
	}
?>
</h1></center></font>