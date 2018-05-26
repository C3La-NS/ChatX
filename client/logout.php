<?
session_start();
session_unset();
session_destroy();
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
?>