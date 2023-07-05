<?php
include '../settings.php';
include 'jwt_verify.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';

$file_path = '../assets/css/scheme/Custom Template.css';
$css_File = file_get_contents($file_path);
$css_Modified .= htmlspecialchars($_POST["updateCSS"]);

if( isset($_POST["s"]) && $is_valid_moderator ) {
    file_put_contents($file_path, $css_Modified);
    echo "<script> location.href='redirect.php'; </script>";
    exit;
}
if(isset($_POST["s_t"]) && $is_valid_moderator) {
    $checkSettings = $repoSettings->query()
    ->limit(1, 0)
    ->execute();
    foreach($checkSettings as $updateSettings);

    if( !empty($_POST['colorScheme']) ) {
        $updateSettings->colorScheme = htmlspecialchars(trim($_POST['colorScheme']));
    }
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

<div id="main" class="container styling">
   <aside id="secondary" class="widget-area col-md-4" role="complementary">
      <h2><?php echo $lang['NAVIGATION']; ?></h2>
      <li><a href="index.php"><?php echo $lang['SHOUT_MANAGEMENT']; ?></a></li>
      <li><a href="userlist.php"><?php echo $lang['USER_MANAGEMENT']; ?></a></li>
      <li><a href="setups.php"><?php echo $lang['CHATX_SETUPS']; ?></a></li>
      <li><a href="styling.php"><?php echo $lang['CHATX_STYLING']; ?></a></li>
      <li><a href="https://github.com/C3La-NS/ChatX"><?php echo $lang['GITHUB']; ?></a> <span>(v. <?php echo $lang['APPLICATION_VERSON']; ?>)</span></li>
      <h2><?php echo $lang['TEMPLATES']; ?></h2>
      <p><?php echo $lang['TEMPLATES_DESC1']; ?></h2> <a href="https://github.com/C3La-NS/ChatX-templates/tree/master/color%20schemes"><?php echo $lang['TEMPLATES_DESC1_1']; ?></a>.</p>
      <p><?php echo $lang['TEMPLATES_DESC2']; ?> <mark>Properties. Advanced styling</mark> comment section.</p>
   </aside>
   <div id="primary" class="col-md-8 mb-xs-24">
    <form method="post">
        <div class="row">
        <section class="chx-template">
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="template-select">
                        <p>Default Blue</p>
                        <input class="magic-checkbox" type="radio" name="colorScheme" value="Default Blue"><label class="magic-label"></label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="template-select">
                        <p>Light Mint</p>
                        <input class="magic-checkbox" type="radio" name="colorScheme" value="Light Mint"><label class="magic-label"></label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="template-select">
                        <p>Light Purple</p>
                        <input class="magic-checkbox" type="radio" name="colorScheme" value="Light Purple"><label class="magic-label"></label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="template-select">
                        <p>Pink Cream</p>
                        <input class="magic-checkbox" type="radio" name="colorScheme" value="Pink Cream"><label class="magic-label"></label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="template-select">
                        <p>Telegram Dark</p>
                        <input class="magic-checkbox" type="radio" name="colorScheme" value="Telegram Dark"><label class="magic-label"></label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="template-select">
                        <p>Dark Mint</p>
                        <input class="magic-checkbox" type="radio" name="colorScheme" value="Dark Mint"><label class="magic-label"></label>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div style="background: #fdf6e3" class="template-select">
                        <p>Свой стиль</p>
                        <input class="magic-checkbox" type="radio" name="colorScheme" value="Custom Template"><label class="magic-label"></label>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <button class="button" type="submit" value="1" name="s_t"><?php echo $lang['CSS_UPDATE']; ?></button>
        </section>
        </div>
    </form>

      <div class="row">
	       <section>
	           <h1>CSS <?php echo $lang['CSS_EDITOR']; ?></h1>
	           <p><?php echo $lang['CSS_EDITOR_DESC1'] ?></p>
	       </section>
      </div>
	  <section>
        <form id="updateCSS" method="post">
            <div id="editor"><?php echo $css_File; ?></div>
            <textarea id="hidden" style="display: none" name="updateCSS"></textarea>
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

<script src="https://cdn.jsdelivr.net/npm/ace-builds@1.18.0/src-min-noconflict/ace.min.js" type="text/javascript" charset="utf-8"></script>
<script>
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/solarized_light");
    editor.session.setMode("ace/mode/css");
    editor.setShowPrintMargin(false);
    document.getElementById('editor').style.fontSize='14px';
    const schemeName = "<?php echo $c_s; ?>";
    if(schemeName !== "Custom Template") {
        document.getElementById('editor').style.opacity='.5';
        document.getElementById('editor').style.pointerEvents = "none";
        document.querySelector('#updateCSS .button').disabled = true;
        document.querySelector('#updateCSS .button').style.cursor = "not-allowed";
    }
    document.getElementById('updateCSS').addEventListener('submit', function(event) {
        var code = editor.getValue();
        document.getElementById('hidden').textContent = code;
    });
    const checkbox = document.querySelector('input.magic-checkbox[value="' + schemeName + '"]');
    if (checkbox) {
      checkbox.checked = true;
    }

</script>
<script>
    const currentVersion = "<?php echo $lang['APPLICATION_VERSON']; ?>";
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