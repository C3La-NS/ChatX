<?php
include 'settings.php';

$shouts = $repoShouts->query()
        ->orderBy('createdAt DESC')
        ->limit($m_s,0)
        ->execute();

$results = array();

$config = array(
    'language' => '\RelativeTime\Languages\L' . $l_g,
    'truncate' => 1,
);

$relativeTime = new \RelativeTime\RelativeTime($config);
        
foreach($shouts as $shout) {
    $shout->timeAgo = $relativeTime->timeAgo($shout->createdAt);
    $results[] = $shout;
}

header('Content-type: application/json; charset=utf-8');
if ( $r_a === '1' ) {
    if( !isset($_SESSION[$sesPrefix . 'loggedin']) && !isset($_SESSION[$sesPrefix . 'mod_loggedin']) || mb_strtolower($_SESSION['username']) === $b_u ) {
        if(mb_strtolower($_SESSION['username']) === $b_u) {
            session_unset();
            session_destroy();
        } else {
            include 'data/languages/' . $l_g . '/app_lang.extra.' . $l_g . '.php';
            echo '[{"text":"' . $lang['APP_ACCESS_DENIED'] . '","name":"ChatX","timeAgo":""}]';
        }
        die();
    } else {
        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    }
} else {
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
}
