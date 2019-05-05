<?php
    $page_title = 'View Orders';
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


	<?php
    session_start();
    // establish connection
    $con = mysqli_connect('127.0.0.1','root','');
    
    // select database
    mysqli_select_db($con,'tableflipper');
    
    $currentuser = $_SESSION['username'];
    
    
    
    $item = $_GET['id'];
    $sql = "SELECT * FROM inventory WHERE  BARC  = '$_GET[id]'";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_row($result);
    $result_num =  $row[1];
    $result_name =  $row[2];
    $result_price = $row[6];
   
    $sql1 = "INSERT INTO shoppingcart(USERNAME,NAME, NUM,PRICE) VALUES ('$currentuser', '$result_name',$result_num,'$result_price')";
    
    
    if( mysqli_query($con,$sql1) ){
        
        echo '<script language="javascript">';
        
        echo 'alert("Item has been added.")';
        echo '</script>';
        echo '<script>window.location.href = "cproduct.php";</script>';
        
        
    }
    
    else{
        echo '<script language="javascript">';
        echo 'alert("Error! Item not added.")';
        echo '</script>';
        echo '<script>window.location.href = "cproduct.php";</script>';
    }
      
			
	?>
