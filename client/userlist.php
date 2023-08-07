<?php
include '../settings.php';
include 'jwt_verify.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';

if( !empty($_POST['u']) && mb_strlen($_POST['u'], 'utf-8') <= 25 && $is_valid_moderator ) {
    
    $checkProfile = $repoProfiles->query()
    ->where( 'username', '==', mb_strtolower($_POST['u']) )
    ->execute();
    
    if( !empty($_POST['p']) && mb_strlen($_POST['p'], 'utf-8') <= 16 && $_POST['p'] == $_POST['c_p'] ) {
        
      foreach($checkProfile as $profile) {
        $profile->password;
      }
      $hashed_password = PASSWORD_HASH($_POST['p'], PASSWORD_BCRYPT);
    
      $profile->password = $hashed_password;
      $repoProfiles->update($profile);

    }
    if( isset( $_POST['s_d']) ) { 
        
      foreach($checkProfile as $profile)
      
      $repoProfiles->delete($profile);
    }
    if( isset( $_POST['s_m']) ) {
      foreach($checkProfile as $profile) {
          if($profile->moderator !== "true") {
              $profile->moderator = "true";
          } else {
               $profile->moderator = "false";
          }
      }
      $repoProfiles->update($profile);
    }
    if( isset( $_POST['s_b']) ) {
      foreach($checkProfile as $profile) {
          if($profile->banned !== "true") {
              $profile->banned = "true";
          } else {
               $profile->banned = "";
          }
      }
      $repoProfiles->update($profile);
    }
    echo "<script> location.href='redirect.php'; </script>";
    exit;
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang['TITLE_USERS']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/panel.css" rel="stylesheet">
</head>

<body>

<div class="admin-bar"><div class="container">
    <a href="./"><img src="../assets/img/logo.png" class="logo"></a>
<?php if ($is_valid_logged_in || $is_valid_moderator) { ?>
    <span>
        <i class="chxicon-user-2"></i>
        <?php echo $lang['NAVBAR_GREETING']; ?> <strong><?php echo $token->data->userName; ?>!</strong>
    </span>
    <div class="logout">
        <a href="logout.php"><?php echo $lang['NAVBAR_LOGOUT']; ?> <i class="chxicon-logout"></i></a>
    </div>
<?php } ?>
</div><!-- .container --></div><!-- .admin-bar -->    

<?php if ($is_valid_moderator) { ?>

<div id="main" class="container userlist">
<aside id="secondary" class="widget-area col-md-4" role="complementary">
    <h2><?php echo $lang['NAVIGATION']; ?></h2>
    <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
    <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
    <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
    <li><a href="styling.php"><?php echo $lang['CHATX_STYLING']; ?></a></li>
    <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a> <span>(v. <?php echo $lang['APPLICATION_VERSON']; ?>)</span></li>
    <h2><?php echo $lang['USER_USERLIST']; ?></h2>
    <div class="container userlist">
        <div class="row">
<?php
if ($is_valid_moderator) {
    $getProfile = $repoProfiles->query()->execute();
?>
            <p class="total"><?= $lang['REGISTERED_USERS'] ?><b><?= $getProfile->total() ?></b></p>
            <p class="legend"><span class="moderator">M</span> — <?= $lang['USER_MODERATOR'] ?></p>
            <p class="legend"><span class="banned">B</span> — <?= $lang['USER_BANNED'] ?></p>
<?php foreach ($getProfile as $singleProfile) : ?>
            <div class='u-list col-md-10 col-lg-5'><b><?= $singleProfile->login ?></b><?php if ($singleProfile->moderator === "true") : ?><span class="moderator">M</span><?php endif; ?><?php if ($singleProfile->banned == true) : ?><span class="banned">B</span><?php endif; ?></div>
<?php endforeach; ?>
<?php } ?>
        </div>
    </div>
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
        <label><i class="chxicon-user-2"></i></label>
      </span>
    </div>
    <div>
      <span>
        <input class="basic-slide" name="p" type="password" placeholder="<?php echo $lang['NEW_PASSWORD']; ?>"/>
        <label><i class="chxicon-lock"></i></label>
      </span>
    </div>
    <div>
      <span>
        <input class="basic-slide" name="c_p" type="password" placeholder="<?php echo $lang['CONFIRM_PASSWORD']; ?>"/>
        <label><i class="chxicon-lock"></i></label>
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
        <label><i class="chxicon-user-2"></i></label>
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
        <label><i class="chxicon-user-2"></i></label>
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
        <label><i class="chxicon-user-2"></i></label>
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

<script>
    const currentVersion = "<?php echo $lang['APPLICATION_VERSON']; ?>";
</script>
<script src="js/app-version.js"></script>

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