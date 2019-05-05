

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
* {
  box-sizing: border-box;
}

.row::after {
  content: "";
  clear: both;
  display: table;
}

[class*="col-"] {
  float: left;
  padding: 15px;
}

html {
  font-family: "Lucida Sans", sans-serif;
}

.header {
  background-color: #9933cc;
  color: #ffffff;
  padding: 15px;
}

.menu ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
}

.menu li {
  padding: 8px;
  margin-bottom: 7px;
  background-color: #33b5e5;
  color: #ffffff;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.menu li:hover {
  background-color: #0099cc;
}

.shopCart {
  background-color: #33b5e5;
  padding: 15px;
  color: #ffffff;
  text-align: center;
  font-size: 14px;
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
}

.footer {
  background-color: #0099cc;
  color: #ffffff;
  text-align: center;
  font-size: 12px;
  padding: 15px;
}

/* For mobile phones: */
[class*="col-"] {
  width: 100%;
}

@media only screen and (min-width: 600px) {
  /* For tablets: */
  .col-s-1 {width: 8.33%;}
  .col-s-2 {width: 16.66%;}
  .col-s-3 {width: 25%;}
  .col-s-4 {width: 33.33%;}
  .col-s-5 {width: 41.66%;}
  .col-s-6 {width: 50%;}
  .col-s-7 {width: 58.33%;}
  .col-s-8 {width: 66.66%;}
  .col-s-9 {width: 75%;}
  .col-s-10 {width: 83.33%;}
  .col-s-11 {width: 91.66%;}
  .col-s-12 {width: 100%;}
}
@media only screen and (min-width: 768px) {
  /* For desktop: */
  .col-1 {width: 8.33%;}
  .col-2 {width: 16.66%;}
  .col-3 {width: 25%;}
  .col-4 {width: 33.33%;}
  .col-5 {width: 41.66%;}
  .col-6 {width: 50%;}
  .col-7 {width: 58.33%;}
  .col-8 {width: 66.66%;}
  .col-9 {width: 75%;}
  .col-10 {width: 83.33%;}
  .col-11 {width: 91.66%;}
  .col-12 {width: 100%;}
}
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {background-color: #f2f2f2;}
</style>
    
</head>
<body>

<div class="header">
  <h1>Product Page</h1>
</div>


<div class="row">
  <div class="col-3 col-s-3 menu">
    <ul>
      <li><a href="cproduct.php"> HOME</a> </li>
    <li><a href="index.php"> LOGIN</a> </li>
    <li><a href="usersettings.php"> USER SETTINGS</a> </li>
    
    <li><a href="logout.php"> LOGOUT</a></li><br>
    <img src= "images/Top-10-Online-Shopping-Site.jpg" width="300" height="250">
      
      
      
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

  



	<?php
		
		// establish connction 
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'tableflipper');
		
        $sql2 = "SELECT * FROM inventory   ";
        $loca =mysqli_query($con,$sql2);
      

			// output all products currently in inventory
			while($row = mysqli_fetch_array($loca) ){
                
               
                
				echo "<tr >";
				
				echo "<td >".$row['NAME']."</td>";
				echo "<td>".$row['TYPE']."</td>";
				echo "<td>".$row['INFO']."</td>";
                echo "<td><a href=lay.php?id=".$row['BARC']."><img src='images/".$row['image']."' width=\"100\" height=\"100\"></td>";
                //echo "<img src='images/".$row['image']."' >";
               
			}
	?>
</table>
</div>
<div class="col-3 col-s-12">
    
    <div class="menu li"><ul>
    <li><a href="shoppingcart.php"> SHOPPING CART</a> </li>
    <li><a href="vieworder.php"> PURCHASES</a> </li>
    </div>
    <div class="shopCart">
      <h2>Buy Now</h2>
	  <form action="checkout.php" method="post">
	  <input type="submit" value="Checkout" />
	  </form>
    
    </div>
    <br>
    <img src= "images/onlineshopping1_1280-1-770x433.jpg" width="250" height="200">
  </div>
</div>
    
    
    
    
<br><br><br><br><br><br><br><br><br><br><br>
<div class="footer">
  <p>Stop Table Flipping And Buy Here</p>
</div>
</body>
</html>

