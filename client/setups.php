<?php
include '../settings.php';
include '../data/languages/lang.' . $l_g . '.php';

if( isset( $_POST['s']) && isset($_SESSION['mod_loggedin']) ) {
    
    $checkSettings = $repoSettings->query()
    ->limit(1, 0)
    ->execute();
    foreach($checkSettings as $updateSettings);
    
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChatX Settings</title>
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
       
    <div id="main" class="container setups">
        <aside id="secondary" class="widget-area col-md-4" role="complementary">
            <h2><?php echo $lang['NAVIGATION']; ?></h2>
            <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
            <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
            <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
            <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a></li>
            <h2><?php echo $lang['AUTO_PURGING']; ?></h2>
            <p><?php echo $lang['AUTO_PURGING_DESC1']; ?></p>
            <p><?php echo $lang['AUTO_PURGING_DESC2']; ?></p>
        </aside>
        <div id="primary" class="col-md-8 mb-xs-24">
            <div class="row">
                <section>
                      <h1><?php echo $lang['CHATX_SETTINGS']; ?></h1>
                      <p><?php echo $lang['CHATX_SETTINGS_DESCRIPTION']; ?></p>
                </section>
                    
                <form id="settings" method="post">
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['LOGGED_IN_CAN_READ&SEND_MESSAGES']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="icd" type="checkbox" name="r_a" <?php if( !empty($_POST['r_a']) || $r_a == '1' ) {echo 'checked';} ?> />
                        <label for="icd"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['USER_REGISTRATION_ENABLED']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="icd2" type="checkbox" name="r_e" <?php if( !empty($_POST['r_e']) || $r_e == '1' ) {echo 'checked';} ?> />
                        <label for="icd2"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['RELOAD_MESSAGES_SLOW_TRACK']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="slowTrack_input" type="text" name="s_t" placeholder="Numbers only" value=" <?php echo $s_t; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['RELOAD_MESSAGES_FAST_TRACK']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="fastTrack_input" type="text" name="f_t" placeholder="Numbers only" value=" <?php echo $f_t; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['EMOJIONE_LIBRARY']; ?> <mark data-tooltip="<?php echo $lang['TOOLTIP_EMOJIONE_DESC']; ?>">(?)</mark></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                       <input id="icd3" type="checkbox" name="e_o" <?php if( !empty($_POST['e_o']) || $e_o == 'true' ) {echo 'checked';} ?> />
                       <label for="icd3"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['FEATHERLIGHT_LIBRARY']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                       <input id="icd4" type="checkbox" name="f_g" <?php if( !empty($_POST['f_g']) || $f_g == '1' ) {echo 'checked';} ?> />
                       <label for="icd4"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['LANGUAGE']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <select name="l_g">
                          <option value="en" <?php if( $l_g == 'en' ) {echo 'selected';} ?> /><?php echo $lang['LANGUAGE_EN']; ?></option> 
                          <option value="ru" <?php if( $l_g == 'ru' ) {echo 'selected';} ?> /><?php echo $lang['LANGUAGE_RU']; ?></option>
                        </select>
                    </div>
                    <div style="width: 65%; float:left">
                        <p><?php echo $lang['EXTERNAL_DOMAIN']; ?></p>
                    </div>
                    <div style="width: 34.5%; float:right">
                        <input id="siteDomain_input" type="text" name="s_d" placeholder="https://domain.com" value="<?php echo $s_d; ?>">
                    </div>
                    <button class="button" name="s"><?php echo $lang['SAVE_SETTINGS']; ?></button>
                </form>
            </div><!-- .row -->
        </div><!-- #primary -->
    </div><!-- #main.container -->



<?php 
    if( isset( $_POST['s']) && isset($_SESSION['mod_loggedin']) ) {
      if( !empty($_POST['r_a']) ) {
        $updateSettings->restrictedAccess = '1';
        
      } else  {
        $updateSettings->restrictedAccess = '0';
        
      }
      if( !empty($_POST['r_e']) ) {
        $updateSettings->regEnabled = '1';
        
      } else  {
        $updateSettings->regEnabled = '0';
        
      }
      if( !empty($_POST['s_t'] && $_POST['s_t'] >= '1') ) {
        $updateSettings->slowTrack = preg_replace('/\D/', '', $_POST['s_t']);
        
      } else {
          echo '<p class="error">' . $lang['ZERO_NOT_ALLOWED'] . '</p>';
      }
      if( !empty($_POST['f_t'] && $_POST['f_t'] >= '1') ) {
        $updateSettings->fastTrack = preg_replace('/\D/', '', $_POST['f_t']);
        
      } else {
          echo '<p class="error">' . $lang['ZERO_NOT_ALLOWED'] . '</p>';
      }
      if( !empty($_POST['e_o']) ) {
        $updateSettings->emojiOne = 'true';
        
      } else  {
        $updateSettings->emojiOne = 'false';
        
      }
      if( !empty($_POST['f_g']) ) {
        $updateSettings->featherLight = '1';
        
      } else  {
        $updateSettings->featherLight = '0';
        
      }
      $updateSettings->langPack = $_POST['l_g'];
      if( !empty($_POST['s_d']) ) {
        $url = preg_replace("#/$#", "", $_POST['s_d']);
        $updateSettings->siteDomain = $url;
        
      }
      
      $repoSettings->update($updateSettings);
      echo '
    <meta http-equiv="refresh" content="1">
    <div class="modal-loading">
        <svg version="1.1" id="L4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" enable-background="new 0 0 0 0" xml:space="preserve"> <circle fill="#ddd" stroke="none" cx="6" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1"/> </circle> <circle fill="#ddd" stroke="none" cx="26" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.2"/> </circle> <circle fill="#ddd" stroke="none" cx="46" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.3"/> </circle></svg>
        <p>' . $lang['UPDATING_PLEASE_WAIT'] . '</p>
    </div>
      ';
    }
?> 

    
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