<?php
session_start();
include 'panel_dom.php';

require '../vendor/autoload.php';

// Configure the data store

$dir = '../data';

$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));

$repo = new \JamesMoss\Flywheel\Repository('shouts', $config);
    

if( isset( $_POST["deleteShout"]) && mb_strlen($_POST['deleteShout'], 'utf-8') <=9 && isset($_SESSION['mod_loggedin']) ) {
    $repo->delete($_POST["deleteShout"]);
}

if(isset( $_POST["deleteAllShouts"]) && mb_strlen($_POST['deleteAllShouts'], 'utf-8') <=3 && isset($_SESSION['mod_loggedin']) ) {

    $oldShouts = $repo->query()
                ->where('createdAt', '<', strtotime('-0 second'))
                ->execute();

    foreach($oldShouts as $old) {
        $repo->delete($old);
    }

}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ChatX Management</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/panel.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>

<body>

<?php
    if ($_SESSION['mod_loggedin'] && $_SESSION['password'] == '582e81644558c84074c7d02a199e48a6') {
        echo '<div class="password-alert"><p>Alert! We noticed that you are using <span style="color:red">default password</span> for moderation panel. It can make ChatX management easily accessible for non-authorized users. Change your password as soon as possible! <a href="#">How do I change my password?</a></p></div>';
    }
?>

<?php
        navbar();
    if ( isset($_SESSION['loggedin']) || $_SESSION['mod_loggedin'] ) {
        if ( isset($_SESSION['mod_loggedin']) ) {
            modpandel();
        } else {
            userpanel();
        }



    } else {
        echo '
    <div id="main" class="container">
        <div class="row">
            <section>
              <h1>
              ACCESS DENIED
              </h1>
              <p>YOU HAVE NO PERMISSION TO VIEW THIS PAGE</p>
              <p><a href="login.php">Log In</a></p>
            </section>
        </div>
    </div><!-- #main.container -->
        ';
    }
?>

</body>

</html>