<?php
require 'vendor/autoload.php';
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