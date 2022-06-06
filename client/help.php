<?php
include '../settings.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang['TITLE_HELP']; ?></title>
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

<div id="main" class="container">
   <div class="row">
      <section class="help-section">
         <h1><?php echo $lang['HELP']; ?></h1>
         <h3><?php echo $lang['WIDGET_HOTKEYS']; ?>:</h3>
         <hr>
         <p><span>Alt</span> + <span>Q</span> <?php echo $lang['FORMATTING_MENU']; ?></p>
         <p><span>Alt</span> + <span>W</span> <?php echo $lang['LOAD_MODE']; ?></p>
         <hr>
         <p><span>Ctrl</span> + <span>B</span> <?php echo $lang['BOLD_TEXT']; ?> *</p>
         <p><span>Ctrl</span> + <span>I</span> <?php echo $lang['ITALIC_TEXT']; ?> *</p>
         <p><span>Ctrl</span> + <span>U</span> <?php echo $lang['UNDERLINE_TEXT']; ?> *</p>
         <p><sub><b>* <?php echo $lang['SELECTION_TEXT']; ?></b></sub></p>
         <hr>
         <p><span>Enter</span> <?php echo $lang['SEND_MESSAGE']; ?></p>
      </section>
   </div>
</div>
<!-- #main.container -->

</body>

</html>