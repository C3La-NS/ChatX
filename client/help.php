<?php
include '../settings.php';
include 'jwt_verify.php';
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
<?php if ($is_valid_logged_in) { ?>
    <span>
        <i class="chxicon-user-2"></i>
        <?php echo $lang['NAVBAR_GREETING']; ?> <strong><?php echo $token->data->userName; ?>!</strong>
    </span>
    <div class="logout">
        <a href="logout.php"><?php echo $lang['NAVBAR_LOGOUT']; ?> <i class="chxicon-logout"></i></a>
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
         <p><span>Ctrl</span> + <span>V</span> <?php echo $lang['CLIPBOARD_IMG']; ?></p>
         <hr>
         <p><span>Enter</span> <?php echo $lang['SEND_MESSAGE']; ?></p>
         <p><span>Ctrl</span> + <span>Enter</span> <?php echo $lang['SET_NEWLINE']; ?></p>
      </section>
   </div>
</div>
<!-- #main.container -->

</body>

</html>