<?php
	$con = mysqli_connect('127.0.0.1','root','');
		
	mysqli_select_db($con,'tableflipper');
	
	// delete product
	$sql = "DELETE FROM sales WHERE BARCODE = '$_GET[id]'";
    $sql2 = " update location set oc = 0 , itnum = 'null' where itnum = '$_GET[id]' ";
				
    if( mysqli_query($con,$sql) && mysqli_query($con,$sql2)){
		
        echo '<script language="javascript">';
        echo 'alert("Item deleted.")';
        echo '</script>';
        echo '<script>window.location.href = "sales.php";</script>';
        
        
    }
    
    else{
        echo '<script language="javascript">';
        echo 'alert("Error! Item not deleted.")';
        echo '</script>';
        echo '<script>window.location.href = "sales.php";</script>';
    }
		
		
?>