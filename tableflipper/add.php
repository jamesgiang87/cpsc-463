<?php
    $page_title = 'product Page';
    require_once('includes/load.php');
    if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
    ?>




<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/styles.css">
</head>
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





