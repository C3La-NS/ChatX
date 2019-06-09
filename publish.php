<?php
include 'settings.php';
include 'bbcode.php';

    
// Store the posted shout data to the data store

if(isset($_POST["name"]) && isset($_POST["comment"]) && mb_strlen($_POST['name'], 'utf-8') <= 15 && !empty($_POST['comment']) && mb_strlen($_POST['comment'], 'utf-8') <= $maxShoutChars && mb_strtolower($_SESSION['username']) !== $b_u) {
    
    $name = htmlspecialchars($_POST["name"]);
    $name = str_replace(array("\n", "\r"), '', $name);

    $comment = htmlspecialchars($_POST["comment"]);
    $comment = str_replace(array("\n", "\r"), '', $comment);
    $comment = showBBcodes($comment);


    if ( $r_a === '1' ) {
        if( !isset($_SESSION['loggedin']) && !isset($_SESSION['mod_loggedin']) ) {
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
        if( !isset($_SESSION['loggedin']) && !isset($_SESSION['mod_loggedin']) ) {  
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