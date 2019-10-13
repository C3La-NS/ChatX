<?php
include '../settings.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';

if( isset( $_POST["deleteShout"]) && mb_strlen($_POST['deleteShout'], 'utf-8') <=9 && isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) {

    foreach($_POST["deleteShout"] as $id) {
        $repoShouts->delete($id);
    }

}

if(isset( $_POST["deleteAllShouts"]) && mb_strlen($_POST['deleteAllShouts'], 'utf-8') <=3 && isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) {

    $oldShouts = $repoShouts->query()
                ->where('createdAt', '<', strtotime('-0 second'))
                ->execute();

    foreach($oldShouts as $old) {
        $repoShouts->delete($old);
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang['TITLE_MANAGEMENT']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/panel.css" rel="stylesheet">
    <link href="css/magic-check.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>

<body>



<div class="admin-bar"><div class="container">
    <a href="./"><img src="../assets/img/logo.png" class="logo"></a>
<?php if ( isset($_SESSION[$sesPrefix . 'loggedin']) || $_SESSION[$sesPrefix . 'mod_loggedin'] ) { ?>
    <span>
        <i class="icon-user"></i>
        <?php echo $lang['NAVBAR_GREETING']; ?> <strong><?php echo $_SESSION['username']; ?>!</strong>
    </span>
    <div class="logout">
        <a href="logout.php"><?php echo $lang['NAVBAR_LOGOUT']; ?> <i class="icon-logout"></i></a>
    </div>
<?php } ?>
</div><!-- .container --></div><!-- .admin-bar -->


<?php if ( isset($_SESSION[$sesPrefix . 'mod_loggedin']) || isset($_SESSION[$sesPrefix . 'loggedin']) ) { ?>
    <?php if ( isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) { ?>

<div id="main" class="container modpanel">
   <aside id="secondary" class="widget-area col-md-4" role="complementary">
      <h2><?php echo $lang['NAVIGATION']; ?></h2>
      <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
      <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
      <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
      <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a></li>
      <h2><?php echo $lang['CHATX_WIDGET']; ?></h2>
      <p><strong>1)</strong> <?php echo $lang['CHATX_WIDGET_DESC1']; ?></p>
      <div class="codebox">
         &lt;script src="https://code.jquery.com/jquery-2.1.3.min.js"&gt;&lt;/script&gt;
      </div>
      <p><strong>2)</strong> <?php echo $lang['CHATX_WIDGET_DESC2']; ?></p>
      <p><strong>3)</strong> <?php echo $lang['CHATX_WIDGET_DESC3']; ?></p>
      <?php if ( $e_o === "1" ) { ?>
      <div class="codebox">
         &lt;script src="https://cdn.jsdelivr.net/npm/emojione@3.1.2/lib/js/emojione.min.js"&gt;&lt;/script&gt;
      </div>
      <?php } ?>
      <div class="codebox">
         &lt;chx_div id="chatx" class="chat" style="display: none"&gt;&lt;/chx_div&gt;
         <br>
         &lt;script&gt;
         var chatx_server = "<span class=document-url></span>";
         jQuery.getScript(chatx_server + 'assets/js/core.js');
         &lt;/script&gt;
      </div>
      <p><strong>4)</strong> <?php echo $lang['CHATX_WIDGET_DESC4']; ?></p>
   </aside>
   <div id="primary" class="col-md-8 mb-xs-24">
      <div class="row">
         <section>
            <form id="deleteShout" method="post">
               <h1><?php echo $lang['DELETING_SHOUTS_ID']; ?></h1>
               <p><?php echo $lang['DELETING_SHOUTS_ID_DESC1']; ?></p>
               <span>
               
               <button class="button" type="submit" value="Submit"><?php echo $lang['SHOUT_ID_DELETE']; ?></button>
               </span>
            </form>
         </section>
         <div class="shoutbox-content">
            <article class="legend">
               <div class="first-box">
                  <p><?php echo $lang['SHOUT_ID']; ?></p>
               </div>
               <div class="third-box">
                  <p><?php echo $lang['SHOUT_CONTENT']; ?></p>
               </div>
            </article>
         </div>
         <section>
            <h2><?php echo $lang['CLEARING_ALL_DATA']; ?></h2>
            <p><?php echo $lang['CLEARING_ALL_DATA_DESC1']; ?></p>
            <form method="post">
               <span>
               <input type="hidden" name="deleteAllShouts" value="yes" />
               <button class="button-delete-all" type="submit" value="Submit"><?php echo $lang['DELETE_EVERYTHING']; ?></button>
               </span>
            </form>
         </section>
      </div>
   </div>
   <!-- #primary -->
   <script src="js/moderation.js"></script>
</div>
<!-- #main.container -->
 <?php } else { // logged in as user ?>

<div id="main" class="container userpanel">
    <div class="row">
        <section>
          <h1><?php echo $lang['WELCOME_BACK']; ?></h1>
          <p><?php echo $lang['LOGGED_IN_SUCCESSFULLY']; ?></p>
        </section>
    </div>
</div><!-- #main.container -->

 <?php } ?>
<?php } else { // not logged in ?>
    
<div id="main" class="container">
   <div class="row">
      <section>
         <h1><?php echo $lang['ACCESS_DENIED']; ?></h1>
         <p><?php echo $lang['ACCESS_DENIED_DESC1']; ?></p>
         <p><a href="login.php"><?php echo $lang['LOGIN']; ?></a></p>
      </section>
   </div>
</div>
<!-- #main.container -->

<?php } ?>

</body>

</html>