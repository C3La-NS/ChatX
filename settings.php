<?php
require 'vendor/autoload.php';
ini_set('session.gc_maxlifetime', 604800); // prob not needed
    $secure = true;
    $httponly = true;
    $samesite = 'none';
    $maxlifetime = 3060 * 60;
    if(PHP_VERSION_ID < 70300) {
        session_set_cookie_params($maxlifetime, '/; samesite='.$samesite, $_SERVER['HTTP_HOST'], $secure, $httponly);
    } else {
        session_set_cookie_params([
            'lifetime' => $maxlifetime,
            'path' => '/',
            'domain' => $_SERVER['HTTP_HOST'],
            'secure' => $secure,
            'httponly' => $httponly,
            'samesite' => $samesite
        ]);
    }
session_name("ChatX_SESSION");
session_start();    

$dir = __DIR__.'/data';

$config = new \JamesMoss\Flywheel\Config($dir, array(
    'formatter' => new \JamesMoss\Flywheel\Formatter\JSON,
));

$repoSettings = new \JamesMoss\Flywheel\Repository('settings', $config);
$repoShouts = new \JamesMoss\Flywheel\Repository('shouts', $config);
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
        $f_g = $settings->featherLight;
        $m_a = $settings->mybb;
        $d_p = $settings->demoPage;
        $m_c = $settings->maxChar;
        $m_s = $settings->maxShout;
        $m_h = $settings->maxHistory;
        $l_g = $settings->langPack;
        $n_s = $settings->notificSound;
        $s_d = $settings->siteDomain;
        $b_u = $settings->bannedUsername;
    }

$sesPrefix = ''; // optional session unique prefix
header("Access-Control-Allow-Origin: $s_d");