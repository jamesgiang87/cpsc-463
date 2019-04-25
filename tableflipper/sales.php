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
<title><h1>
Add Sales</h1> </title>
Fill out form and click SUBMIT:

<form action = "sales.php" method = "post">
<label id="first"> Item number:</label><br>
<input type="text" Name="BARC"><br/>
<label id="first"> Username:</label><br>
<input type="text" name="USERNAME"><br/>
<label id="first"> Customer Email:</label><br>
<input type="text" name="EMAIL"><br/>
<button type="submit" name="submit">SUBMIT</button></form>
</body>

<?php

	$con = mysqli_connect('127.0.0.1','root', '');
	mysqli_select_db($con,'tableflipper');
	require_once('includes/load.php');
	
	
	if (isset ($_POST['submit']))
    
	{
        
        $sql = "SELECT * FROM `users` WHERE `username` = '{$_POST['USERNAME']}'";
        $result = mysqli_query($con,$sql);
        
        if (!$result || mysqli_num_rows($result)== 0 )
        {
           
            echo '<script language="javascript">';
            echo 'alert("Username does not exist in database.")';
            echo '</script>';
            echo '<script>window.location.href = "sales.php";</script>';
        }
        
       
		//check inventory delete from inventory if its there	
		$sql = "SELECT * FROM `inventory` WHERE `num` = '{$_POST['BARC']}'";
		$result = mysqli_query($con,$sql);
		
		if (!$result || mysqli_num_rows($result)== 0 )
		{
		
            echo '<script language="javascript">';
            echo 'alert("Item is not in inventory.")';
            echo '</script>';
            echo '<script>window.location.href = "sales.php";</script>';
						
		}
		else
		{
		//im assuming we have multiple of one items but same barcode
		
		//Create Date
		date_default_timezone_set('America/Los_Angeles');
		$date = date("Y-m-d H:i:s");
		//echo 'Right Now is :', $date;
		$row = mysqli_fetch_row($result);
		//$result_barc =  $row[0];
		$result_num =  $row[1];
		//$result_name =  $row[2];
		//$result_type =  $row[3];
		//$result_info =  $row[4];
		//$result_buyprice =  $row[5];	
		//$result_sellprice =  $row[6];
		//$result_markprice =  $row[7];		
		//get all the infomation from $result and put it in an array or sort;
		
		//delete inventory
		$sql = "DELETE FROM `inventory` WHERE `num` = '{$_POST['BARC']}' LIMIT 1";
		mysqli_query($con,$sql);
            
        $sql2 = " update location set oc = 0 , itnum = 'null' where itnum = '$result_num'";
            
        mysqli_query($con,$sql2);
		
		
            //random number generator
            $random_sales_num = rand();
            
            $sql = "SELECT * FROM `sales` WHERE `SALES_NUM` = '{$random_sales_num}'";
            $result = mysqli_query($con,$sql);
            
            while ((!$result || mysqli_num_rows($result) != 0 ))
            {
                $random_sales_num = rand();
                $sql = "SELECT * FROM `sales` WHERE `SALES_NUM` = '{$random_sales_num}'";
                $result = mysqli_query($con,$sql);
            }
            
            //add to sales
            $sql = "INSERT INTO sales(BARCODE,PURCHASE_DATE,CUSTOMER_EMAIL, BUYPRICE,INFO,NAME,NUM,SELLPRICE,TYPE,SALES_NUM,USERNAME)
            VALUES ('{$row[0]}','{$date}','{$_POST["EMAIL"]}','{$row[5]}','{$row[4]}','{$row[2]}','{$row[1]}','{$row[6]}','{$row[3]}','{$random_sales_num}', '{$_POST["USERNAME"]}')";
            $result = mysqli_query($con,$sql);
		
		if(!$result)
		{
			echo "query failed";
		}
		else
		{
            echo '<script language="javascript">';
            echo 'alert("sale added.")';
            echo '</script>';
            echo '<script>window.location.href = "sales.php";</script>';
		}
		}
		
    }
	$con->close();
?>
<h1>Sales:</h1>
<body>
<table class="table table-striped table-bordered table-hover table-condensed">
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
				echo "<td><a href=salesdelete.php?id=".$row['BARCODE'].">DELETE</a></td>"; // delete product - links to 'salesdelete.php'
			}
			$con->close();
	?>
</html>
