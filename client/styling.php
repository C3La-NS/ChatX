<?php
include '../settings.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';

$file_path = '../assets/css/color_scheme.css';
$css_File = file_get_contents($file_path);
$css_Modified .= $_POST["contentsCSS"];

if( isset( $_POST["s"]) && isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) {
    file_put_contents($file_path, $css_Modified);
    echo '
    <meta http-equiv="refresh" content="1">
    <div class="modal-loading">
        <svg version="1.1" id="L4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" enable-background="new 0 0 0 0" xml:space="preserve"> <circle fill="#ddd" stroke="none" cx="6" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1"/> </circle> <circle fill="#ddd" stroke="none" cx="26" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.2"/> </circle> <circle fill="#ddd" stroke="none" cx="46" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.3"/> </circle></svg>
        <p>' . $lang['UPDATING_PLEASE_WAIT'] . '</p>
    </div>
    ';
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang['TITLE_STYLING']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/panel.css" rel="stylesheet">
<style type="text/css" media="screen">
    #editor { 
        width: 100%;
        height: 67vh;
        border: 1px solid #ddd;
        display: none;
    }
    .ace_editor {
        display: block !important;
    }
</style>
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


<?php if ( isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) { ?>

<div id="main" class="container styling">
   <aside id="secondary" class="widget-area col-md-4" role="complementary">
      <h2><?php echo $lang['NAVIGATION']; ?></h2>
      <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
      <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
      <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
      <li><a href="styling.php"><?php echo $lang['CHATX_STYLING']; ?></a></li>
      <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a> <span><?php echo $lang['APPLICATION_VERSON']; ?></span></li>
      <h2><?php echo $lang['TEMPLATES']; ?></h2>
      <p><?php echo $lang['TEMPLATES_DESC1']; ?></h2> <a href="https://github.com/C3La-NS/ChatX-templates/tree/master/color%20schemes"><?php echo $lang['TEMPLATES_DESC1_1']; ?></a>.</p>
      <p><?php echo $lang['TEMPLATES_DESC2']; ?> <mark>Properties. Advanced styling</mark> comment section.</p>
   </aside>
   <div id="primary" class="col-md-8 mb-xs-24">
      <div class="row">
	       <section>
	           <h1>CSS <?php echo $lang['CSS_EDITOR']; ?></h1>
	           <p><?php echo $lang['CSS_EDITOR_DESC1'] ?></p>
	       </section>
      </div>
	  <section>
        <form id="updateCSS" method="post">
            <div id="editor"><?php echo $css_File; ?></div>
            <textarea id="hidden" style="display: none" name="contentsCSS"></textarea>
            <br />
            <span>
               <button class="button" type="submit" value="1" name="s"><?php echo $lang['CSS_UPDATE']; ?></button>
            </span>
        </form>
      </section>
   </div>
   <!-- #primary -->
</div>
<!-- #main.container -->

<script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.4.9/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/solarized_light");
    editor.session.setMode("ace/mode/css");
    editor.setShowPrintMargin(false);
    document.getElementById('editor').style.fontSize='14px';
</script>

<script>
$('#updateCSS').submit(function() {
    var code = editor.getValue();
    $("#hidden").text(code);
});
</script>

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