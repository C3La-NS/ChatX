<?php 
include '../settings.php';
require '../vendor/autoload.php';
include '../data/languages/' . $l_g . '/app_lang.extra.' . $l_g . '.php';


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
         $_SESSION[$sesPrefix . 'mod_loggedin'] = true;
      } else {
         $_SESSION[$sesPrefix . 'loggedin'] = true;
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


if(!empty($_POST['reg_u']) && mb_strlen($_POST['reg_u'], 'utf-8') <= 25 && !empty($_POST['reg_p']) && mb_strlen($_POST['reg_p'], 'utf-8') <= 16 && $_POST['reg_p'] == $_POST['c_reg_p'] && $r_e == '1') {
    
    $reg_u = htmlspecialchars($_POST["reg_u"]);
    $reg_u = str_replace(array("\n", "\r"), '', $reg_u);
    $reg_u = preg_replace('/\s+/', ' ', $reg_u);
    $reg_u = mb_strtolower($reg_u);
    
    $reg_l = htmlspecialchars($_POST["reg_u"]);
    $hashed_password = PASSWORD_HASH($_POST['reg_p'], PASSWORD_BCRYPT);
    
    $checkProfile = $repoProfiles->query()
    ->where('username', '==', $reg_u)
    ->execute();
 
    foreach($checkProfile as $takenProfile) {
        $t = $takenProfile->username;
    }

    // Storing a new profile in does not already exists
  if ($reg_u != $t && mb_strlen($reg_u) >= 2)  {
    $profile = new \JamesMoss\Flywheel\Document(array(
        'username' => $reg_u,
        'login' => $reg_l, //logical mistake "username" should be used instead
        'password' => $hashed_password
    ));
    
    $repoProfiles->store($profile);
        $form_data['success'] = false; // actually it's TRUE. But FALSE is easier with no need to add a few lines to core.js. Prob should be modified.
        $form_data['message'] = $lang['REGISTRATION_COMPLETE'];
   } else {
        $form_data['success'] = false;
        $form_data['message'] = $lang['USERNAME_TAKEN'];
   }
    
}

header("Access-Control-Allow-Credentials: true");
echo json_encode($form_data);