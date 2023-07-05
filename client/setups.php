<?php
include '../settings.php';
include 'jwt_verify.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';

if(isset( $_POST['s']) && $is_valid_moderator) {
    
    $checkSettings = $repoSettings->query()
    ->limit(1, 0)
    ->execute();
    foreach($checkSettings as $updateSettings);
    
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
      $updateSettings->slowTrack = preg_replace('/\D/', '', htmlspecialchars($_POST['s_t']));
    }
    if( !empty($_POST['f_t'] && $_POST['f_t'] >= '1') ) {
      $updateSettings->fastTrack = preg_replace('/\D/', '', htmlspecialchars($_POST['f_t']));
    }
    if( !empty($_POST['e_o']) ) {
      $updateSettings->emojiOne = '1';
    } else  {
      $updateSettings->emojiOne = '0';
    }
    if( !empty($_POST['m_a']) ) {
      $updateSettings->mybb = '1';
    } else  {
      $updateSettings->mybb = '0';
    }
    if( !empty($_POST['d_p']) ) {
      $updateSettings->demoPage = '1';
    } else  {
      $updateSettings->demoPage = '0';
    }
    if( !empty($_POST['m_c'] && $_POST['m_c'] >= '1') ) {
      $updateSettings->maxChar = preg_replace('/\D/', '', htmlspecialchars($_POST['m_c']));
    }
    if( !empty($_POST['m_s'] && $_POST['m_s'] >= '1') ) {
      $updateSettings->maxShout = preg_replace('/\D/', '', htmlspecialchars($_POST['m_s']));
    }
    if( !empty($_POST['m_h'] && $_POST['m_h'] >= '1') ) {
      $updateSettings->maxHistory = preg_replace('/\D/', '', htmlspecialchars($_POST['m_h']));
    }
    if( !empty($_POST['i_i']) ) {
      $updateSettings->imgurID = htmlspecialchars(trim($_POST['i_i']));
    }
    $updateSettings->notificSound = htmlspecialchars($_POST['n_s']);
    $updateSettings->langPack = htmlspecialchars($_POST['l_g']);
    if( !empty($_POST['s_d']) ) {
      $url = preg_replace("#/$#", "", htmlspecialchars($_POST['s_d']));
    } else {
      $url = '';
    }
    $updateSettings->siteDomain = $url;
    $repoSettings->update($updateSettings);
    
    echo "<script> location.href='redirect.php'; </script>";
    exit;
}
?> 

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang['TITLE_SETTINGS']; ?></title>
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
       
    <div id="main" class="container setups">
        <aside id="secondary" class="widget-area col-md-4" role="complementary">
            <h2><?php echo $lang['NAVIGATION']; ?></h2>
            <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
            <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
            <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
            <li><a href="styling.php"><?php echo $lang['CHATX_STYLING']; ?></a></li>
            <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a> <span>(v. <?php echo $lang['APPLICATION_VERSON']; ?>)</span></li>
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
                    <button class="button" name="s" style="margin-top: .6em"><?php echo $lang['SAVE_SETTINGS']; ?></button>
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
                        <input id="slowTrack_input" type="text" name="s_t" placeholder="<?php echo $lang['NUMBERS_ONLY']; ?>" value=" <?php echo $s_t; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['RELOAD_MESSAGES_FAST_TRACK']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="fastTrack_input" type="text" name="f_t" placeholder="<?php echo $lang['NUMBERS_ONLY']; ?>" value=" <?php echo $f_t; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['EMOJIONE_LIBRARY']; ?> <mark data-tooltip="<?php echo $lang['TOOLTIP_EMOJIONE_DESC']; ?>">(?)</mark></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                       <input id="icd3" type="checkbox" name="e_o" <?php if( !empty($_POST['e_o']) || $e_o == '1' ) {echo 'checked';} ?> />
                       <label for="icd3"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['DEMO_PAGE']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                       <input id="icd6" type="checkbox" name="d_p" <?php if( !empty($_POST['d_p']) || $d_p == '1' ) {echo 'checked';} ?> />
                       <label for="icd6"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['MESSAGE_MAX_CHARS']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="maxChar_input" type="text" name="m_c" placeholder="<?php echo $lang['NUMBERS_ONLY']; ?>" value=" <?php echo $m_c; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['WIDGET_MAX_SHOUTS']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="maxWidgetShouts_input" type="text" name="m_s" placeholder="<?php echo $lang['NUMBERS_ONLY']; ?>" value=" <?php echo $m_s; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['HISTORY_MAX_SHOUTS']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="maxHistoryShouts_input" type="text" name="m_h" placeholder="<?php echo $lang['NUMBERS_ONLY']; ?>" value=" <?php echo $m_h; ?>">
                    </div>

                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['IMGUR_IDENTIFICATOR']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="imgurIdentificator_input" type="text" name="i_i" placeholder="Imgur API" value=" <?php echo $i_i; ?>">
                    </div>

                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['SOUND_NOTIFICATION']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <select name="n_s">
                          <option value="1" <?php if( $n_s == '1' ) {echo 'selected';} ?> /><?php echo $lang['NOTIFICATION_VARIANT']; ?> 1</option> 
                          <option value="2" <?php if( $n_s == '2' ) {echo 'selected';} ?> /><?php echo $lang['NOTIFICATION_VARIANT']; ?> 2</option>
                          <option value="3" <?php if( $n_s == '3' ) {echo 'selected';} ?> /><?php echo $lang['NOTIFICATION_VARIANT']; ?> 3</option>
                          <option value="4" <?php if( $n_s == '4' ) {echo 'selected';} ?> /><?php echo $lang['NOTIFICATION_VARIANT']; ?> 4</option>
                          <option value="null" <?php if( $n_s == 'null' ) {echo 'selected';} ?> /><?php echo $lang['NOTIFICATION_NULL']; ?></option>
                        </select>
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
                    <div id="ext_domain" style="width: 65%; float:left">
                        <p><?php echo $lang['EXTERNAL_DOMAIN']; ?></p>
                    </div>
                    <div style="width: 34.5%; float:right">
                        <input id="siteDomain_input" type="text" name="s_d" placeholder="https://domain.com" value="<?php echo $s_d; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p><?php echo $lang['MYBB_INTEGRATION']; ?></p>
                    </div>
                    <div style="width: 24.5%; float:right">
                       <input id="icd5" type="checkbox" name="m_a" <?php if( !empty($_POST['m_a']) || $m_a == '1' ) {echo 'checked';} ?> />
                       <label for="icd5"></label>
                    </div>
                    
                    <button class="button" name="s"><?php echo $lang['SAVE_SETTINGS']; ?></button>
                </form>
            </div><!-- .row -->
        </div><!-- #primary -->
    </div><!-- #main.container -->
    
    <script>
        const currentVersion = "<?php echo $lang['APPLICATION_VERSON']; ?>";
        
        var targetElementId = window.location.hash.substr(1);
        
        if (targetElementId && document.getElementById(targetElementId)) {
            
          var targetElement = document.getElementById(targetElementId);
        
          targetElement.classList.add('highlight');
        
          setTimeout(function() {
            targetElement.classList.remove('highlight');
          }, 1000);
        }

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