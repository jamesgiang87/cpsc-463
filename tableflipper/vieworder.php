<?php
    $page_title = 'View Orders';
    require_once('includes/load.php');
    if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
    ?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
<div class="col-md-12">
<?php echo display_msg($msg); ?>


<?php include_once('layouts/footer.php'); ?>
<div class="panel">

<html>
<body>

<h2>Your Orders</h2>
<table class="table table-striped table-bordered table-hover table-condensed">
<thead>

	<tr>
		<th>ORDER NUMBER</th>
		<th>ITEM NAME</th>
        <th>PRICE</th>
		<th>PURCHASE DATE</th>
	</tr>
</thead>
<tbody>
	<?php
        $customer = $_SESSION['username']; 
    
		$con = mysqli_connect('127.0.0.1','root', '');
		mysqli_select_db($con,'tableflipper');
    
        $query2 = "SELECT SALES_NUM, NAME, SELLPRICE, PURCHASE_DATE FROM sales WHERE USERNAME = '$customer'";
        $display = mysqli_query($con,$query2);
      
			// Output customer's orders
			while($row = mysqli_fetch_array($display) ){
                
				echo "<tr>";
				echo "<td>".$row['SALES_NUM']."</td>";
				echo "<td>".$row['NAME']."</td>";
                echo "<td>".$row["SELLPRICE"]."</td>";
				echo "<td>".$row['PURCHASE_DATE']."</td>";
			}
	?>
</table>

</body>
</html>
