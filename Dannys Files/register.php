<?php
  ob_start();
  require_once('includes/load.php');
?>

<?php include_once('layouts/header.php'); ?>
<div class="register-page">
    <div class="text-center">
       <h1>Registration</h1>
     </div>
     <?php echo display_msg($msg); ?>
      <form method="post" action="register.php" class="clearfix">
          
        <div class="form-group">
              <label for="username" class="control-label">Username</label>
              <input type="name" class="form-control"  name="username" placeholder="Username" required>
        </div>
          
          <div class="form-group">
            <label for="Password" class="control-label">Password</label>
            <input type="password" name= "password" title="Six or more characters" class="form-control" placeholder="Password" required>
          </div>
          
          <div class="form-group">
            <label for="Password" class="control-label">Retype Password</label>
            <input type="password" name= "cpassword" class="form-control" placeholder="Retype Password" required>
          </div>
          
        <div class="form-group">
              <label for="firstname" class="control-label">First Name</label>
              <input type="name" class="form-control" name="fname" placeholder="First" required>
        </div>
          
        <div class="form-group">
              <label for="lastname" class="control-label">Last Name</label>
              <input type="name" class="form-control" name="lname" placeholder="Last" required>
        </div>
          
          <div class="form-group">
            <label for="email" class="control-label">Email</label>
            <input type="email" name= "email" class="form-control" placeholder="abc@site.com" required>
          </div>
          
          <div class="form-group">
              <label for="Phonenumber" class="control-label">Phone Number (No Dashes)</label>
              <input type="tel" class="form-control" name="phonenumber" placeholder="Phone Number" maxlength="10" required>
        </div>
          
        <div class="form-group">
              <label for="address" class="control-label">Address</label>
              <input type="name" class="form-control" name="address" placeholder="Address" required>
        </div>
          
        <div class="form-group">
              <label for="apartment" class="control-label">Apartment Number</label>
              <input type="name" class="form-control" name="apartment" placeholder="#">
        </div>
          
        <div class="form-group">
              <label for="city" class="control-label">City</label>
              <input type="name" class="form-control" name="city" placeholder="City" required>
        </div>
          
        <div class="form-group">
              <label for="state" class="control-label">State</label>
              <input type="name" class="form-control" name="state" placeholder="State" required>
        </div>
          
        <div class="form-group">
              <label for="zip" class="control-label">Zip Code</label>
              <input type="name" class="form-control" name="zip" placeholder="Zip" maxlength="5" required>
        </div>
          
        <div class="form-group">
                <a href="index.php"><button type="button" class="btn btn-info pull-left">Go back</button>
        </div>
        <div class="form-group">
                <button type="submit" name="signup" class="btn btn-info  pull-right">Register</button>
        </div>
             
    </form>
</div>
    
<?php 
    $con = mysqli_connect('127.0.0.1','root', '');
    mysqli_select_db($con,'tableflipper');
    
		if(isset($_POST['signup']))
        {
            
            $username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $phonenumber = $_POST['phonenumber'];
            $address = $_POST['address'];
            $apartment = $_POST['apartment'];
            $city = $_POST['city'];
            $state = $_POST['state'];
            $zip = $_POST['zip'];

            
            
			if($password==$cpassword)
			{
                //checks if unique username
				$query= "SELECT * FROM customer WHERE UNAME='$username'";
				$query_run = mysqli_query($con,$query);
				
				if(mysqli_num_rows($query_run)>0)
				{
					//there is already a user with the same username
					echo '<script type="text/javascript"> alert("Username already exists. Please try again.") </script>';					
				}
                
				else
				{
                    
                    $hashedpw = sha1($password);
                    
					$query = "INSERT INTO customer (FNAME, LNAME, PHONE, EMAIL, UNAME, UPASS, ADDR, CITY, STATE, ZIP, APTNUM) VALUES('$fname','$lname','$phonenumber','$email','$username','$password','$address','$city','$state','$zip','$apartment');";
        
                    $query .= "INSERT INTO users (name, username, password, user_level, image, status) VALUES ('Customer User', '$username','$hashedpw', '3', 'no_image.jpg', '1')";
                    
        
            $addcust = mysqli_multi_query($con,$query);

                    
            if($addcust)
				{
                
                 if((strlen($password) <  6) || (strlen($cpassword) < 6))
            {
                echo '<script type="text/javascript"> alert("Password is too short. Please try again.") </script>';
            }
                
                echo '<script type="text/javascript"> alert("Account created. Please go back to the login page.") </script>';
                echo '<script>window.location.href = "index.php";</script>';
				}
        else
				{
				echo '<script type="text/javascript"> alert("Error.") </script>';
				}
				}
			}
			else{
				echo '<script type="text/javascript"> alert("Passwords do not match. Please try again") </script>';
			}
        }
?>

<?php include_once('layouts/footer.php'); ?>
