<?php
/* 
------------------
Language: English
------------------
*/

$lang = array();

// Page Titles
$lang['TITLE_MANAGEMENT'] = 'ChatX Management';

// Navbar
$lang['NAVBAR_GREETING'] = 'Howdy,';
$lang['NAVBAR_LOGOUT'] = 'LogOut';

// Navigation
$lang['NAVIGATION'] = 'Navigation';
$lang['SHOUT_MANAGEMENT'] = 'Shout Management & widget';
$lang['USER_MANAGEMENT'] = 'User Management';
$lang['CHATX_SETUPS'] = 'ChatX Settings';
$lang['GITHUB'] = 'GtiHub';

// Moderator Panel Settings
$lang['CHATX_SETTINGS'] = 'ChatX Settings';
$lang['CHATX_SETTINGS_DESCRIPTION'] = 'You can enable or disable global functions for chat app here.';
$lang['LOGGED_IN_CAN_READ&SEND_MESSAGES'] = 'Only logged in users can read and send messages:';
$lang['USER_REGISTRATION_ENABLED'] = 'New user registration is enabled:';
$lang['RELOAD_MESSAGES_SLOW_TRACK'] = 'ChatX reloads messages in <b>slow</b> track every (seconds):';
$lang['RELOAD_MESSAGES_FAST_TRACK'] = 'ChatX reloads messages in <b>fast</b> track every (seconds):';
$lang['EMOJIONE_LIBRARY'] = 'Use <b>EmojiOne</b> library to replace :) with emoji:';
$lang['FEATHERLIGHT_LIBRARY'] = 'Use <b>Featherlight</b> library to view uploaded images in a modal box:';
$lang['LANGUAGE'] = 'Appplication language:';
$lang['LANGUAGE_EN'] = 'English';
$lang['LANGUAGE_RU'] = 'Russian';
$lang['EXTERNAL_DOMAIN'] = 'External domain where you are going to use ChatX:';
$lang['SAVE_SETTINGS'] = 'Save Settings';
$lang['AUTO_PURGING'] = 'Automatic Purging';
$lang['AUTO_PURGING_DESC1'] = 'In order to preserve ChatX speed it is advisable to delete old messages from the server from time to time.';
$lang['AUTO_PURGING_DESC2'] = 'If your server supports CRON, create manually a job that will run <b>delete_old_shouts.php</b> script every 15 minutes-1 hour.';
$lang['ZERO_NOT_ALLOWED'] = 'Zero is not allowed';
$lang['UPDATING_PLEASE_WAIT'] = 'Updating settings. Please wait.';

// Index Page (Moderator)
$lang['CHATX_WIDGET'] = 'ChatX Widget & Installation';
$lang['CHATX_WIDGET_DESC1'] = 'Make sure your website is using jQuery library. If it doesn\'t, install one:';
$lang['CHATX_WIDGET_DESC2'] = 'If you are planning to use ChatX on external domain make sure you have set it in <a href="setups.php">ChatX Setttings</a>. This is needed to comply with CORS policy.';
$lang['CHATX_WIDGET_DESC3'] = 'Add ChatX widget to any place where you want it to appear:';
$lang['CHATX_WIDGET_DESC4'] = 'Done!';
$lang['DELETING_SHOUTS_ID'] = 'Deleting Shouts by ID';
$lang['DELETING_SHOUTS_ID_DESC1'] = 'Click the ID of the shout you want to delete and submit the form.';
$lang['SHOUT_ID_INPUT'] = 'Enter Post ID...';
$lang['SHOUT_ID_DELETE'] = 'Delete';
$lang['SHOUT_ID'] = 'Shout ID';
$lang['SHOUT_AUTHOR'] = 'Author';
$lang['SHOUT_CONTENT'] = 'Content';
$lang['CLEARING_ALL_DATA'] = 'Clearing All Data';
$lang['CLEARING_ALL_DATA_DESC1'] = 'Be careful. By clicking the button below you will permanently delete all data from the server.';
$lang['DELETE_EVERYTHING'] = 'Delete everything';

// Userlist Page (Moderator)
$lang['REGISTERED_USERS'] = 'Registered users: ';
$lang['USER_MODERATOR'] = 'Moderator';
$lang['USER_BANNED'] = 'Banned';
$lang['USER_USERLIST'] = 'Userlist';
$lang['CHANGING_PASSWORD'] = 'Changing User Password';
$lang['CHANGING_PASSWORD_DESC1'] = 'Enter existing username and then specify a new user password.';
$lang['EXISTING_USERNAME'] = 'Existing Username';
$lang['NEW_PASSWORD'] = 'New Password';
$lang['CONFIRM_PASSWORD'] = 'Confirm Password';
$lang['CHANGING_PASSWORD_BUTTON'] = 'Change Password';
$lang['DELETING_USERS'] = 'Deleting Users';
$lang['DELETING_USERS_DESC1'] = 'Enter existing username to delete them from database.';
$lang['CHANGING_USERS_BUTTON'] = 'Delete User';
$lang['ADDING_MODERATORS'] = 'Adding moderators';
$lang['ADDING_MODERATORS_DESC1'] = 'Enter existing username to make them moderators.';
$lang['ADDING_MODERATOR_BUTTON'] = 'Add Moderator';
$lang['BLOCKING_USERS'] = 'Blocking users';
$lang['BLOCKING_USERS_DESC1'] = 'Enter existing username to block them.';
$lang['BLOCKING_USERS_BUTTON'] = 'Ban user';

// User pages
$lang['ACCESS_DENIED'] = 'ACCESS DENIED';
$lang['ACCESS_DENIED_DESC1'] = 'YOU HAVE NO PERMISSION TO VIEW THIS PAGE';

// Login/registration page
$lang['REGISTRATION_COMPLETE'] = 'Registration complete.';
$lang['USERNAME_TAKEN'] = 'Sorry, the username is already taken.';
$lang['REGISTRATION_DISABLED'] = 'Sorry, user registration is disabled.'; //not used
$lang['USERNAME_PASSWORD_NOT_RECOGNIZED'] = 'Username or password is not recognized';
$lang['CHATX_LOGIN'] = 'ChatX Login';
$lang['LOGIN'] = 'Login';
$lang['SIGN_UP'] = 'Sign Up';
$lang['ENTER_YOUR_NAME'] = 'Enter your name';
$lang['ENTER_YOUR_PASSWORD'] = 'Enter your password';
$lang['LOGIN_USER_BANNED'] = 'Username banned';
