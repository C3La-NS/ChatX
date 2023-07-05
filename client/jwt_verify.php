<?php
use Firebase\JWT\JWT;
if($s_d) {
    $authHeader = $_COOKIE['chx_authentication'];
}
try {
    $token = JWT::decode($authHeader, $secretKey, ['HS512']);
            
    if ($token->iss !== $serverName ||
        $token->nbf > $now->getTimestamp() ||
        $token->exp < $now->getTimestamp()) {
        header('HTTP/1.1 401 Unauthorized');
        exit;
    }
    $bannedProfile = $repoProfiles->query()
        ->where('username', '==', $token->data->userName)
        ->execute();
    foreach($bannedProfile as $profile) {
        $b = $profile->banned;
    }
    $is_not_valid_user = !$b;
    $is_valid_moderator = $token->data->moderator && $is_not_valid_user;
    $is_valid_logged_in = $token->data->loggedIn && $is_not_valid_user;
} catch (Exception $e) {}