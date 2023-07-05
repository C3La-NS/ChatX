<?php
include '../settings.php';
include '../data/languages/' . $l_g . '/lang.' . $l_g . '.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $lang['TITLE_SETTINGS']; ?></title>
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <style>
        html, body {
          margin: 0;
          background: #fff;
          color: #7d7d7d;
          font-size: 14px;
          font-weight: 400;
          font-family: 'Exo 2', sans-serif;
        }
        .modal-loading {
          height: 100vh;
          width: 100vw;
          text-align: center;
        }
        .modal-loading svg {
          width: 54px;
          height: 80px;
        }
        .modal-loading p {
          margin: 0;
        }
    </style>
</head>

<body>
<meta http-equiv="refresh" content="0.5; <?php echo $_SERVER['HTTP_REFERER']?>">
<div class="modal-loading">
    <svg version="1.1" id="L4" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" enable-background="new 0 0 0 0" xml:space="preserve"> <circle fill="#ddd" stroke="none" cx="6" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.1"/> </circle> <circle fill="#ddd" stroke="none" cx="26" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.2"/> </circle> <circle fill="#ddd" stroke="none" cx="46" cy="50" r="6"> <animate attributeName="opacity" dur="1s" values="0;1;0" repeatCount="indefinite" begin="0.3"/> </circle></svg>
    <p><?php echo $lang['UPDATING_PLEASE_WAIT']; ?></p>
</div>
</body>

</html>