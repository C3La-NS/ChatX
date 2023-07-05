<?php

declare(strict_types=1);

use Firebase\JWT\JWT;
include_once 'settings.php';

$shouts = $repoShouts->query()
    ->orderBy('createdAt DESC')
    ->limit(isset($_GET['history']) ? $m_h : $m_s, isset($_GET['history']) ? $m_s : 0)
    ->execute();

$results = [];
$config = ['language' => '\RelativeTime\Languages\L' . $l_g, 'truncate' => 1];
$relativeTime = new \RelativeTime\RelativeTime($config);

foreach ($shouts as $shout) {
    $results[] = [
        'id' => mb_substr($shout->getId(), 0, 4),
        'loggedIn' => $shout->loggedIn,
        'text' => $shout->text,
        'name' => $shout->name,
        'timeAgo' => $relativeTime->timeAgo($shout->createdAt),
        'timeStamp' => date('d.m.Y H:i', $shout->createdAt),
    ];
}
header('Content-type: application/json; charset=utf-8');

try {
    $token = JWT::decode($authHeader, $secretKey, ['HS512']);

    if ($token->iss !== $serverName ||
        $token->nbf > $now->getTimestamp() ||
        $token->exp < $now->getTimestamp()) {
        header('HTTP/1.1 401 Unauthorized');
        exit;
    }
    
    $bannedProfile = $repoProfiles->query()
        ->where('username', '==', strtolower($token->data->userName))
        ->execute();
    foreach($bannedProfile as $profile) {
        $b = $profile->banned;
        $u = $profile->username;
    }
    $is_not_valid_user = !$b && $u;
    $is_valid_moderator = $token->data->moderator && $is_not_valid_user;
    $is_valid_logged_in = $token->data->loggedIn && $is_not_valid_user;

    if ($is_valid_moderator || $is_valid_logged_in) {
        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    } else {
        include 'data/languages/' . $l_g . '/app_lang.extra.' . $l_g . '.php';
        echo '[{"id":"denied","text":"' . $lang['APP_ACCESS_DENIED_BANNED'] . '","name":"ChatX","timeAgo":""}]';
    }
} catch (Exception $e) {
    if ($r_a === '1') {
        include 'data/languages/' . $l_g . '/app_lang.extra.' . $l_g . '.php';
        echo '[{"id":"denied","text":"' . $lang['APP_ACCESS_DENIED'] . '","name":"ChatX","timeAgo":""}]';
    } else {
        echo json_encode($results, JSON_UNESCAPED_UNICODE);
    }
}