<?php
  $page_title = 'Home Page';
  require_once('includes/load.php');
  if (!$session->isUserLoggedIn(true)) { redirect('index.php', false);}
?>

<?php $user = current_user();
    if($user['user_level'] === '1'){
      redirect('home.php',false);
    }
 
    if($user['user_level'] === '3'){
      redirect('cproduct.php',false);
    }
    
 ?>
      </div>
    </div>
 </div>
</div>
<?php include_once('layouts/footer.php'); ?>
