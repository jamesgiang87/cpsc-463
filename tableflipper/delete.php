<?php
	$con = mysqli_connect('127.0.0.1','root','');
		
	mysqli_select_db($con,'tableflipper');
	
	// delete product
	$sql = "DELETE FROM inventory WHERE BARC = '$_GET[id]'";
    
				
    if( mysqli_query($con,$sql) ){
		
        echo '<script language="javascript">';
        echo 'alert("Item deleted.")';
        echo '</script>';
        echo '<script>window.location.href = "product.php";</script>';
        
        
    }
    
    else{
        echo '<script language="javascript">';
        echo 'alert("Error! Item not deleted.")';
        echo '</script>';
        echo '<script>window.location.href = "product.php";</script>';
    }
		
		
?>
