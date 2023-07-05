<?php
include '../settings.php';
include 'jwt_verify.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';

if(isset( $_POST["deleteShout"]) && mb_strlen($_POST['deleteShout'], 'utf-8') <=9 && $is_valid_moderator) {

    foreach($_POST["deleteShout"] as $id) {
        $repoShouts->delete($id);
    }

}

if(isset($_POST["deleteAllShouts"]) && mb_strlen($_POST['deleteAllShouts'], 'utf-8') <=3 && $is_valid_moderator) {

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


<?php if ($is_valid_moderator || $is_valid_logged_in) { ?>
    <?php if ($is_valid_moderator) { ?>

<div id="main" class="container modpanel">
   <aside id="secondary" class="widget-area col-md-4" role="complementary">
      <h2><?php echo $lang['NAVIGATION']; ?></h2>
      <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
      <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
      <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
      <li><a href="styling.php"><?php echo $lang['CHATX_STYLING']; ?></a></li>
      <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a> <span>(v. <?php echo $lang['APPLICATION_VERSON']; ?>)</span></li>
      <h2><?php echo $lang['CHATX_WIDGET']; ?></h2>
      <p><strong>1)</strong> <?php echo $lang['CHATX_WIDGET_DESC2']; ?></p>
      <p><strong>2)</strong> <?php echo $lang['CHATX_WIDGET_DESC3']; ?></p>
      <div class="codebox">
        &lt;script&gt;
        var chatx_server = '<span class=document-url></span>';
        function chx_script(u, l) {
            var e = document.createElement("script");
            if (l) {e.onload = l;}
            document.currentScript.parentNode.insertBefore(e, document.currentScript);
            e.src = u;
        }
        chx_script(chatx_server + 'assets/js/core.js');
        &lt;/script&gt;
      </div>
      <p><strong>3)</strong> <?php echo $lang['CHATX_WIDGET_DESC4']; ?></p>
   </aside>
   <div id="primary" class="col-md-8 mb-xs-24">
      <div class="row">
         <section class="shoutbox">
            <form id="deleteShout" method="post">
               <h1><?php echo $lang['DELETING_SHOUTS_ID']; ?></h1>
               <p><?php echo $lang['DELETING_SHOUTS_ID_DESC1']; ?></p>
               <span>
               
               <button class="button" type="submit" value="Submit"><?php echo $lang['SHOUT_ID_DELETE']; ?></button>
               </span>
            </form>
         </section>
         <div class="shoutbox-content">
         </div>
         <section>
        <?php $getShouts = $repoShouts->query()->execute(); ?>
            <h2><?php echo $lang['CLEARING_ALL_DATA']; echo ' ' . '(' . $getShouts->total() . ')'; ?></h2>
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
   <script>
       var sessionName = "<?php echo $token->data->userName; ?>";
       const currentVersion = "<?php echo $lang['APPLICATION_VERSON']; ?>";
   </script>

   <script src="js/moderation.js"></script>
   <script src="../assets/js/img-gallery.js"></script>
   <script src="js/app-version.js"></script>
</div>
<!-- #main.container -->
 <?php } else { // logged in as user ?>

<div id="main" class="container userpanel">
    <div class="row">
        <section>
          <h1><?php echo $lang['WELCOME_BACK']; ?></h1>
          <p><?php echo $lang['LOGGED_IN_SUCCESSFULLY']; ?></p>
          <?php if ( $s_d ) { ?><hr>
          <p><?php echo $lang['GO_TO']; ?> <a href="<?php echo $s_d; ?>"><?php echo $lang['URL_WEBSITE']; ?></a> <?php echo $lang['BEGIN_CONVERSATION']; ?></p><?php } ?>
          
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
         <?php if($s_d) { ?>
         <div class="warning">
            <h5><?php echo $lang['CROSSDOMAIN_LOGIN']; ?></h5>
         </div>
         <?php } ?>
         <p><a href="login.php"><?php echo $lang['LOGIN']; ?></a></p>
      </section>
   </div>
</div>
<!-- #main.container -->

<?php } ?>

</body>

</html>