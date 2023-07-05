<?php
include '../settings.php';

if (isset($_COOKIE['chx_authentication'])) {
    unset($_COOKIE['chx_authentication']);
    setcookie('chx_authentication', '', time() - 3600, '/');
}

if(isset($_GET['ajax'])) { // dunno
    header("Access-Control-Allow-Credentials: true");
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
exit();
