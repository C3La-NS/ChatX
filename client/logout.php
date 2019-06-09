<?
include '../settings.php';
session_name("ChatX_SESSION");
session_start();
session_unset();
session_destroy();
if(isset($_GET['ajax'])) {
    header("Access-Control-Allow-Credentials: true");
} else {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
exit();
?>