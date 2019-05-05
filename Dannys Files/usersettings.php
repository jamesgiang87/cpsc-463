<?php
    ob_start();
    $page_title = 'User Settings';
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
</head>
<body>

<div class="header">
  <h1>User Settings</h1>
</div>



<div class="menu li">
    <ul>
      <li><a href="cproduct.php"> HOME</a> </li>

      
      
    </ul>
 </div>

<h1>Change Password</h1>
<div class="col-3 col-s-3 menu">
    
    <form action = "usersettings.php" method = "post">
<b>Current Password:</b>
    <br>
<input type = "password" name = "current_pw"> 
    <br>
<b>New Password:</b>
    <br>
<input type = "password" name = "new_pw"> 
    <br>
<b>Retype New Password:</b>
    <br>
<input type = "password" name = "retyped_pw"> 
    <br><br>
<input type = "submit" name = "submit" value = "Submit">
</form>
    
    <?php
			
			if(isset($_POST['submit']))
			{
				
					//see if new pw is the same as retryped pw
				if ($_POST['new_pw'] != $_POST['retyped_pw'])
				{
					
                    echo '<script language="javascript">';
                    echo 'alert("New passwords do not match.")';
                    echo '</script>';
				}
			
				else 
				{
					$con = mysqli_connect('127.0.0.1','root', '');
		
					mysqli_select_db($con,'tableflipper');
		
					require_once('includes/load.php');
		
					//$_SESSION['user_id']; is the usder if the account is signed on
				
					$sql = "SELECT `password` FROM `users` 
					WHERE `id` = '{$_SESSION['user_id']}'";
				
					$result = mysqli_query($con,$sql);
					
					
					if (!$result)
					{
						echo "Database query failed";
						
					}
					else
					{
						$row = mysqli_fetch_array($result); //should just be one because one user id
						//pw does not match up with pw
						
						if ( $row['password'] != sha1($_POST['current_pw']) ) //Need shal1 because its the cyptograph that the example used 
						{
							
                            echo '<script language="javascript">';
                            echo 'alert("Your current password is not correct.")';
                            echo '</script>';
						}
						else
						{
							$new_pw = sha1($_POST['new_pw']);
							//echo $new_pw;
							$sql = "UPDATE `users` SET `password` = '{$new_pw}' WHERE `id` = '{$_SESSION['user_id']}'" ;
							$result = mysqli_query($con,$sql);
							
                            echo '<script type="text/javascript"> alert("Password Changed.") </script>';
                echo '<script>window.location.href = "cproduct.php";</script>';
						}
					}
				}
				
				
			}
		
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
