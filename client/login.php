<?php
include '../settings.php';
session_start();

require '../vendor/autoload.php';
// Configure the data store
$dir = '../data';
$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));
$repo = new \JamesMoss\Flywheel\Repository('profiles', $config);


function loggedIn_redirect () {
    echo '<script>window.location.replace("index.php");</script>';
}
  

if ($regAllowed == 'true') {
 if(!empty($_POST['reg_u']) && mb_strlen($_POST['reg_u'], 'utf-8') <= 15 && !empty($_POST['reg_p']) && mb_strlen($_POST['reg_p'], 'utf-8') <= 15 && $_POST['reg_p'] == $_POST['c_reg_p']) {
    
    $reg_u = htmlspecialchars($_POST["reg_u"]);
    $reg_u = str_replace(array("\n", "\r"), '', $reg_u);
    $hashed_password = md5($salt.$_POST['reg_p']);
    
    $checkProfile = $repo->query()
    ->where('username', '==', $_POST['reg_u'])
    ->execute();
 
    foreach($checkProfile as $takenProfile) {
        $t = $takenProfile->username;
    }

    // Storing a new profile in does not already exists
  if ($_POST['reg_u'] != $t)  {
    $profile = new \JamesMoss\Flywheel\Document(array(
        'username' => $reg_u,
        'password' => $hashed_password
    ));
    
    $repo->store($profile);
   } else {
          echo '<p class="error">Sorry, the username is already taken.</p>';
   }
    
  }
} else {
  function regDisabled() {
    echo '<p class="disabled">Whoa, user registration is disabled</p>';
  }
}


?>

<?php 

$getProfile = $repo->query()
    ->where('username', '==', $_POST['u'])
    ->execute();
    foreach($getProfile as $profile) {
        $u = $profile->username;
        $p = $profile->password;
        $m = $profile->moderator;
    }
    

if( isset( $_POST['s']) ) {        
  if ($_POST['u'] == $u && md5($salt.$_POST['p']) == $p)  {

      if ($m == 'true') {
         $_SESSION['mod_loggedin'] = true;
      } else{
         $_SESSION['loggedin'] = true;
      }
         $_SESSION['username'] = $_POST['u'];
         $_SESSION['password'] = md5($salt.$_POST['p']);
         
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
<?php

    if ( isset($_SESSION['loggedin']) && $_SESSION['loggedin'] ) {
        loggedIn_redirect();
        exit();

    } else {
  echo '
        
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
    
  ';
        if ($regAllowed == 'true') {
  echo '
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
  ';
        } else {
            regDisabled();
        }
  echo '
  </div>        
  ';

    }


?>
    <script src="js/login.js"></script>
</body>

</html>



