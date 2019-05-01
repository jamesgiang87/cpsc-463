
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
  <h1>Product Page</h1>
</div>



<div class="menu li">
    <ul>
      <li><a href="home.php"> HOME</a> </li>
      <li><a href="product.php"> ITEMS</a> </li>
      <li><a href="sales.php"> SALES</a> </li>
      
    </ul>
 </div>


  <div class="col-3 col-s-3 menu">
    <ul><li>
		Search:
		<form action="" method="post">
		<input name="search" type="search" placeholder="Search All" autofocus>
		<input type="submit" name="button" onclick="location='product.php'">
		<input type="button" value="Refresh" onclick="location='product.php'" />
		</form></br>
		</ul>
	</div>
	
	<div class="col-3 col-s-3 menu">
		<ul><li>
		Check Product Quantity:
		<form action="" method="post">
		<input name="sum" type="search" placeholder="Enter Barcode" >
		<input type="submit" name="SumButton" onclick="location='product.php'">
		<input type="button" value="Refresh" onclick="location='product.php'" />
		</form></br>
			
	</ul>
	</div>
	<div class="col-3 col-s-3 menu">
	
<table border = "1">
<thead>

	<tr>
		<th>BARCODE</th>
		<th>NUMBER</th>
		<th>NAME</th>
		<th>TYPE</th>
		<th>INFO</th>
		
		<th>BUYPRICE</th>
		<th>SELLPRICE</th>

	</tr>
</thead>
<tbody>
	<?php
		
		// establish connction 
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'tableflipper');
		
        $sql2 = "SELECT * FROM inventory  ";
        $loca =mysqli_query($con,$sql2);
      

	
	
		if(isset($_POST['SumButton'])){	
			$sum=$_POST['sum'];
			$data = "SELECT * FROM inventory WHERE BARC = '{$sum}'";
			$query=mysqli_query($con,$data);
			$numRows = mysqli_num_rows($query);
			echo '<h2>'."Barcode Entered: ".$sum;
			echo "<br>Quantity = ".$numRows.'</h2>';
		}
	  
		if(isset($_POST['button'])){    //trigger button click
			$search=$_POST['search'];
			$data = "SELECT * FROM inventory WHERE  BARC = '{$search}' || NUM = '{$search}'
				|| NAME = '{$search}' || TYPE = '{$search}' || INFO = '{$search}'
				|| BUYPRICE = '{$search}' || SELLPRICE = '{$search}' Group by num ";
			$query=mysqli_query($con,$data);
            
            
            $count=0;
	
			// outputs results from search
			while($row = mysqli_fetch_array($query)){
                
				echo "<tr>";
				echo "<td>".$row['BARC']."</td>";
				echo "<td>".$row['NUM']."</td>";
				echo "<td>".$row['NAME']."</td>";
				echo "<td>".$row['TYPE']."</td>";
				echo "<td>".$row['INFO']."</td>";
				echo "<td>".$row['BUYPRICE']."</td>";
				echo "<td>".$row['SELLPRICE']."</td>";
				
				//echo "<td>".$row['QUANTITY']."</td>";
				echo "<td><a href=delete.php?id=".$row['BARC'].">DELETE</a></td>";
                $count = $count + 1;
			}
		}

	
	
	
	
		else{
			// output all products currently in inventory
			while($row = mysqli_fetch_array($loca) ){
                                
				echo "<tr>";
				echo "<td>".$row['BARC']."</td>";
				echo "<td>".$row['NUM']."</td>";
				echo "<td>".$row['NAME']."</td>";
				echo "<td>".$row['TYPE']."</td>";
				echo "<td>".$row['INFO']."</td>";
                
				echo "<td>".$row['BUYPRICE']."</td>";
				echo "<td>".$row['SELLPRICE']."</td>";
		
				echo "<td><a href=delete.php?id=".$row['BARC']."><ul><li>DELETE</a></td>"; // delete product - links to 'delete.php'
			}
		}
	?>
</table>



		


		<ul><li><a href="add.php"  >Add Products</a></li></div>
		<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>


<div class="footer">
  <p>Stop Table Flipping </p>
</div>
</body>
</html>

