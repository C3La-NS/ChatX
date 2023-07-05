<?php
    include 'settings.php';
    include 'data/languages/' . $l_g . '/demo_page.' . $l_g . '.php';
    if ($d_p === '0') {
        header('HTTP/1.0 403 Forbidden');
        die();
    }
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <title>ChatX Demo</title>
    <link rel="icon" type="image/png" href="assets/img/shutter-favicon-32x32.png">

    <style>
        body {
            background: #e9e9e9;
            font-family: sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
    </style>

</head>

<body>
    <script>var chatx_server = window.location.href.split('?')[0];
        function chx_script(u, l) {
          var e = document.createElement("script");
          if (l) { e.onload = l; }
          document.currentScript.parentNode.insertBefore(e, document.currentScript);
          e.src = u;
        }
        chx_script(chatx_server + 'assets/js/core.js');
    </script>
    <script>
        let title = "<?php echo $lang['title'] ?>";
            expandChat = "<?php echo $lang['expandChat'] ?>";
            moveChat = "<?php echo $lang['moveChat'] ?>";
            resizeChat = "<?php echo $lang['resizeChat'] ?>";
    </script>
    <script src="./assets/js/demo-ui.js"></script>

</body>

</html>