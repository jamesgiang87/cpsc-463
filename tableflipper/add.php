<?php
    $page_title = 'product Page';
    require_once('includes/load.php');
    if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
    ?>




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
<body>

<body>
<div class="header">
  <h1>Add Product </h1>
</div>
<br>

<div class="menu li">
    <ul>
      <li><a href="home.php"> HOME</a> </li>
      <li><a href="product.php"> ITEMS</a> </li>
      <li><a href="sales.php"> SALES</a> </li>
      
    </ul>
 </div>

<div class="col-3 col-s-3 menu">

<form action="add.php" method="post" enctype="multipart/form-data">
<label id="first"> Barcode:</label><br>
<input type="text" name="BARC"><br/>

<label id="first"> Number:</label><br>
<input type="text" name="NUM"><br/>

<label id="first"> Name:</label><br>
<input type="text" name="NAME"><br/>

<label id="first"> Type:</label><br>
<input type="text" name="TYPE"><br/>

<label id="first"> Info:</label><br>
<input type="text" name="INFO"><br/>

<label id="first"> Buyprice:</label><br>
<input type="text" name="BUYPRICE"><br/>

<label id="first"> Sellprice:</label><br>
<input type="text" name="SELLPRICE"><br/>

<ul><li>
<label id="image"> image:</label><br>
<input type="file" name="image">




<button type="submit" name="save">SUBMIT</button>


</form>
<br>


</body>
</html>



<?php

		$con = mysqli_connect('127.0.0.1','root', '');
		
		mysqli_select_db($con,'tableflipper');
		
		if(isset($_POST['save'])){
            
            $image = $_FILES['image']['name'];
            $target = "images/".basename($image);
			
			$sql = "INSERT INTO inventory (BARC, NUM, NAME, TYPE, INFO,  BUYPRICE, SELLPRICE, IMAGE)
			VALUES ('".$_POST["BARC"]."','".$_POST["NUM"]."','".$_POST["NAME"]."','".$_POST["TYPE"]."','".$_POST["INFO"]."','".$_POST["BUYPRICE"]."','".$_POST["SELLPRICE"]."','$image' )";
            
           
			
			$result = mysqli_query($con,$sql);
           
            
            if($result){
                
                    echo '<script language="javascript">';
                    echo 'alert("Item added.")';
                    echo '</script>';
                    echo '<script>window.location.href = "product.php";</script>';
                
                
                
                    
                
            }
            else {
                echo '<script language="javascript">';
                echo 'alert("Item is not added!!!!!!")';
                echo '</script>';
                echo '<script>window.location.href = "product.php";</script>';
         
                
            }
            
            
		}
    

?>





