<?php
include 'settings.php';
include 'bbcode.php';

    
// Store the posted shout data to the data store

if(isset($_POST["name"]) && isset($_POST["comment"]) && mb_strlen($_POST['name'], 'utf-8') <= 25 && !empty($_POST['comment']) && mb_strlen($_POST['comment'], 'utf-8') <= $m_c && mb_strtolower($_SESSION['username']) !== $b_u) {
    
    $userIsGuest = !isset($_SESSION[$sesPrefix . 'loggedin']) && !isset($_SESSION[$sesPrefix . 'mod_loggedin']);
    
    $name = htmlspecialchars($_POST["name"]);
    $name = str_replace(array("\n", "\r"), '', $name);

    $comment = htmlspecialchars($_POST["comment"]);
    $comment = str_replace(array("\n", "\r"), '', $comment);
    if( $userIsGuest ) {
        $comment = preg_replace('~https://i\.imgur\.com(*SKIP)(*FAIL)|https?://' . $_SERVER['SERVER_NAME'] . '(*SKIP)(*FAIL)|https?://~s', '', $comment);
        if (empty($comment)) {die();}
    }
    $comment = showBBcodes($comment);


    if ( $r_a === '1' ) {
        if( $userIsGuest ) {
          echo 'Access Denied';
          die();
        } else {
         // Storing a new shout
        $shout = new \JamesMoss\Flywheel\Document(array(
            'text' => $comment,
            'name' => $_SESSION['username'],
            'loggedIn' => 'true', 
            'createdAt' => time()
        ));
        $repoShouts->store($shout);
        }
    } else {
        if( $userIsGuest ) {
        $shout = new \JamesMoss\Flywheel\Document(array(
            'text' => $comment,
            'name' => $name,
            'createdAt' => time()
        ));
        }
        else {
        $shout = new \JamesMoss\Flywheel\Document(array(
            'text' => $comment,
            'name' => $_SESSION['username'],
            'loggedIn' => 'true',
            'createdAt' => time()
        ));
        }
        $repoShouts->store($shout);
    }
    

}
