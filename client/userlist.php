<?php
session_start();
include '../settings.php';
include 'panel_dom.php';

require '../vendor/autoload.php';
// Configure the data store
$dir = '../data';
$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));
$repo = new \JamesMoss\Flywheel\Repository('profiles', $config);

if( !empty($_POST['u']) && mb_strlen($_POST['u'], 'utf-8') <= 15 && !empty($_POST['p']) && mb_strlen($_POST['p'], 'utf-8') <= 15 && $_POST['p'] == $_POST['c_p'] && isset($_SESSION['mod_loggedin']) ) {
    
    $checkProfile = $repo->query()
    ->where('username', '==', $_POST['u'])
    ->execute();

    foreach($checkProfile as $profile) {
        $profile->password;
    }
    $hashed_password = md5($salt.$_POST['p']);
    
    $profile->password = $hashed_password;
    $repo->update($profile);
    echo '<p class="success">Password Changed!</p>';
}


?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change User Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,600,700&amp;subset=cyrillic" rel="stylesheet">
    <link href="css/panel.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>
</head>

<body>

<?php
    navbar();
    if ( isset($_SESSION['mod_loggedin']) ) {
        userlist();
    } else {
        echo '
    <div id="main" class="container">
        <div class="row">
            <section>
              <h1>
              ACCESS DENIED
              </h1>
              <p>YOU HAVE NO PERMISSION TO VIEW THIS PAGE</p>
            </section>
        </div>
    </div><!-- #main.container -->
        ';
    }
    

?>

</body>

</html>