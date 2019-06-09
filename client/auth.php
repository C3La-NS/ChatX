<?php 
include '../settings.php';
require '../vendor/autoload.php';
 include '../data/languages/app_lang.extra.' . $l_g . '.php';


$form_data = array();


if (!empty(htmlspecialchars($_POST['u'])) && !empty(htmlspecialchars($_POST['p']))) {

    $getProfile = $repoProfiles->query()
    ->where('username', '==', mb_strtolower($_POST['u']))
    ->execute();
    foreach($getProfile as $profile) {
        $u = $profile->username;
        $l = $profile->login;
        $p = $profile->password;
        $m = $profile->moderator;
        $b = $profile->banned;
    }

    
  if (mb_strtolower(htmlspecialchars($_POST['u'])) == mb_strtolower($u) && password_verify(htmlspecialchars($_POST['p']), $p) && $b !== 'true')  {

      if ($m == 'true') {
         $_SESSION['mod_loggedin'] = true;
      } else {
         $_SESSION['loggedin'] = true;
      }
          
      $_SESSION['username'] = $l;
      
    $form_data['success'] = true;
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


header("Access-Control-Allow-Credentials: true");
echo json_encode($form_data);