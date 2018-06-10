<?php
include 'settings.php';


// Send the 20 latest shouts as json
$shouts = $repoShouts->query()
        ->orderBy('createdAt DESC')
        ->limit(20,0)
        ->execute();

$results = array();

$config = array(
    'language' => '\RelativeTime\Languages\English',
    'truncate' => 1,
);

$relativeTime = new \RelativeTime\RelativeTime($config);
        
foreach($shouts as $shout) {
    $shout->timeAgo = $relativeTime->timeAgo($shout->createdAt);
    $results[] = $shout;
}


header('Content-type: application/json; charset=utf-8');
if ( $r_a === '1' ) {

    
    if( !isset($_SESSION['loggedin']) && !isset($_SESSION['mod_loggedin']) ) {
        
        echo '[{"text":"<span style=\"color:red\">ACCESS DENIED</span>. You are not logged in or using application from non-authorized source.","name":"ChatX","timeAgo":""}]';
        die();
    } else {
        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
}
