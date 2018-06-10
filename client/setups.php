<?php
include '../settings.php';
include 'panel_dom.php';

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

<?php navbar(); if ( isset($_SESSION['mod_loggedin']) ) { ?>
       
    <div id="main" class="container setups">
        <aside id="secondary" class="widget-area col-md-4" role="complementary">
            <h2>Navigation</h2>
            <li><a href="index.php">Shout Management & widget</a></li>
            <li><a href="userlist.php">User Management</a></li>
            <li><a href="setups.php">ChatX Settings</a></li>
            <li><a href="https://github.com/C3La-NS/ChatX">GtiHub</a></li>
            <h2>Automatic Purging</h2>
            <p>In order to preserve ChatX speed it is advisable to delete old messages from the server from time to time.</p>
            <p>If your server supports CRON, create manually a job that will run <b>delete_old_shouts.php</b> script every 15 minutes-1 hour.</p>
        </aside>
        <div id="primary" class="col-md-8 mb-xs-24">
            <div class="row">
                <section>
                      <h1>ChatX Settings</h1>
                      <p>You can enable or disable global functions for chat app here.</p>
                </section>
                    
                <form id="settings" method="post">
                    <div style="width: 75%; float:left">
                        <p>Only logged in users can read and send messages:</p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="icd" type="checkbox" name="r_a" <?php if( !empty($_POST['r_a']) || $r_a == '1' ) {echo 'checked';} ?> />
                        <label for="icd"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p>New user registration is enabled:</p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="icd2" type="checkbox" name="r_e" <?php if( !empty($_POST['r_e']) || $r_e == '1' ) {echo 'checked';} ?> />
                        <label for="icd2"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p>ChatX reloads messages in <b>slow</b> track every (seconds):</p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="slowTrack_input" type="text" name="s_t" placeholder="Numbers only" value=" <?php echo $s_t; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p>ChatX reloads messages in <b>fast</b> track every (seconds):</p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="fastTrack_input" type="text" name="f_t" placeholder="Numbers only" value=" <?php echo $f_t; ?>">
                    </div>
                    <div style="width: 75%; float:left">
                        <p>Use <b>EmojiOne</b> library to replace :) with emoji:</p>
                    </div>
                    <div style="width: 24.5%; float:right">
                       <input id="icd3" type="checkbox" name="e_o" <?php if( !empty($_POST['e_o']) || $e_o == 'true' ) {echo 'checked';} ?> />
                       <label for="icd3"></label>
                    </div>
                    <div style="width: 75%; float:left">
                        <p>External domain where you are going to use ChatX:</p>
                    </div>
                    <div style="width: 24.5%; float:right">
                        <input id="siteDomain_input" type="text" name="s_d" placeholder="https://domain.com" value="<?php echo $s_d; ?>">
                    </div>
                    <button class="button" name="s">Save Settings</button>
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
        
        echo '<script>$("#icd").prop(\'checked\', false);</script>';
      }
      if( !empty($_POST['r_e']) ) {
        $updateSettings->regEnabled = '1';
        
      } else  {
        $updateSettings->regEnabled = '0';
        
        echo '<script>$("#icd2").prop(\'checked\', false);</script>';
      }
      if( !empty($_POST['s_t'] && $_POST['s_t'] >= '1') ) {
        $updateSettings->slowTrack = preg_replace('/\D/', '', $_POST['s_t']);
        
        echo '<script>var st = '; echo $updateSettings->slowTrack = preg_replace('/\D/', '', $_POST['s_t']); echo '; $("#slowTrack_input").val(st);</script>';
      } else {
          echo '<p class="error">Zero is not allowed</p>';
      }
      if( !empty($_POST['f_t'] && $_POST['f_t'] >= '1') ) {
        $updateSettings->fastTrack = preg_replace('/\D/', '', $_POST['f_t']);
        
        echo '<script>var ft = '; echo $updateSettings->fastTrack = preg_replace('/\D/', '', $_POST['f_t']); echo '; $("#fastTrack_input").val(ft);</script>';
      } else {
          echo '<p class="error">Zero is not allowed</p>';
      }
      if( !empty($_POST['e_o']) ) {
        $updateSettings->emojiOne = 'true';
        
      } else  {
        $updateSettings->emojiOne = 'false';
        
        echo '<script>$("#icd3").prop(\'checked\', false);</script>';
      }
      if( !empty($_POST['s_d']) ) {
        $url = preg_replace("#/$#", "", $_POST['s_d']);
        $updateSettings->siteDomain = $url;
        
        echo '<script>var sd = '; echo $updateSettings->siteDomain = $_POST['s_d']; echo '; $("#siteDomain_input").val(sd);</script>';
      }
      
      $repoSettings->update($updateSettings);
      echo '
    <script>
        setTimeout(function () {
	      $(\'.error\').fadeOut(500);
        }, 2000);
    </script>
      ';
    }
?> 

    
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