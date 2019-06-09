<?php
include '../settings.php';
include '../data/languages/lang.' . $l_g . '.php';
require '../vendor/autoload.php';

function loggedIn_redirect () {
    echo '<script>window.location.replace("index.php");</script>';
}
  

if ($r_e == '1') {
 if(!empty($_POST['reg_u']) && mb_strlen($_POST['reg_u'], 'utf-8') <= 15 && !empty($_POST['reg_p']) && mb_strlen($_POST['reg_p'], 'utf-8') <= 15 && $_POST['reg_p'] == $_POST['c_reg_p']) {
    
    $reg_u = htmlspecialchars($_POST["reg_u"]);
    $reg_u = str_replace(array("\n", "\r"), '', $reg_u);
    $reg_u = mb_strtolower($reg_u);
    
    $reg_l = htmlspecialchars($_POST["reg_u"]);
    $hashed_password = PASSWORD_HASH($_POST['reg_p'], PASSWORD_BCRYPT);
    
    $checkProfile = $repoProfiles->query()
    ->where('username', '==', $reg_u)
    ->execute();
 
    foreach($checkProfile as $takenProfile) {
        $t = $takenProfile->username;
    }

    // Storing a new profile in does not already exists
  if ($reg_u != $t)  {
    $profile = new \JamesMoss\Flywheel\Document(array(
        'username' => $reg_u,
        'login' => $reg_l, //logical mistake "username" should be used instead
        'password' => $hashed_password
    ));
    
    $repoProfiles->store($profile);
    echo '<p class="success">' . $lang['REGISTRATION_COMPLETE'] . '</p>';
   } else {
          echo '<p class="error">' . $lang['USERNAME_TAKEN'] . '</p>';
   }
    
  }
} else {

  function regDisabled() {
    echo '
      <form method="post" class="email-signup">
        <div class="u-form-group">
        <p class="disabled">Unavailable</p>
        </div>
      </form>
    ';
  }

}



if(isset($_POST['s'])) {
   
    
    $getProfile = $repoProfiles->query()
    ->where('username', '==', mb_strtolower(htmlspecialchars($_POST['u'])))
    ->execute();
    foreach($getProfile as $profile) {
        $u = $profile->username;
        $l = $profile->login;
        $p = $profile->password;
        $m = $profile->moderator;
        $b = $profile->banned;
    }

    
  if (mb_strtolower(htmlspecialchars($_POST['u'])) == mb_strtolower($u) && password_verify(htmlspecialchars($_POST['p']), $p) && $b !== 'true')  {

      if ($m == 'true') {
         $_SESSION['mod_loggedin'] = true;
      } else {
         $_SESSION['loggedin'] = true;
      }
    
      $_SESSION['username'] = $l;
      loggedIn_redirect();
      exit();
       
  } else {
      if($b !== 'true'){
          echo '<p class="error">' . $lang['USERNAME_PASSWORD_NOT_RECOGNIZED'] . '</p>';
      }
      else {
          echo '<p class="error">' . $lang['LOGIN_USER_BANNED'] . '</p>';
      }
  }
  
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang['CHATX_LOGIN']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

</head>

<body>

    <?php if ( isset($_SESSION['loggedin']) || $_SESSION['mod_loggedin'] ) { ?>
        <?php loggedIn_redirect(); exit(); ?>

    <?php } else { ?>
        
  <div class="login-box">
    <div class="lb-header">
      <a href="#" class="active" id="login-box-link"><?php echo $lang['LOGIN']; ?></a>
      <a href="#" id="signup-box-link"><?php echo $lang['SIGN_UP']; ?></a>
    </div>
    <form method="post" class="email-login">
      <div class="u-form-group">
        <label><i class="icon-user"></i></label>
        <input type="name" name="u" placeholder="<?php echo $lang['ENTER_YOUR_NAME']; ?>" required/>
      </div>
      <div class="u-form-group">
        <label><i class="icon-lock"></i></label>
        <input type="password" name="p" placeholder="<?php echo $lang['ENTER_YOUR_PASSWORD']; ?>" required/>
      </div>
      <div class="u-form-group">
        <button name="s" class="icon-login"></button>
      </div>
    </form>
    

        <?php if ($r_e == '1') { ?>

    <form method="post" class="email-signup">
      <div class="u-form-group">
        <label><i class="icon-user"></i></label>
        <input name="reg_u" type="name" placeholder="<?php echo $lang['ENTER_YOUR_NAME']; ?>"/>
      </div>
      <div class="u-form-group">
        <label><i class="icon-lock"></i></label>
        <input name="reg_p" type="password" placeholder="<?php echo $lang['ENTER_YOUR_PASSWORD']; ?>"/>
      </div>
      <div class="u-form-group">
        <label><i class="icon-lock"></i></label>
        <input name="c_reg_p" type="password" placeholder="<?php echo $lang['CONFIRM_PASSWORD']; ?>"/>
      </div>
      <div class="u-form-group">
        <button class="icon-login"></button>
      </div>
    </form>

        <?php } else { ?>
            <?php regDisabled(); ?>
        <?php } ?>

  </div>        

    <?php } ?>

    <script src="js/login.js"></script>
    
</body>

</html>



