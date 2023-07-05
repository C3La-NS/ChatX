<?php 
use Firebase\JWT\JWT;

include '../settings.php';
include '../data/languages/' . $l_g . '/app_lang.extra.' . $l_g . '.php';

$form_data = array();

$log_u = htmlspecialchars($_POST['u']);
$log_p = htmlspecialchars($_POST['p']);

if (!empty($log_u) && !empty($log_p)) {

    $getProfile = $repoProfiles->query()
    ->where('username', '==', mb_strtolower($log_u))
    ->execute();
    foreach($getProfile as $profile) {
        $u = $profile->username;
        $l = $profile->login;
        $p = $profile->password;
        $m = $profile->moderator;
        $b = $profile->banned;
    }

  if (mb_strtolower($log_u) == mb_strtolower($u) && password_verify($log_p, $p) && $b !== 'true')  {

    $issuedAt   = new DateTimeImmutable();
    $expire     = $issuedAt->modify('+1 month')->getTimestamp();

    $data = [
        'iat'  => $issuedAt->getTimestamp(),    // Issued at: time when the token was generated
        'iss'  => $serverName,                  // Issuer
        'nbf'  => $issuedAt->getTimestamp(),    // Not before
        'exp'  => $expire,                      // Expire
        'data' => [                             // Data related to the signer user
            'userName' => $l,                   // User name
            'loggedIn' => true,
            'moderator' => $m,
        ]
    ];

    $jwt_data = JWT::encode(
        $data,
        $secretKey,
        'HS512'
    );

    if ($s_d) {
        $form_data = array('success' => true, 'jwt' => $jwt_data);
    } else {
        $form_data = array('success' => true);
    }
    
    if (isset($_GET['page-login']) || !$s_d) {
        setcookie("chx_authentication", $jwt_data, [
            'expires' => $expire,
            'path' => '/',
            'secure' => true,
            'httponly' => true,
            'samesite' => !$s_d ? 'Strict' : 'Lax',
        ]);
    }
    
  } else {
    if ($b === 'true') {
        $form_data['success'] = false;
        $form_data['message'] = $lang['USERNAME_BANNED'];
    } else {
        $form_data['success'] = false;
        $form_data['message'] = $lang['USERNAME_PASSWORD_NOT_RECOGNIZED'];
    }
  }
}

$reg_u = htmlspecialchars($_POST["reg_u"]);
$reg_u = str_replace(array("\n", "\r"), '', $reg_u);
$reg_u = preg_replace('/\s+/', ' ', $reg_u);
$reg_l = htmlspecialchars($reg_u);
$reg_u = mb_strtolower($reg_u);
$reg_p = htmlspecialchars($_POST["reg_p"]);
$reg_p = str_replace(array("\n", "\r"), '', $reg_p);

if(!empty($reg_u) && mb_strlen($reg_u, 'utf-8') <= 25 && !empty($reg_p) && mb_strlen($reg_p, 'utf-8') <= 16 && $reg_p == $_POST['c_reg_p'] && $r_e == '1') {

    $hashed_password = PASSWORD_HASH($reg_p, PASSWORD_BCRYPT);
    
    $checkProfile = $repoProfiles->query()
    ->where('username', '==', $reg_u)
    ->execute();
 
    foreach($checkProfile as $takenProfile) {
        $t = $takenProfile->username;
    }

  if ($reg_u != $t && mb_strlen($reg_u) >= 2)  {
    $profile = new \JamesMoss\Flywheel\Document(array(
        'username' => $reg_u,
        'login' => $reg_l,
        'password' => $hashed_password
    ));
    
    $repoProfiles->store($profile);
        $form_data['reg_success'] = true;
        $form_data['message'] = $lang['REGISTRATION_COMPLETE'];
   } else {
        $form_data['reg_success'] = false;
        $form_data['message'] = $lang['USERNAME_TAKEN'];
   }
    
}

header("Access-Control-Allow-Credentials: true");
echo json_encode($form_data);