<?php

require '../vendor/autoload.php';
include 'settings.php';

session_start();
header('Content-type: application/json; charset=utf-8');

    // If you want to delete old comments, make this true. We use it to clean up the demo.
    $deleteOldComments = false;

    // Setting up the data store

    $dir = '../data';

    $config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
    ));

    $repo = new \JamesMoss\Flywheel\Repository('shouts', $config);

    // Delete comments which are more than 3 days old if the variable is set to be true.

    if($deleteOldComments) {
    
        $oldShouts = $repo->query()
                ->where('createdAt', '<', strtotime('-3 days'))
                ->execute();

        foreach($oldShouts as $old) {
            $repo->delete($old->id);
        }
    
    }

if( !isset($_SESSION["mod_loggedin"]) ) {

    echo 'Access Denied';


} else {
    $posts = $repo->query()
        ->orderBy('createdAt DESC')
        ->limit(75,0)
        ->execute();

    $config = array(
    'language' => '\RelativeTime\Languages\English',
    'separator' => ', ',
    'suffix' => true,
    'truncate' => 1,
    );

    $relativeTime = new \RelativeTime\RelativeTime($config);
        
    foreach($posts as $post) {
      $id = $post->getId();
      $text = $post->text;
      $name = $post->name;
      $buildArray = array(
        'id' => $id,
        'text' => $text,
        'name' => $name
      );  
      $results[] = $buildArray;

    }    
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
}