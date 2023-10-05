<?php
declare(strict_types=1);
use Firebase\JWT\JWT;

include_once 'settings.php';
include_once 'bbcode.php';

try {
    $token = JWT::decode($authHeader, $secretKey, ['HS512']);
    $bannedProfile = $repoProfiles->query()
        ->where('username', '==', strtolower($token->data->userName))
        ->execute();
    foreach($bannedProfile as $profile) {
        $b = $profile->banned;
        $u = $profile->username;
    }
    if ($token->iss !== $serverName ||
        $token->nbf > $now->getTimestamp() ||
        $token->exp < $now->getTimestamp() ||
        $b || !$u) {
            exit;
    }
} catch (Exception $e) {
    $userIsGuest = true;
}

if (isset($_POST["name"], $_POST["comment"]) && mb_strlen($_POST['name'], 'utf-8') <= 25 && !empty($_POST['comment']) && mb_strlen($_POST['comment'], 'utf-8') <= $m_c) {
    $name = str_replace(["\n", "\r"], '', htmlspecialchars($_POST["name"]));
    $comment = htmlspecialchars($_POST["comment"]);
    $comment = preg_replace('/(\r?\n){3,}/', "\n\n", $comment);
    if($userIsGuest) {
        $comment = preg_replace('~https://i\.imgur\.com(*SKIP)(*FAIL)|https?://' . $_SERVER['SERVER_NAME'] . '(*SKIP)(*FAIL)|\[url=https?://(*SKIP)(*FAIL)|https?://~s', '', $comment);
    }
    $comment = showBBcodes($comment);
    
    if ($r_a === '1' && $userIsGuest) {
        echo 'Access Denied';
        die();
    }

    $shoutData = [
        'text' => $comment,
        'name' => $userIsGuest ? $name : $token->data->userName,
        'createdAt' => time()
    ];

    if (!$userIsGuest) {
        $shoutData['loggedIn'] = 'true';
    }

    $shout = new \JamesMoss\Flywheel\Document($shoutData);
    $repoShouts->store($shout);
    include 'update_ids.php';
}