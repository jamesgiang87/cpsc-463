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
<head>
<title>Inventory</title>
</head>
<h1>Inventory:</h1>
<body>
<table class="table table-striped table-bordered table-hover table-condensed">
<thead>

	<tr>
		<th>BARCODE</th>
		<th>NUMBER</th>
		<th>NAME</th>
		<th>TYPE</th>
		<th>INFO</th>
        <th>IMAGE</th>

	</tr>
</thead>
<tbody>
	<?php
		
		// establish connction 
		$con = mysqli_connect('127.0.0.1','root', '');
		
		// select database
		mysqli_select_db($con,'tableflipper');
		
        $sql2 = "SELECT * FROM inventory   ";
        $loca =mysqli_query($con,$sql2);
      

			// output all products currently in inventory
			while($row = mysqli_fetch_array($loca) ){
                
               
                
				echo "<tr>";
				echo "<td>".$row['BARC']."</td>";
				echo "<td>".$row['NUM']."</td>";
				echo "<td>".$row['NAME']."</td>";
				echo "<td>".$row['TYPE']."</td>";
				echo "<td>".$row['INFO']."</td>";
                echo "<td><img src='images/".$row['image']."' width=\"100\" height=\"100\"></td>";
                //echo "<img src='images/".$row['image']."' >";
               
			}
	?>
</table>

	
</body>
</html>

