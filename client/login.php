<?php
include '../settings.php';
session_name("ChatX_SESSION");
session_start();

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
   } else {
          echo '<p class="error">Sorry, the username is already taken.</p>';
   }
    
  }
} else {

  function regDisabled() {
    echo '
      <form method="post" class="email-signup">
        <div class="u-form-group">
        <p class="disabled">Sorry, user registration is disabled.</p>
        </div>
      </form>
    ';
  }

}



if( isset( $_POST['s']) ) {   
   
    
    $getProfile = $repoProfiles->query()
    ->where('username', '==', mb_strtolower($_POST['u']))
    ->execute();
    foreach($getProfile as $profile) {
        $u = $profile->username;
        $l = $profile->login;
        $p = $profile->password;
        $m = $profile->moderator;
    }

    
  if (mb_strtolower($_POST['u']) == mb_strtolower($u) && password_verify($_POST['p'], $p))  {

      if ($m == 'true') {
         $_SESSION['mod_loggedin'] = true;
      } else {
         $_SESSION['loggedin'] = true;
      }
    
      $_SESSION['username'] = $l;
      loggedIn_redirect();
      exit();
       
  } else {
    echo '<p class="error">Username or password is not recognized</p>';
  }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChatX Moderation</title>
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
      <a href="#" class="active" id="login-box-link">Login</a>
      <a href="#" id="signup-box-link">Sign Up</a>
    </div>
    <form method="post" class="email-login">
      <div class="u-form-group">
        <label><i class="icon-user"></i></label>
        <input type="name" name="u" placeholder="Enter your name" required/>
      </div>
      <div class="u-form-group">
        <label><i class="icon-lock"></i></label>
        <input type="password" name="p" placeholder="Enter your password" required/>
      </div>
      <div class="u-form-group">
        <button name="s" class="icon-login"></button>
      </div>
    </form>
    

        <?php if ($r_e == '1') { ?>

    <form method="post" class="email-signup">
      <div class="u-form-group">
        <label><i class="icon-user"></i></label>
        <input name="reg_u" type="name" placeholder="Choose a Nickname"/>
      </div>
      <div class="u-form-group">
        <label><i class="icon-lock"></i></label>
        <input name="reg_p" type="password" placeholder="Enter Password"/>
      </div>
      <div class="u-form-group">
        <label><i class="icon-lock"></i></label>
        <input name="c_reg_p" type="password" placeholder="Confirm Password"/>
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



