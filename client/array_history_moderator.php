<?php

include '../settings.php';
header('Content-type: application/json; charset=utf-8');


if( !isset($_SESSION[$sesPrefix . 'mod_loggedin']) ) {

    echo 'Access Denied';
    die();

} else {
    $posts = $repoShouts->query()
        ->orderBy('createdAt DESC')
        ->limit($m_h,0)
        ->execute();

    $config = array(
        'language' => '\RelativeTime\Languages\L' . $l_g,
        'truncate' => 1,
    );

    $relativeTime = new \RelativeTime\RelativeTime($config);
        
    foreach($posts as $post) {
      $id = $post->getId();
      $text = $post->text;
      $name = $post->name;
      $timeAgo = $relativeTime->timeAgo($post->createdAt);
      $buildArray = array(
        'id' => $id,
        'text' => $text,
        'name' => $name,
        'timeAgo' => $timeAgo
      );  
      $results[] = $buildArray;

    }    
    echo json_encode($results, JSON_UNESCAPED_UNICODE);
}
