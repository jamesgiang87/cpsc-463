

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/styles.css">

</head>
<body>

<div class="header">
  <h1>Product Page</h1>
</div>


<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
      <li><a href="home.php"> HOME</a> </li>
      
      
      
    </ul>
 </div>

  <div class="col-6 col-s-9">
    

    <table >
<thead>

	<tr>
		
		<th>NAME</th>
		<th>TYPE</th>
		<th>INFO</th>
        <th>IMAGE</th>

	</tr>
</thead>
<tbody>
  </div>

  

</body>
</html>

	<?php
		
		// establish connction 
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'tableflipper');
		
        $sql2 = "SELECT * FROM inventory   ";
        $loca =mysqli_query($con,$sql2);
      

			// output all products currently in inventory
			while($row = mysqli_fetch_array('loca') ){
                
               
                
				echo "<tr>";
				echo "<td >".$row['NAME']."</td>";
				echo "<td>".$row['TYPE']."</td>";
				echo "<td>".$row['INFO']."</td>";
                echo "<td><img src='images/".$row['image']."' width=\"100\" height=\"100\"></td>";
                //echo "<img src='images/".$row['image']."' >";
               
			}
	?>
</table>
</div>
<div class="col-3 col-s-12">
    <div class="shopCart">
      <h2>Buy Now</h2>
	  <form action="product1.php" method="post">
	  <input type="submit" value="Add to Shopping Cart" />
	  </form>
    </div>
  </div>
</div>
<br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
  <p>Stop Table Flipping And Buy Here</p>
</div>
</body>
</html>

