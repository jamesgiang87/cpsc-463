<?php
    $page_title = 'Home Page';
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
<title>Add Products</title>
<h1>Add Products</h1>
Fill out form and click SUBMIT:



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





