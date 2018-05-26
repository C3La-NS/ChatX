<?php

require 'vendor/autoload.php';
include 'settings.php';

if ( $restrictedAccess === true ) {
    session_start();
}


// If you want to delete old comments, make this true. We use it to clean up the demo.
$deleteOldComments = false;

// Setting up the data store

$dir = __DIR__.'/data';

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

// Send the 20 latest shouts as json

$shouts = $repo->query()
        ->orderBy('createdAt DESC')
        ->limit(20,0)
        ->execute();

$results = array();

$config = array(
    'language' => '\RelativeTime\Languages\English',
    'separator' => ', ',
    'suffix' => true,
    'truncate' => 1,
);

$relativeTime = new \RelativeTime\RelativeTime($config);
        
foreach($shouts as $shout) {
    $shout->timeAgo = $relativeTime->timeAgo($shout->createdAt);
    $results[] = $shout;
}


header('Content-type: application/json; charset=utf-8');
if ( $restrictedAccess === true ) {

    
    if( !isset($_SESSION['loggedin']) && !isset($_SESSION['mod_loggedin']) ) {
        
        echo '[{"text":"<span style=\"color:red\">ACCESS DENIED</span>. You are not logged in or using application from non-authorized source.","name":"ChatX","timeAgo":"long ago"}]';
    } else {
        
        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    }
} else {
    
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
}
