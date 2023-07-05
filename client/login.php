<?php
include '../settings.php';
include 'jwt_verify.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';

function loggedIn_redirect() {
    echo '<script>window.location.replace("index.php");</script>';
}
function regDisabled() {
    echo '
    <div class="email-signup">
        <div class="u-form-group">
        <i class="chxicon-lock disabled"></i>
        </div>
      </div>
    ';
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
</head>

<body>

<?php 
    if($is_valid_logged_in) {
        loggedIn_redirect();
        exit;
    } else {
?>
        
  <div class="login-box">
    <div class="lb-header">
      <a href="#" class="active" id="login-box-link"><?php echo $lang['LOGIN']; ?></a>
      <a href="#" id="signup-box-link"><?php echo $lang['SIGN_UP']; ?></a>
    </div>
    <form class="email-login" name="login">
      <div class="u-form-group">
        <label><i class="chxicon-user-2"></i></label>
        <input type="name" name="u" placeholder="<?php echo $lang['ENTER_YOUR_NAME']; ?>" required/>
      </div>
      <div class="u-form-group">
        <label><i class="chxicon-lock"></i></label>
        <input type="password" name="p" placeholder="<?php echo $lang['ENTER_YOUR_PASSWORD']; ?>" required/>
      </div>
      <div class="u-form-group">
        <button class="chxicon-login"></button>
      </div>
    </form>

    <?php if ($r_e == '1') { ?>

    <form class="email-signup" name="signup">
      <div class="u-form-group">
        <label><i class="chxicon-user-2"></i></label>
        <input name="reg_u" type="name" placeholder="<?php echo $lang['ENTER_YOUR_NAME']; ?>"/>
      </div>
      <div class="u-form-group">
        <label><i class="chxicon-lock"></i></label>
        <input name="reg_p" type="password" placeholder="<?php echo $lang['ENTER_YOUR_PASSWORD']; ?>"/>
      </div>
      <div class="u-form-group">
        <label><i class="chxicon-lock"></i></label>
        <input name="c_reg_p" type="password" placeholder="<?php echo $lang['CONFIRM_PASSWORD']; ?>"/>
      </div>
      <div class="u-form-group">
        <button class="chxicon-login"></button>
      </div>
    </form>

    <?php } else { ?>
        <?php regDisabled(); ?>
    <?php } ?>

  </div>        

    <script src="js/login.js"></script>
    
<?php } ?>
    
</body>

</html>
