<?php
declare(strict_types=1);
use Firebase\JWT\JWT;

header("Content-type: application/json; charset=utf-8");
include 'settings.php';

$data = array();

try {
    $token = JWT::decode($authHeader, $secretKey, ['HS512']);
    
    if ($token->iss !== $serverName ||
        $token->nbf > $now->getTimestamp() ||
        $token->exp < $now->getTimestamp()) {
            $data['sessionName'] = '';
    }
    $data['sessionName'] = $token->data->userName;
    
} catch (Exception $e) {
    $data['sessionName'] = '';
}

$b = '000';

$data['fastTrack'] = $f_t . $b;
$data['slowTrack'] = $s_t . $b;
$data['r_e'] = $r_e;
$data['e_o'] = $e_o;
$data['m_a'] = $m_a;
$data['m_c'] = $m_c;
$data['n_s'] = $n_s;
$data['l_g'] = $l_g;
$data['c_s'] = $c_s;
$data['s_o'] = $s_o;

if ( $r_a === '1' ) {
     if( !isset($token->data->loggedIn) && !isset($token->data->moderator) ) {
        $data['loggingStatus'] = '1_1'; 
     } else {
        $data['loggingStatus'] = '1_0';
     }
} else {
    if( isset($token->data->loggedIn) || isset($token->data->moderator) ) {
        $data['loggingStatus'] = '2_0';
    } else {
        $data['loggingStatus'] = '2_1';
    }
}

echo json_encode($data);

?>