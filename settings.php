<?php
ini_set('display_errors', "Off");
require_once('vendor/autoload.php');

$dir = __DIR__.'/data';

$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));

$repoSettings = new \JamesMoss\Flywheel\Repository('settings', $config);
$repoShouts = new \JamesMoss\Flywheel\Repository('shouts', $config);
$repoShoutsID = new \JamesMoss\Flywheel\Repository('id', $config);
$repoProfiles = new \JamesMoss\Flywheel\Repository('profiles', $config);

$getSettings = $repoSettings->query()
    ->limit(1, 0)
    ->execute();
    
foreach($getSettings as $settings) {
    $r_a = $settings->restrictedAccess;
    $r_e = $settings->regEnabled;
    $f_t = $settings->fastTrack;
    $s_t = $settings->slowTrack;
    $e_o = $settings->emojiOne;
    $m_a = $settings->mybb;
    $d_p = $settings->demoPage;
    $m_c = $settings->maxChar;
    $m_s = $settings->maxShout;
    $m_h = $settings->maxHistory;
    $i_i = $settings->imgurID;
    $l_g = $settings->langPack;
    $n_s = $settings->notificSound;
    $j_k = $settings->jwtKey;
    $c_s = $settings->colorScheme;
    $s_d = $settings->siteDomain;
}
if($j_k) {
    $secretKey  = $j_k;
} else {
    $bytes = random_bytes(22);
    $genJWT = $repoSettings->findById('chatx');
    $genJWT->jwtKey = bin2hex($bytes);
    $repoSettings->update($genJWT);
}
$now = new DateTimeImmutable();
$serverName = $_SERVER['SERVER_NAME'];

if($s_d) {
    $authHeader = $_SERVER['HTTP_AUTHORIZATION'];
    header("Access-Control-Allow-Origin: $s_d");
    header("Access-Control-Allow-Headers: Authorization");
} else {
    $authHeader = $_COOKIE['chx_authentication'];
}