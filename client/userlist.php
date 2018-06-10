<?php
include '../settings.php';
include 'panel_dom.php';


function displayList() {}
  if( isset($_SESSION['mod_loggedin']) ) {
    $getProfile = $repoProfiles->query()
    ->execute();

    echo '<p class="total">Registered users: <b>'; echo $getProfile->total(); echo '</b></p>';
    foreach($getProfile as $singleProfile) {
        echo '<div class="u-list"><b>'; echo $singleProfile->login; echo '</b></div>';
    }
  }

if( !empty($_POST['u']) && mb_strlen($_POST['u'], 'utf-8') <= 15 && isset($_SESSION['mod_loggedin']) ) {
    
    $checkProfile = $repoProfiles->query()
    ->where( 'username', '==', mb_strtolower($_POST['u']) )
    ->execute();
    
    if( !empty($_POST['p']) && mb_strlen($_POST['p'], 'utf-8') <= 15 && $_POST['p'] == $_POST['c_p'] ) {
        
      foreach($checkProfile as $profile) {
        $profile->password;
      }
      $hashed_password = PASSWORD_HASH($_POST['p'], PASSWORD_BCRYPT);
    
      $profile->password = $hashed_password;
      $repoProfiles->update($profile);
      echo '<p class="success">Password Changed!</p>';

    }
    if( isset( $_POST['s_d']) ) { 
        
      foreach($checkProfile as $profile)
      
      $repoProfiles->delete($profile);
      echo '<p class="success">User Deleted!</p>';
    }
    if( isset( $_POST['s_m']) ) {
      foreach($checkProfile as $profile) {
        $profile->moderator = "true";
      }
      $repoProfiles->update($profile);
      echo '<p class="success">Moderator Added!</p>';
    }
    echo '
    <script>
        setTimeout(function () {
	      $(\'.success\').fadeOut(500);
        }, 2000);
    </script>
    ';
}



?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/panel.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>

<body>

<?php navbar(); if ( isset($_SESSION['mod_loggedin']) ) { ?>
    <?php userlist(); ?>
<?php } else { ?>
    <div id="main" class="container">
        <div class="row">
            <section>
              <h1>ACCESS DENIED</h1>
              <p>YOU HAVE NO PERMISSION TO VIEW THIS PAGE</p>
            </section>
        </div>
    </div><!-- #main.container -->
<?php } ?>

</body>

</html>