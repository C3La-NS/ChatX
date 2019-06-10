<?php
include '../settings.php';
include '../data/languages/lang.' . $l_g . '.php';


function displayList() {} // not working function

  if( isset($_SESSION['mod_loggedin']) ) {
    $getProfile = $repoProfiles->query()
    ->execute();

    echo '
    <p class="total" style="display: none">' . $lang['REGISTERED_USERS'] . '<b>' . $getProfile->total() . '</b></p>
    <p class="legend" style="display: none"><span class="moderator">M</span> — ' . $lang['USER_MODERATOR'] . '</p>
    <p class="legend" style="display: none"><span class="banned">B</span> — ' . $lang['USER_BANNED'] . '</p>
    ';
    foreach($getProfile as $singleProfile) {
        echo '<div class="u-list" style="display: none"><b>' . $singleProfile->login . '</b>'; if($singleProfile->moderator == true) {echo '<span class="moderator">M</span>';} elseif($singleProfile->banned == true) {echo '<span class="banned">B</span>';} echo '</div>';
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
    if( isset( $_POST['s_b']) ) {
      foreach($checkProfile as $profile) {
        $profile->banned = "true";
      }
      $repoProfiles->update($profile);
      
      $settings->bannedUsername = mb_strtolower($_POST['u']);
      $repoSettings->update($settings);
      echo '<p class="success">User Banned!</p>';
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

<div class="admin-bar"><div class="container">
    <a href="./"><img src="../assets/img/logo.png" class="logo"></a>
<?php if ( isset($_SESSION['loggedin']) || $_SESSION['mod_loggedin'] ) { ?>
    <span>
        <i class="icon-user"></i>
        <?php echo $lang['NAVBAR_GREETING']; ?> <strong><?php echo $_SESSION['username']; ?>!</strong>
    </span>
    <div class="logout">
        <a href="logout.php"><?php echo $lang['NAVBAR_LOGOUT']; ?> <i class="icon-logout"></i></a>
    </div>
<?php } ?>
</div><!-- .container --></div><!-- .admin-bar -->    

<?php if ( isset($_SESSION['mod_loggedin']) ) { ?>

<div id="main" class="container userlist">
<aside id="secondary" class="widget-area col-md-4" role="complementary">
    <h2><?php echo $lang['NAVIGATION']; ?></h2>
    <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
    <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
    <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
    <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a></li>
    <h2><?php echo $lang['USER_USERLIST']; ?></h2>
</aside>
<div id="primary" class="col-md-8 mb-xs-24">
<div class="row">
    <section>
      <h1><?php echo $lang['CHANGING_PASSWORD']; ?></h1>
      <p><?php echo $lang['CHANGING_PASSWORD_DESC1']; ?></p>
    </section>
    <form method="post">
    <div>
      <span>
        <input class="basic-slide" name="u" type="name" placeholder="<?php echo $lang['EXISTING_USERNAME']; ?>"/>
        <label><i class="icon-user"></i></label>
      </span>
    </div>
    <div>
      <span>
        <input class="basic-slide" name="p" type="password" placeholder="<?php echo $lang['NEW_PASSWORD']; ?>"/>
        <label><i class="icon-lock"></i></label>
      </span>
    </div>
    <div>
      <span>
        <input class="basic-slide" name="c_p" type="password" placeholder="<?php echo $lang['CONFIRM_PASSWORD']; ?>"/>
        <label><i class="icon-lock"></i></label>
      </span>
    </div>
    <div>
      <span>
        <button class="button"><?php echo $lang['CHANGING_PASSWORD_BUTTON']; ?></button>
      </span>
    </div>  
    </form>
    
    <section>
      <h1><?php echo $lang['DELETING_USERS']; ?></h1>
      <p><?php echo $lang['DELETING_USERS_DESC1']; ?></p>
    </section>
    <form method="post">
    <div>
      <span>
        <input class="basic-slide" name="u" type="name" placeholder="<?php echo $lang['EXISTING_USERNAME']; ?>"/>
        <label><i class="icon-user"></i></label>
      </span>
    </div>
    <div>
      <span>
        <button name="s_d" class="button"><?php echo $lang['CHANGING_USERS_BUTTON']; ?></button>
      </span>
    </div> 
    </form>
    
    <section>
      <h1><?php echo $lang['ADDING_MODERATORS']; ?></h1>
      <p><?php echo $lang['ADDING_MODERATORS_DESC1']; ?></p>
    </section>
    <form method="post">
    <div>
      <span>
        <input class="basic-slide" name="u" type="name" placeholder="<?php echo $lang['EXISTING_USERNAME']; ?>"/>
        <label><i class="icon-user"></i></label>
      </span>
    </div>
    <div>
      <span>
        <button name="s_m" class="button"><?php echo $lang['ADDING_MODERATOR_BUTTON']; ?></button>
      </span>
    </div> 
    </form>

    <section>
      <h1><?php echo $lang['BLOCKING_USERS']; ?></h1>
      <p><?php echo $lang['BLOCKING_USERS_DESC1']; ?></p>
    </section>
    <form method="post">
    <div>
      <span>
        <input class="basic-slide" name="u" type="name" placeholder="<?php echo $lang['EXISTING_USERNAME']; ?>"/>
        <label><i class="icon-user"></i></label>
      </span>
    </div>
    <div>
      <span>
        <button name="s_b" class="button"><?php echo $lang['BLOCKING_USERS_BUTTON']; ?></button>
      </span>
    </div> 
    </form>
</div><!-- .row -->
</div><!-- #primary -->
</div><!-- #main.container -->

<script>$( ".total, .u-list, .legend" ).appendTo( $( "#secondary" ) );</script>

<?php } else { ?>

    <div id="main" class="container">
        <div class="row">
            <section>
              <h1><?php echo $lang['ACCESS_DENIED']; ?></h1>
              <p><?php echo $lang['ACCESS_DENIED_DESC1']; ?></p>
            </section>
        </div>
    </div><!-- #main.container -->

<?php } ?>

</body>

</html>