<?php
    $page_title = 'product Page';
    require_once('includes/load.php');
    if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
 ?>
 


 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/styles.css">
</head>
<body>

<div class="header">
  <h1>Sales Page</h1>
</div>



<div class="menu li">
    <ul>
      <li><a href="home.php"> HOME</a> </li>
      <li><a href="product.php"> ITEMS</a> </li>
	  <li><a href="sales.php"> SALES</a> </li>
      
      
    </ul>
 </div>

<h1>Sales</h1>
<div class="col-3 col-s-3 menu">
<table border = "1">
<thead>

	<tr>
        <th>SALES NUMBER</th>
        <th>USERNAME</th>
		<th>BARCODE</th>
		<th>NUMBER</th>
		<th>NAME</th>
		<th>TYPE</th>
		<th>INFO</th>
		<th>BUYPRICE</th>
		<th>SELLPRICE</th>
		<th>MARKPRICE</th>
		<th>DATE</th>
		<th>EMAIL</th>
	</tr>
</thead>

<?php	
		$con = mysqli_connect('127.0.0.1','root', '');
		mysqli_select_db($con,'tableflipper');
        $sql = "SELECT * FROM sales";
        $result = mysqli_query($con,$sql);
      // output all products currently in sale
			while($row = mysqli_fetch_array($result) ){ 
				echo "<tr>";
                echo "<td>".$row['SALES_NUM']."</td>";
                echo "<td>".$row['USERNAME']."</td>";
				echo "<td>".$row['BARCODE']."</td>";
				echo "<td>".$row['NUM']."</td>";
				echo "<td>".$row['NAME']."</td>";
				echo "<td>".$row['TYPE']."</td>";
				echo "<td>".$row['INFO']."</td>";
				echo "<td>".$row['BUYPRICE']."</td>";
				echo "<td>".$row['SELLPRICE']."</td>";
				
				echo "<td>".$row['PURCHASE_DATE']."</td>";
				echo "<td>".$row['CUSTOMER_EMAIL']."</td>";
				echo "<td><a href=salesdelete.php?id=".$row['BARCODE']."><ul><li>DELETE</a></td>"; // delete product - links to 'salesdelete.php'
			}
			$con->close();
			
	?>
</table>
</div>
<br>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
  <p>Stop Table Flipping </p>
</div>
	</body>
</html>
