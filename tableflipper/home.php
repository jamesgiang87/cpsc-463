<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>
<?php include_once('layouts/header.php'); ?>
<div class="row">
  <div class="col-md-12">
<?php echo display_msg($msg); ?>
  </div>
 <div class="col-md-12">
    <div class="panel">
      <div class="jumbotron text-center">
<?php $user = current_user();
    if($user['user_level'] === '1'){
    echo  "<h1>Home Page</h1>";
    echo  "    <p>Admin account page</p>" ;
    }
 if($user['user_level'] === '2'){
    echo  "<h1>Home Page</h1>";
    echo  "    <p>Employee account page</p>" ;
 }
    if($user['user_level'] === '3'){
        echo  "<h1>Home Page</h1>";
        echo  "    <p>Customer account page</p>" ;
    }
    
 ?>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
